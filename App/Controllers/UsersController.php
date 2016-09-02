<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 17/03/16
 * Time: 11:19
 */

namespace App\Controllers;

use Core\Helpers\Uploader;
use Core\Lib\Debug;

class UsersController extends AppController
{
    private function checkController($controller)
    {
        $controllerName = 'App\\Controllers\\' . ucfirst($controller) . 'Controller';
        if (!class_exists($controllerName)) {
            return false;
        }
        return true;
    }
    public function activate($token)
    {
        if(is_null($token))
        {
            http_response_code(401);
        }
        $user = $this->User->get(['where' => ['token' => $token]]);
        if(!empty($user))
        {
            $user = $user[0];
            $update = new \stdClass();
            $update->email_confirme = true;
            $this->User->update($user->id, $update);
            $this->Session->setFlash("Votre compte a été activé", "success");
        }
        else
        {
            http_response_code(401);
        }
    }
    public function email()
    {
        $this->needRender = false;
        $mail = new \PHPMailer();
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Username = "";                 // SMTP username
        $mail->Password = "";                           // SMTP password
        $mail->Port = 587;
        $mail->setFrom($mail->Username, "Cirefasol");
        $mail->addAddress("f.cardoen@me.com");
        $mail->isHTML();
        $mail->Subject = "Bienvenue sur cirefasol";
        $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <meta name="viewport" content="width=device-width"/> <style type="text/css">*{margin: 0; padding: 0; font-size: 100%; font-family: \'Avenir Next\', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; line-height: 1.65;}img{max-width: 100%; margin: 0 auto; display: block;}body,.body-wrap{width: 100% !important; height: 100%; background: #efefef; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none;}a{color: #71bc37; text-decoration: none;}.text-center{text-align: center;}.text-right{text-align: right;}.text-left{text-align: left;}.button{display: inline-block; color: white; background: #009f8b; border: solid #009f8b; border-width: 10px 20px 8px; font-weight: bold; border-radius: 4px;}h1, h2, h3, h4, h5, h6{margin-bottom: 20px; line-height: 1.25;}h1{font-size: 32px;}h2{font-size: 28px;}h3{font-size: 24px;}h4{font-size: 20px;}h5{font-size: 16px;}p, ul, ol{font-size: 16px; font-weight: normal; margin-bottom: 20px;}.container{display: block !important; clear: both !important; margin: 0 auto !important; max-width: 580px !important;}.container table{width: 100% !important; border-collapse: collapse;}.container .masthead{padding: 30px 0; background: #009f8b; color: white;}.container .masthead h1{margin: 0 auto !important; max-width: 90%; text-transform: uppercase;}.container .content{background: white; padding: 30px 35px;}.container .content.footer{background: none;}.container .content.footer p{margin-bottom: 0; color: #888; text-align: center; font-size: 14px;}.container .content.footer a{color: #888; text-decoration: none; font-weight: bold;}</style></head><body><table class="body-wrap"> <tr> <td class="container"> <table> <tr> <td align="center" class="masthead"> <h1>Cirefasol</h1> </td></tr><tr> <td class="content"> <h2>Bonjour,</h2> <p> </p><table> <tr> <td align="center"> <p> <a href="#" class="button">Activer votre compte</a> </p></td></tr></table> <p>By the way, if you\'re wondering where you can find more of this fine meaty filler, visit <a href="http://baconipsum.com">Bacon Ipsum</a>.</p><p><em>Cirefasol</em></p></td></tr></table> </td></tr><tr> <td class="container"> <table> <tr> <td class="content footer" align="center"> <p>Sent by <a href="#">Cirefasol</a>, </p><p><a href="mailto:">cirefasol@gmail.com</a></p></td></tr></table> </td></tr></table></body></html>"';
        //$mail->Body = 'Activé votre compte : <a href="http://tenlike.me/users/activate/">Cliquez ici</a>';

        if(!$mail->send())
        {
            $this->Session->setFlash("Le mail n'a pas été envoyé. Erreur : " . $mail->ErrorInfo, "danger");

        } else
        {
            $this->Session->setFlash("L'email a été envoyé!");


        }
    }
    public function admin_liste()
    {
        $d["users"] = $this->User->get();
        $this->set($d);
    }
    public function admin_profil($id)
    {
        $d["user"] = $this->User->getFirst(["where" => ["id" => $id]]);
        $this->set($d);
    }
    public function register()
    {
        $this->needRender = false;
        $params = $this->Request->data;

        if($this->User->Validate($params))
        {

            if($params->password != $params->passwordcheck)
            {
                $errors = ["password" => "", "passwordcheck" => "Vos mots de passe ne sont pas identique"];

            }
            else
            {
                unset($params->passwordcheck);
                $user = $this->User->get(['where' => ['email' => $params->email]]);
                if(empty($user))
                {
                    $params->email = strtolower($params->email);
                    $params->token = md5(uniqid(rand(), true));
                    $this->Auth->register($this->User, $params);

                    $mail = new \PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Username = "";                 // SMTP username
                    $mail->Password = "";                           // SMTP password
                    $mail->Port = 587;
                    $mail->setFrom($mail->Username, "Cirefasol");
                    $mail->addAddress($params->email);
                    $mail->isHTML();
                    $mail->Subject = "Bienvenue sur cirefasol";
                    $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <meta name="viewport" content="width=device-width"/> <style type="text/css">*{margin: 0; padding: 0; font-size: 100%; font-family: \'Avenir Next\', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; line-height: 1.65;}img{max-width: 100%; margin: 0 auto; display: block;}body,.body-wrap{width: 100% !important; height: 100%; background: #efefef; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none;}a{color: #71bc37; text-decoration: none;}.text-center{text-align: center;}.text-right{text-align: right;}.text-left{text-align: left;}.button{display: inline-block; color: white; background: #009f8b; border: solid #009f8b; border-width: 10px 20px 8px; font-weight: bold; border-radius: 4px;}h1, h2, h3, h4, h5, h6{margin-bottom: 20px; line-height: 1.25;}h1{font-size: 32px;}h2{font-size: 28px;}h3{font-size: 24px;}h4{font-size: 20px;}h5{font-size: 16px;}p, ul, ol{font-size: 16px; font-weight: normal; margin-bottom: 20px;}.container{display: block !important; clear: both !important; margin: 0 auto !important; max-width: 580px !important;}.container table{width: 100% !important; border-collapse: collapse;}.container .masthead{padding: 30px 0; background: #009f8b; color: white;}.container .masthead h1{margin: 0 auto !important; max-width: 90%; text-transform: uppercase;}.container .content{background: white; padding: 30px 35px;}.container .content.footer{background: none;}.container .content.footer p{margin-bottom: 0; color: #888; text-align: center; font-size: 14px;}.container .content.footer a{color: #888; text-decoration: none; font-weight: bold;}</style></head><body><table class="body-wrap"> <tr> <td class="container"> <table> <tr> <td align="center" class="masthead"> <h1>Cirefasol</h1> </td></tr><tr> <td class="content"> <h2>Bonjour ,</h2> <p> </p><table> <tr> <td align="center"> <p> <a href="http://tenlike.me/users/activate/'.$params->token.'" class="button">Activer votre compte</a> </p></td></tr></table> <p>Petit texte <a href="http://tenlike.me">Cirefasol</a>.</p><p><em>Cirefasol</em></p></td></tr></table> </td></tr><tr> <td class="container"> <table> <tr> <td class="content footer" align="center"> <p>Sent by <a href="#">Cirefasol</a>, </p><p><a href="mailto:">cirefasol@gmail.com</a></p></td></tr></table> </td></tr></table></body></html>"';
                    $mail->send();



                    echo 'ok';
                    exit;
                }
                else
                {
                    $errors = ["email" => "Cette adresse email est déjà utilisée"];
                }

            }
        }
        else
        {
            $errors = $this->User->getErrors();
            if(isset($errors["password"]))
            {
                $errors["passwordcheck"] = "";
            }
        }
        echo json_encode($errors);

    }
    public function isLogged()
    {
        $this->needRender = false;
        if ($this->Auth->isLogged())
        {
            echo $_SESSION['email'];
        }
        else
        {
            echo 'false';
        }
    }
    public function isKnown()
    {
        $this->needRender  = false;
        if($this->Request->isPost)
        {
            $user = $this->User->get(['where' => ['email' => strtolower($this->Request->data->email)]]);
            if(empty($user))
            {
                echo 'false';
            }
            else
            {
                echo 'true';
            }
        }
        else
        {
            http_response_code(401);
        }
    }
    public function connect()
    {

        $this->needRender = false;
        $d["post"] = [];
        if ($this->Request->isPost) {

            if ($this->Auth->login($this->User, $this->Request->data, false))
            {
                echo 'ok';
            } else {
                echo 'no';
            }
        } elseif ($this->Auth->isLogged()) {
            echo 'no';
        }

    }
    public function logout()
    {
        $this->Auth->logout(true);
        //$this->Session->setFlash("Déconnecté");
        $this->redirect("accueil");
    }
    public function membres_edit($id = null)
    {
        if(!is_null($id))
        {
            if($_SESSION['role'] != 1)
            {
                $id =  $_SESSION['id'];
            }
            else
            {
                $d["admin"] = true;
            }
        }
        else
        {
            $id = $_SESSION['id'];
        }

        if(!empty($_FILES['photo']['name'])) {
            $data = new \stdClass();
            $dest = BASE . DS . 'App' . DS . 'Webroot' . DS .'img'.DS. 'profils' . DS;
            $name = uniqid();
            $ext = [".jpg", ".jpeg", '.JPG', 'JPEG'];
            if (in_array(Uploader::getExtension($_FILES['photo']['name']), $ext)) {
                Uploader::upload($_FILES['photo'], $name, $dest);
                $data->picture = $name . Uploader::getExtension($_FILES['photo']['name']);
                Uploader::crop($dest . $data->picture, $dest, $data->picture, true);
                $this->Request->isPost = true;
                $this->Request->data = new \stdClass();
                $this->Request->data->photo = $data->picture;
            } else {
                $d["error"]["picture"] = "Nous n'acceptons que les .jpg et .jpeg";

            }
        }
        if($this->Request->isPost)
        {
            $data = $this->Request->data;
            if($this->User->Validate($data))
            {
                //var_dump($data);
                $this->User->update($id, $data);
            }
            else
            {
                $d['error'] = $this->User->getErrors();
            }
        }

        $d['user']= $this->User->getFirst(['where' => ['id' => $id]]);
        $this->set($d);


    }
}
