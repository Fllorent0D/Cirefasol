<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <div class="content">
                        <div class="document-title">
                            <h1>Nos actions</h1>

                        </div><!-- /.document-title -->

                        <div class="alert alert-danger hidden" id="error"></div>
                        <div class="posts col-sm-6">
                            <div class="post post-boxed">
                                <div class="post-content">
                                    <h1><span class="text-secondary">Les actions permanentes</span></h1>
                                    <p>Certaines activités mises en place s'inscrivent dans la durée : école des devoirs, initiation au français, activités récréatives, besoins matériels… Pour vous inscrire, cliquez sur le bouton correspondant et suivez les instructions qui vous sont données.</p>
                                </div><!-- /.post-content -->


                            </div><!-- /.post -->
                                <?php foreach($permanent as $action): ?>
                                    <div class="post post-boxed">
                                        <div class="post-content">
                                            <h2> <?= \Core\Helpers\Html::link(['users', 'inscription'], $action->titre, []); ?></h2>
                                            <p><?= $action->description; ?></p>
                                            <?php if(isset($_SESSION['id']) && $action->inscrit) : ?>
                                                <div class="pull-right text-success"><i class="fa fa-check"></i> Vous êtes déjà inscrit</div>
                                            <?php else : ?>
                                                <a href="#" id="inscrire" data-titre="<?= $action->titre ?>" data-action_id="<?= $action->id ?>" class="btn btn-info pull-right"><?= $action->label ?></a>

                                            <?php endif; ?>
                                        </div><!-- /.post-content -->
                                    </div><!-- /.post -->

                                <?php endforeach; ?>
                        </div><!-- /.posts -->
                        <hr class="visible-xs">
                        <div class="posts col-sm-6">
                            <div class="post post-boxed">
                                <div class="post-content">
                                    <h1><span class="text-secondary">Les actions ponctuelles</span></h1>
                                    <p>
                                        Des actions ponctuelles sont également organisées : animations culturelles, participation à des activités locales, spectacles… Pour vous inscrire, cliquez sur le bouton correspondant et suivez les instructions qui vous sont données.</p>
                                </div><!-- /.post-content -->


                            </div><!-- /.post -->
                            <?php foreach($ponctuel as $action): ?>
                                <div class="post post-boxed">
                                    <div class="post-content">
                                        <h2><?= \Core\Helpers\Html::link(['users', 'inscription'], $action->titre, []); ?></h2>
                                        <p><?= $action->description; ?></p>
                                        <?php if(isset($_SESSION['id']) && $action->inscrit) : ?>
                                            <div class="pull-right text-success"><i class="fa fa-check"></i> Vous êtes déjà inscrit</div>
                                        <?php else : ?>
                                            <a href="#" id="inscrire" data-titre="<?= $action->titre ?>" data-action_id="<?= $action->id ?>" class="btn btn-info pull-right"><?= $action->label ?></a>

                                        <?php endif; ?>
                                    </div><!-- /.post-content -->
                                </div><!-- /.post -->

                            <?php endforeach; ?>
                        </div><!-- /.posts -->


                    </div><!-- /.content -->
                </div><!-- /.col-* -->


            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->
<div class="modal fade emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModal" id="emailModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="email" action="#">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="registerTitle"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group ">
                    <label for="login-form-email">E-mail</label>
                    <div class="form-group">
                        <input type="text" id="emailCheck" class="form-control" autofocus="autofocus">

                    </div>
                </div><!-- /.form-group -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <input type="submit" class="btn btn-primary" value="Continuer">
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" id="confirmModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="registerTitle"></h4>
                </div>
                <div class="modal-body">
                    Merci de vous être porté volontaire pour cette activité. Un responsable vous va contacter.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
        </div>
    </div>
</div>
