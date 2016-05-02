<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 18/03/16
 * Time: 16:04
 */

namespace App\Models;


use Core\Lib\Debug;
use Core\Models\Behaviors\Validator;

class Service extends AppModel
{
    use Validator;
    public $validationRules = [
        "titre"=>[
            ["ruleName" => "required", "message" => "Le titre est obligatoire"]
        ],
        "description"=>[
            ["ruleName" => "required", "message" => "La description est obligatoire"]
        ],
    ];
    public function arraySelect()
    {
        $f = $this->get(['fields' => 'DISTINCT(categorie)']);
        $return = [];
        foreach($f as $item)
        {
            $return[$item->categorie] = $item->categorie;
        }
        return $return;
    }
    public function countSub()
    {
        $query = $this->bdd->prepare('select s.*, count(i.user_id) nbr
from services s
left join inscriptions i on s.id = i.service_id
group by s.id
');
        $query->execute([$_SESSION['id']]);
        return $query->fetchAll(\PDO::FETCH_CLASS);

    }
    public function checkIn()
    {
        $query = $this->bdd->prepare('select s.*, (case when user_id is not null then 1 else 0 end) inscrit from actions s left join (select * from inscriptions where user_id = 6) i on s.id = i.action_id;');
        $query->execute([$_SESSION['id']]);
        return $query->fetchAll(\PDO::FETCH_CLASS);
    }
    public function checkSub($user_id, $service_id)
    {
        $test = $this->get(['where' => ['user_id' => $user_id, 'service_id' => $service_id]], 'inscriptions');
        return empty($test);
    }
    public  function deleteSub($user_id, $service_id)
    {
       $query = $this->bdd->prepare('DELETE FROM inscriptions where user_id  =  ? and service_id = ?');
        $query->execute([$user_id, $service_id]);
    }
}