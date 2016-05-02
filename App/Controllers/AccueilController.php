<?php

namespace App\Controllers;


class AccueilController extends AppController
{

    # Pas besoin de model pour cette page de démonstration
    protected $hasModel = false;

    /**
     * Fonction d'accueil
     */
    public function index()
    {
        // Votre code ici.
    }
    public function admin_index()
    {
        $this->redirect('users/connect');
    }

}