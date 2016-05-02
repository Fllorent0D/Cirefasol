<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 28/02/16
 * Time: 14:27
 */

namespace App\Controllers;


use Carbon\Carbon;

class ActionsController extends AppController
{
    protected $hasModel = true;

    public function index()
    {
        if (isset($_SESSION['id'])) {
            $d["permanent"] = $this->Action->checkInPer();
            $d["ponctuel"] = $this->Action->checkInPonc();

        } else {
            $d["permanent"] = $this->Action->get(["where" => "ponctuelle = 0", 'order' => "sequence"]);
            $d["ponctuel"] = $this->Action->get(["where" => "ponctuelle = 1",'order' => "sequence"]);


        }
        foreach ($d["ponctuel"] as $key => $ac) {
            $d["ponctuel"][$key]->date_evenement = Carbon::parse($ac->date_evenement);
            $d["ponctuel"][$key]->date_evenement->timezone = "Europe/Brussels";
        }
        $this->set($d);
    }

    public function membres_inscrit()
    {

        $d["actions"] = $this->Action->getSubscribe();
        $this->loadModel('User');
        $d['user'] = $this->User->getFirst(['where' => ['id' => $_SESSION['id']]]);
        $this->set($d);
    }

    public function membres_remove($id)
    {
        $this->needRender = false;
        if (isset($id) && is_numeric($id)) {
            $this->Action->deleteSub($id, $_SESSION["id"]);
            $this->Session->setFlash("Inscription a bien été supprimée");

        } else {
            $this->Session->setFlash("Erreur dans la requête.", "danger");

        }
        $this->redirect("membres/actions/inscrit");

    }

    public function admin_ajouter()
    {
        $d = [];
        if ($this->Request->isPost) {
            $d['data'] = $this->Request->data;
            if ($this->Action->Validate($d['data'])) {

                $this->Session->setFlash('Cette action est ajoutée');
                $this->Action->create($d['data']);
            } else {
                $d['errors'] = $this->Action->getErrors();
            }

        }
        $d['activites'] = $this->Action->arraySelect();
        $this->loadModel('User');
        $d["responsables"] = $this->User->arraySelect();
        $this->set($d);
    }

    public function admin_inscriptions()
    {
        //$d["actions"] = $this->Action->get(["order" => "activite, titre, date_evenement"]);
        $d["actions"] = $this->Action->getActions();

        foreach($d["actions"] as $key => $ac)
        {
            $d["actions"][$key]->details = $this->Action->getDetails($ac);
        }
        $d["new"] = $this->Action->getNewSub();
        $this->set($d);
    }
    public function admin_seen($user, $action)
    {
        $this->needRender = false;
        if(is_null($user) ||is_null($action))
        {
            $this->Session->setFlash('Erreur', 'danger');
        }
        $actiontest = $this->Action->get(['where' => ['user_id' => $user, 'action_id' => $action]], 'inscriptions');
        if(!empty($user)) {
            $this->Action->traiter($user, $action);
            $this->Session->setFlash("L'inscription a bien été traitée");
        }
        else
        {
            $this->Session->setFlash('Erreur - les paramètres donnés ne sont pas corrects', 'danger');
        }
        $this->redirect('admin/actions/inscriptions');
    }
    public function admin_liste()
    {
        $d["actions"] = $this->Action->getActions();
        $this->set($d);
    }
    public function admin_delete($id = null)
    {
        if(isset($id) && is_numeric($id))
        {
            $action = $this->Action->getFirst(["where" => ["id" => $id]]);
            if(!empty($action))
            {
                $this->Action->delete($action->id);
                $this->Session->setFlash("L'action a bien été suprimé");
            }
            else
            {
                $this->Session->setFlash("Cette action n'existe pas", "danger");
            }

        }
        $this->redirect('admin/actions/liste');
    }
    public function admin_edit($id = null)
    {
        if(is_null($id) || !is_numeric($id))
            $this->redirect('admin/actions/liste');
        if($this->Request->isPost)
        {
            $data = $this->Request->data;
            if($this->Action->Validate($data))
            {
                //var_dump($data);
                $this->Action->update($id, $data);
                $this->Session->setFlash('L\'action a bien été modifiée');
                $this->redirect('admin/actions/liste');


            }
            else
            {
                $d['error'] = $this->Action->getErrors();
            }
        }
        $d['activites'] = $this->Action->arraySelect();
        $this->loadModel('User');
        $d["responsables"] = $this->User->arraySelect();
        $d['new']= $this->Action->getFirst(['where' => ['id' => $id]]);
        $this->set($d);
    }
    public function inscription()
    {
        $this->needRender = false;
        if($this->Request->isPost)
        {
            $params = $this->Request->data;
            if($params->user != null && $params->action != null && is_numeric($params->action))
            {
                $new  = new \stdClass();
                $this->loadModel('User');
                $user = $this->User->getFirst(['where' => ['email' => strtolower($params->user)]]);
                $new->user_id = $user->id;
                $new->action_id = $params->action;
                $test = $this->Action->get(["where" => ["user_id" => $user->id, "action_id" => $params->action]], 'inscriptions');
                if(empty($test))
                {
                    $this->Action->create($new, 'inscriptions');
                    echo 'ok';
                }
                else
                {
                    echo 'already';
                }
            }
            return;
        }
        http_response_code(401);
    }
}