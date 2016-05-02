<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 17/03/16
 * Time: 11:34
 */

namespace App\Models;


use Core\Models\Behaviors\Validator;

class User extends AppModel
{
    use Validator;
    public $validationRules = [
        "nom"=>[
            ["ruleName" => "required", "message"=>"Veuillez entrer votre nom"],

        ],
        "email"=>[
            ["ruleName" => "required", "message"=>"Veuillez entrer votre adresse e-mail"],
            ["ruleName" => "isMail", "message"=>"Vous devez entrer une adresse e-mail valide"],

        ],
        "telephone"=> [
            ["ruleName" => "required", "message"=>"Veuillez mentionner un numéro de téléphone afin que l’on puisse vous joindre"],
        ],
        "ville"=> [
            ["ruleName" => "required", "message"=>"Veuillez entrer votre ville ou votre région"],
        ],
        "password"=> [
            ["ruleName" => "required", "message"=>"Vous devez créer un mot de passe qui vous permettra d’accéder ultérieurement à votre profil"],
        ],

    ];
    public function arraySelect()
    {
        $f = $this->get();
        $return = [];
        foreach($f as $item)
        {
            $return[$item->id] = $item->prenom. ' ' .$item->nom;
        }
        return $return;
    }
}