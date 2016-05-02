<?php
    use Core\Helpers\Html;
use Core\Helpers\Form;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <?= Html::css('superlist'); ?>
    <?= Html::cssLibray('font-awesome/css/font-awesome.min'); ?>
    <?= Html::cssLibray('owl.carousel/assets/owl.carousel') ?>
    <?= Html::cssLibray('colorbox/example1/colorbox') ?>
    <?= Html::cssLibray('bootstrap-fileinput/fileinput.min') ?>
    <?= Html::css('animate'); ?>
    <?= Html::css('select2.min'); ?>
    <?= Html::css('datatables.min') ?>

    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.png">
    <meta property="og:url"                content="http://www.tenlike.me" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Cirefasol" />
    <meta property="og:description"        content="Une plate-forme citoyenne d’accueil des demandeurs d’asile s'est constituée à Spa et Jalhay. Celle-ci travaille de façon coordonnée avec les autorités communales et les ONG sur le terrain dans un esprit pluraliste et constructif. Son champ d'action est vaste : cours de français, scolarisation des enfants, transports, loisirs, animation culturelle, mouvements de jeunesse, clubs sportifs, besoins matériels en équipements divers, soutien médical et paramédical. Ensemble, nous voulons relever le défi d’une intégration réussie par la rencontre, le partage et la connaissance de l’autre." />
    <meta property="og:image"              content="http://tenlike.me/App/Webroot/img/facebookshare.jpeg" />
    <title>Ciréfasol</title>
</head>


<body>

<div class="page-wrapper">

    <header class="header">

        <div class="header-wrapper">
            <nav class="navbar navbar-default navbar-lower" style="margin-bottom: 0px; min-height: 0px;" role="navigation">
                <div class="container">
                    <?php if(isset($_SESSION['name'])): ?>
                        <div class="btn-group pull-right">
                            <?php if(isset($_SESSION['role']) && $_SESSION["role"] == 1): ?>
                                <span class="dropdown">
                                <button class="btn btn-outline dropdown-toggle" type="button" data-toggle="dropdown">Administration
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><?= Html::link(['actions', 'ajouter', 'admin'], 'Ajouter une action') ?></li>
                                    <li><?= Html::link(['actions', 'liste', 'admin'], 'Liste des actions') ?></li>
                                    <li class="divider"></li>
                                    <li><?= Html::link(['users', 'liste', 'admin'], 'Liste des membres') ?></li>
                                    <li><?= Html::link(['actions', 'inscriptions', 'admin'], 'Inscriptions <span class="pull-right label label-success label-md">'.$count.'</span>') ?> </li>
                                </ul>
                            </span>
                            <?php endif; ?>
                            <span class="dropdown">
                                <button class="btn btn-outline dropdown-toggle" type="button" data-toggle="dropdown">Mon profil
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><?= Html::link(['actions', 'inscrit', 'membres'], 'Mes actions') ?>
                                    </li>
                                    <li><?= Html::link(['users', 'edit', 'membres'], 'Mes informations') ?>
                                    </li>
                                    <li class="divider"></li>
                                    <li><?= Html::link(['users', 'logout'], 'Déconnexion') ?>
                                    </li>
                                </ul>
                            </span>



                        </div>


                    <?php else : ?>
                        <?= Html::link(['#', ''], 'Mon profil',[], ['class' => 'pull-right btn btn-outline', 'style' => "margin-top: 0px;", "data-toggle"=>"modal", "data-target"=>".login"]) ?>

                    <?php endif; ?>
                </div>
            </nav>
            <div class="container">

                <div class="header-inner">

                    <div class="header-logo">
                        <?= Html::link(['accueil', 'index'], Html::img('logo.png', 'Logo') .'<span>Ciréfasol</span>') ?>
                    </div><!-- /.header-logo -->

                    <div class="header-content">
                        <div class="header-bottom">
                            <ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
                                <li <?= ($this->Request->controller == 'home')? 'class="active"' : null ?>>
                                    <?= Html::link(['accueil', ''], 'Accueil'); ?>
                                </li>

                                <li <?= ($this->Request->controller == 'centres')? 'class="active"' : null ?>>
                                    <?= Html::link(['centres', ''], 'Les centres '); ?>
                                </li >
                                <li <?= ($this->Request->controller == 'actions')? 'class="active"' : null ?>>
                                    <?= Html::link(['actions', ''], 'Nos actions'); ?>
                                </li>
                                <li <?= ($this->Request->controller == 'contacts')? 'class="active"' : null ?>>
                                    <?= Html::link(['contacts', ''], 'Les contacts'); ?>
                                </li>
                            </ul>

                            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div><!-- /.header-bottom -->
                    </div><!-- /.header-content -->

                </div><!-- /.header-inner -->
            </div><!-- /.container -->



    </header><!-- /.header -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?= $this->Session->flash() ?>
        </div>
    </div>
    <?= $content_for_layout ?>

    <footer class="footer">

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-left">
                    Réalisé par <a href="http://floca.be">Florent Cardoen</a>
                </div><!-- /.footer-bottom-left -->

                <div class="footer-bottom-right">
                    <ul class="social-links nav nav-pills">
                        <li><a href="https://www.facebook.com/Soutien-aux-Réfugiés-du-Camping-de-Sart-Lez-Spa-405668372971033/?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    </ul><!-- /.header-nav-social -->
                </div><!-- /.footer-bottom-right -->
            </div><!-- /.container -->
        </div>
    </footer><!-- /.footer -->

</div><!-- /.page-wrapper -->
<div class="modal fade registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" id="registerModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="registerMd" action="#">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="registerTitle">Inscription</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="login-form-email">E-mail</label>
                        <div class="form-group">
                            <input type="text" id="email" class="form-control" >
                            <div id="error" class="text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="login-form-email">Nom</label>
                        <div class="form-group">
                            <input type="text" id="nom" class="form-control">
                            <div id="error" class="text-danger"></div>

                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="login-form-email">Ville</label>
                        <div class="form-group">
                            <input type="text" id="ville" class="form-control">
                            <div id="error" class="text-danger"></div>

                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="login-form-email">Téléphone</label>
                        <div class="form-group">
                            <input type="text" id="telephone" class="form-control">
                            <div id="error" class="text-danger"></div>

                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="login-form-email">Mot de passe</label>
                        <div class="form-group">
                            <input type="password" id="password" class="form-control">
                            <div id="error" class="text-danger"></div>

                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="login-form-email">Confirmer mot de passe</label>
                        <div class="form-group">
                            <input type="password" id="passwordcheck" class="form-control">
                            <div id="error" class="text-danger"></div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" id="btnReg" class="btn btn-primary">Continuer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="login" id="login">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Connexion</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="emaillg" class="form-control">
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label for="login-form-password ">Mot de passe</label>
                    <input type="password" id="passwordlg" class="form-control">
                </div><!-- /.form-group -->
                <div id="errorlg" class="text-danger"></div>
            </div>
            <div class="modal-footer">
                <a href="#" class="pull-left" data-toggle="modal" data-dismiss="modal" data-target=".registerModal">Pas encore inscrit?</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" id="loginbtn">Se connecter</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade registerConfirmModal" tabindex="-1" role="dialog" aria-labelledby="registerConfirmModal" id="registerConfirmModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                Merci de votre inscription, vous allez recevoir un email pour confirmer votre adresse email!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<?= Html::js('jquery') ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<?= Html::js('moment') ?>
<?= Html::js('fr') ?>
<?= Html::js('datatables.min') ?>
<?= Html::js('select2.min') ?>
<?= Html::js('datetime') ?>
<?= Html::js('superlist') ?>
</body>
</html>
