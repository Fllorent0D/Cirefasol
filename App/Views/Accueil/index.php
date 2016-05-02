<?php use Core\Helpers\Html; ?>
<div class="main">
    <div class="main-inner" style="padding: 0px 0px;">
        <div class="content">
            <div class="mt-80">
                <div class="hero-image">
                    <div class="hero-image-inner" style="background-image: url('<?= WEBROOT . DS . 'img' . DS . 'sl-1.jpg' ?>');">
                        <div class="hero-image-content">
                            <div class="container">
                                <h1>Ciréfasol</h1>

                                <p>Citoyens et réfugiés des Fagnes solidaires</p>
                                <?= Html::link(['actions', ''], 'Nos actions', null, ['class' => 'btn btn-default btn-lg homebtn', 'id' => 'actionBtn']); ?>
                                <?php if(isset($_SESSION['name'])) echo Html::link(['users', 'edit', 'membres'], 'Mon profil', null, ['class' => 'btn btn-default btn-lg homebtn']); ?>


                            </div><!-- /.container -->
                        </div><!-- /.hero-image-content -->


                    </div><!-- /.hero-image-inner -->
                </div><!-- /.hero-image -->

            </div>

            <div class="container">
                <div class="white-background p30">
                    <h2><span class="text-secondary">La plate-forme Ciréfasol</span></h2>
                    <p>
                            Une plate-forme citoyenne d’accueil des demandeurs d’asile s'est constituée à Spa et Jalhay. Celle-ci travaille de façon coordonnée avec les autorités communales et les ONG sur le terrain dans un esprit pluraliste et constructif. Son champ d'action est vaste : cours de français, scolarisation des enfants, transports, loisirs, animation culturelle, mouvements de jeunesse, clubs sportifs, besoins matériels en équipements divers, soutien médical et paramédical. Ensemble, nous voulons relever le défi d’une intégration réussie par la rencontre, le partage et la connaissance de l’autre. Ce site a pour objectif de vous tenir informés de la situation et de faciliter les contacts entre les candidats bénévoles et les responsables des centres d'accueil.

                    </p>
                </div>

                <div class="block background-black-light fullwidth">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="box">
                                <?= \Core\Helpers\Html::img('spa_small.jpg', 'Camping du Spa d\'Or', ['class' => 'img-responsive']); ?>

                                <div class="box-content">
                                    <h2>Le camping du Spa d'Or</h2>
                                    <p>Le camping du Spa d'Or est un centre géré par la Croix-Rouge depuis le 15 novembre 2015, pour une période d'un an renouvelable. Le centre est destiné à accueillir plus de 400 personnes...</p>

                                    <?= Html::link(['centres', 'spa'], 'Plus d\'informations...', null, null) ?>
                                </div><!-- /.box-content -->
                            </div>
                        </div><!-- /.col-sm-4 -->

                        <div class="col-sm-4">
                            <div class="box">
                                <?= \Core\Helpers\Html::img('meyerbeer_small.jpg', 'Domaine de Meyerbeer', ['class' => 'img-responsive']); ?>
                                <div class="box-content">
                                    <h2>La Villa Meyerbeer</h2>
                                    <p>La villa Meyerbeer, route de Barisart, accueille plus de 70 personnes dont près de la moitié sont des enfants. Le centre est géré par Caritas qui en dispose pour six mois...</p>

                                    <?= Html::link(['centres', 'meyerbeer'], 'Plus d\'informations...', null, null) ?>
                                </div><!-- /.box-content -->
                            </div>
                        </div><!-- /.col-sm-4 -->



                        <div class="col-sm-4">
                            <div class="box">
                                <?= \Core\Helpers\Html::img('cockaifagne_small.jpg', 'Les centres d\'accueil MENA', ['class' => 'img-responsive']); ?>

                                <div class="box-content">
                                    <h2>Centres d'accueil MENA</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam arcu purus, pulvinar et mollis vel, sollicitudin ac nulla. Aenean at nisl faucibus, bibendum purus quis, hendrerit orci. Nunc pulvinar sapien.
                                    </p>

                                    <?= Html::link(['centres', 'cockaifagne'], 'Plus d\'informations...', null, null)?>
                                </div><!-- /.box-content -->
                            </div>
                        </div><!-- /.col-sm-4 -->
                    </div><!-- /.row -->

                </div>

            </div><!-- /.container -->

        </div><!-- /.content -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->
<script>
    setInterval(function() {
        $("#actionBtn").addClass('animated pulse infinite');
    }, 5000);
</script>