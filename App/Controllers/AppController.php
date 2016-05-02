<?php

namespace App\Controllers;

use Core\Controllers\Controller;

class AppController extends Controller
{
    public $components = ['Auth'];

    public function beforeRender()
    {
        if ((isset($this->Request->prefixe) && $this->Request->prefixe == "membres"))
        {
            if (!$this->Auth->isLogged())
            {
                //$this->Session->setFlash('Vous devez être connecté pour effectuer cette action !', 'danger');
                $this->redirect('accueil/');
            }
            //$this->layout = "admin";
        }
        if ((isset($this->Request->prefixe) && $this->Request->prefixe == "admin"))
        {
            if (!$this->Auth->isLogged() && $_SESSION['role'] == '1')
            {
                //$this->Session->setFlash('Vous devez être connecté ou vous n\'avez pas les droits pour effectuer cette action !', 'danger');
                $this->redirect('accueil/');
            }
            //$this->layout = "admin";
        }
        if(isset($_SESSION['role']) && $_SESSION['role'] == 1)
        {
            $this->loadModel('Action');
            $d["count"] = count($this->Action->getNewSub());
            $this->set($d);
        }

    }
}