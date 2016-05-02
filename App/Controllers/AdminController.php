<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 17/03/16
 * Time: 11:41
 */

namespace App\Controllers;


class AdminController extends AppController
{
    public function index()
    {
        $this->redirect('users/connect');
    }
    public function admin_index()
    {
        $this->redirect('users/connect');
    }
}