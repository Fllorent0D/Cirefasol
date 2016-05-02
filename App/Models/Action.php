<?php
/**
 * Created by PhpStorm.
 * User: Floca
 * Date: 26/03/16
 * Time: 17:48
 */

namespace App\Models;


use Core\Models\Behaviors\Validator;

class Action extends AppModel
{
    use Validator;
    public $validationRules = [
        "titre"=>[
            ["ruleName" => "required", "message" => "Le titre est obligatoire"]
        ],
        "description"=>[
            ["ruleName" => "required", "message" => "La description est obligatoire"]
        ],
        "activite" => [
            ["ruleName" => "required", "message" => "La catégorie d'activité est obligatoire"]
        ],
        "label" => [
            ["ruleName" => "required", "message" => "Le label du bouton est obligatoire"]
        ] 
    ];
    public function arraySelect()
    {
        $f = $this->get(['fields' => 'DISTINCT(activite)']);
        $return = [];
        foreach($f as $item)
        {
            $return[$item->activite] = $item->activite;
        }
        return $return;
    }
    public function getDetails($action)
    {
        $f = $this->bdd->prepare('select users.nom, users.prenom, users.id, inscriptions.traite from inscriptions inner join users on users.id = inscriptions.user_id where action_id = ?');
        $f->execute([$action->id]);
        return $f->fetchAll(\PDO::FETCH_CLASS);

    }
    public function getActions()
    {
        $f = $this->bdd->prepare("Select actions.*, users.id as userid, nom, prenom from actions left join users on users.id = actions.responsable order by activite, titre, date_evenement");
        $f->execute([FALSE]);
        return $f->fetchAll(\PDO::FETCH_CLASS);
    }
    public function getNewSub()
    {
        $f = $this->bdd->prepare('select users.nom, users.prenom, users.telephone, users.telephone, users.id as usersid, actions.titre, users.email, actions.id as actionsid from inscriptions inner join users on users.id = inscriptions.user_id inner join actions on actions.id = inscriptions.action_id where traite = ? ORDER by date_inscription DESC');
        $f->execute([FALSE]);
        return $f->fetchAll(\PDO::FETCH_CLASS);
    }
    public function traiter($user_id, $action_id)
    {
        $query = $this->bdd->prepare("UPDATE inscriptions set traite = 1 where action_id = ? and user_id = ?");
        $query->execute([$action_id, $user_id]);
    }
    public function checkInPer()
    {
        $query = $this->bdd->prepare('select s.*, (case when user_id is not null then 1 else 0 end) inscrit
                                      from actions s
                                      left join (select * from inscriptions where user_id = ?) i
                                        on s.id = i.action_id
                                      where ponctuelle = 0
                                      and visible = 1
                                      ORDER BY sequence;');
        $query->execute([$_SESSION['id']]);
        return $query->fetchAll(\PDO::FETCH_CLASS);
    }
    public function checkInPonc()
    {
        $query = $this->bdd->prepare('select s.*, (case when user_id is not null then 1 else 0 end) inscrit
                                      from actions s
                                      left join (select * from inscriptions where user_id = ?) i
                                        on s.id = i.action_id
                                      WHERE ponctuelle = 1
                                      and visible = 1
                                      ORDER BY sequence;');
        $query->execute([$_SESSION['id']]);
        return $query->fetchAll(\PDO::FETCH_CLASS);
    }
    public function getSubscribe()
    {
        $query = $this->bdd->prepare("SELECT * FROM inscriptions inner join actions on actions.id = inscriptions.action_id where inscriptions.user_id = ?");
        $query->execute([$_SESSION['id']]);
        return $query->fetchAll(\PDO::FETCH_CLASS);
    }
    public function deleteSub($action_id, $user_id)
    {
        $query = $this->bdd->prepare("Delete from inscriptions where action_id = ? and user_id  = ?");
        $query->execute([$action_id, $user_id]);
    }


}