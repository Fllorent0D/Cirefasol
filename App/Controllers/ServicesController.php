<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 17/03/16
 * Time: 11:11
 */

namespace App\Controllers;


use Core\Lib\Debug;

class ServicesController extends AppController
{
    public function index()
    {
        //$d['services'] = $this->Service->get(['where' => ['archive' => false]]);
        if(isset($_SESSION['id']))
        	$d['services'] = $this->Service->checkIn();
        else
        	$d['services'] = $this->Service->get();
        
        $d['categories'] = $this->Service->get(['fields' => 'DISTINCT categorie']);
        $this->set($d);

    }
    public function admin_index()
    {
        $d['services'] = $this->Service->countSub();
        $this->set($d);
    }
    public function inscrire($id)
    {
        $this->needRender = false;
        if(isset($_SESSION['name']))
        {
            if($this->Service->checkSub($_SESSION['id'], $id))
            {
                //Inscription
                $new = new \stdClass();
                $new->user_id = $_SESSION['id'];
                $new->service_id = $id;
                $this->Service->create($new, 'inscriptions');
                $return['subscription'] = "create";
            }
            else
            {
                //Désinscription
                $this->Service->deleteSub($_SESSION['id'], $id);
                $return['subscription'] = "removed";

            }
            echo json_encode($return);
        }
        else
        {
            http_response_code(401);
        }
    }
    public function admin_ajouter()
    {
        $d = [];
        if($this->Request->isPost)
        {
            $d['data'] = $this->Request->data;
            if($this->Service->Validate($d['data']))
            {

                $this->Session->setFlash('Ce service est ajouté');
                $this->Service->create($d['data']);
            }
            else
            {
                $d['errors'] = $this->Service->getErrors();
            }

        }
        $d['categories'] = $this->Service->arraySelect();

        $this->set($d);
    }
}