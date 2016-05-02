<?php use Core\Helpers\Html;  ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="content">

                <div class="document-title">
                    <h1>Les centres</h1>

                </div><!-- /.document-title -->

                <div class="cards-simple-wrapper">
                    <div class="row background-white" style="padding-top:30px;padding-left:30px;">
                        <h1><span class="text-secondary">Les centres</span></h1>
                        <p>La plate-forme Ciréfasol mène son action en coordination avec les centres d’accueil situés dans la région des Hautes-Fagnes : le Camping du Spa d’Or, la Villa Meyerbeer et les centres d'accueil pour MENA.</p>
                    </div>
                    <div class="row background-white p20" style="margin-bottom: 10px;">

                        <div class="col-md-4 pt10">
                            <div class="card-simple" data-background-image="<?= WEBROOT ?>/img/spa_small.jpg">
                                <div class="card-simple-background">
                                    <div class="card-simple-content">
                                        <h2><?= Html::link(['centres', 'spa'], 'Le camping du Spa d\'Or') ?></h2>

                                        <div class="card-simple-actions">
                                            <p>Stockay - Jalhay</p>
                                            <?= Html::link(['centres', 'spa'], '', null, ['class' => 'fa fa-info']) ?>
                                        </div><!-- /.card-simple-actions -->
                                    </div><!-- /.card-simple-content -->
                                </div><!-- /.card-simple-background -->
                            </div><!-- /.card-simple -->
                            <p>Le camping du Spa d'Or est un centre géré par la Croix-Rouge depuis le 15 novembre 2015, pour une période d'un an renouvelable. Le centre est destiné à accueillir plus de 400 personnes.</p>

                            <?= Html::link(['centres', 'spa'], 'Plus d\'informations...', null) ?>
                        </div><!-- /.col-* -->
                        <hr class="visible-xs visible-sm">
                        <div class="col-md-4">
                            <div class="card-simple" data-background-image="<?= WEBROOT ?>/img/meyerbeer_small.jpg">
                                <div class="card-simple-background">
                                    <div class="card-simple-content">
                                        <h2><?= Html::link(['centres', 'meyerbeer'], 'La villa Meyerbeer') ?></h2>

                                        <div class="card-simple-actions">
                                            <p>Route de Barisart - Spa</p>
                                            <?= Html::link(['centres', 'meyerbeer'], '', null, ['class' => 'fa fa-info']) ?>
                                        </div><!-- /.card-simple-actions -->
                                    </div><!-- /.card-simple-content -->
                                </div><!-- /.card-simple-background -->
                            </div><!-- /.card-simple -->
                            <p>La villa Meyerbeer, route de Barisart, accueille plus de 70 personnes dont près de la moitié sont des enfants. Le centre est géré par Caritas qui en dispose pour six mois avec possibilité de prolongation.</p>
                            <?= Html::link(['centres', 'meyerbeer'], 'Plus d\'informations...', null) ?>

                        </div><!-- /.col-* -->
                        <hr class="visible-xs visible-sm">

                        <div class="col-md-4">
                            <div class="card-simple" data-background-image="<?= WEBROOT ?>/img/cockaifagne_small.jpg">
                                <div class="card-simple-background">
                                    <div class="card-simple-content">
                                        <h2><?= Html::link(['centres', 'cockaifagne'], 'Centres d\'accueil MENA') ?></h2>

                                        <div class="card-simple-actions">
                                            <p>Jalhay - SPA</p>
                                            <?= Html::link(['centres', 'cockaifagne'], '', null ,['class' => 'fa fa-info']) ?>
                                        </div><!-- /.card-simple-actions -->
                                    </div><!-- /.card-simple-content -->
                                </div><!-- /.card-simple-background -->
                            </div><!-- /.card-simple -->
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam arcu purus, pulvinar et mollis vel, sollicitudin ac nulla. Aenean at nisl faucibus, bibendum purus quis, hendrerit orci. Nunc pulvinar sapien.
                            </p>
                            <?= Html::link(['centres', 'cockaifagne'], 'Plus d\'informations...', null) ?>
                        </div><!-- /.col-* -->



                    </div><!-- /.row -->
                </div><!-- /.cards-simple-wrapper -->



            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->
<?= Html::js('jquery'); ?>
<?= Html::js('superlist'); ?>