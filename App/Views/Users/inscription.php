<?php use Core\Helpers\Form; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?= $this->Session->flash() ?>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 background-white p20">
                        <div class="page-title">
                            <h1>Inscription</h1>
                        </div><!-- /.page-title -->
                        <?= Form::start('users/connect', 'post') ?>
                        <div class="form-group  <?= (isset($errors))? 'has-error':'' ?>">
                            <label for="login-form-email">E-mail</label>
                            <?= Form::input('text', 'email', false, ["class" => "form-control", "required" => "required", "autofocus" => "autofocus"], (isset($post->email))?$post->email:"", "E-mail") ?>
                        </div><!-- /.form-group -->
                        <div class="form-group  <?= (isset($errors))? 'has-error':'' ?>">
                            <label for="login-form-email">E-mail</label>
                            <?= Form::input('text', 'email', false, ["class" => "form-control", "required" => "required", "autofocus" => "autofocus"], (isset($post->email))?$post->email:"", "E-mail") ?>
                        </div><!-- /.form-group -->

                        <div class="form-group <?= (isset($errors))? 'has-error':'' ?>">
                            <label for="login-form-password ">Mot de passe</label>
                            <?= Form::input('password', 'password', false, ["class" => "form-control", "required" => "required"], '', "Mot de passe") ?>
                        </div><!-- /.form-group -->
                        <div class="form-group <?= (isset($errors))? 'has-error':'' ?>">
                            <label for="login-form-password ">Mot de passe</label>
                            <?= Form::input('password', 'password', false, ["class" => "form-control", "required" => "required"], '', "Mot de passe") ?>
                        </div><!-- /.form-group -->
                        <?= \Core\Helpers\Html::link(['users', 'connect'], 'Déjà inscrit?'); ?>

                        <?= Form::end('Se connecter', ['class' =>"btn btn-primary pull-right"]) ?>
                    </div><!-- /.col-sm-4 -->
                </div><!-- /.row -->

            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->