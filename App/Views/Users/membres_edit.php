<?php use Core\Helpers\Form;

$formSubmit = "membres/users/edit/";
if(isset($admin) && $admin)
{
    $formSubmit .= $user->id;
}

?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="page-title">
                    <?php if(isset($admin) && $admin): ?>
                        <h1><span class="text-secondary">Profil de <?= $user->prenom . ' '  .$user->nom?></span></h1>
                    <?php else: ?>
                        <h1><span class="text-secondary">Mon profil</span></h1>

                    <?php endif; ?>
                </div><!-- /.page-title -->
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="user-photo">
                                <?= \Core\Helpers\Html::img('profils/'.$user->photo); ?>
                                <a href="user-profile-edit.html#">

                                    <?= Form::start($formSubmit, 'POST', ['enctype' => 'multipart/form-data', 'id' => 'form']) ?>
                                        <span class="btn btn-default btn-block btn-file">
                                            Changer ma photo <input id="upload" name="photo" type="file">
                                        </span>
                                    <?php if(isset($error['picture'])): ?><p class="text-danger"><?= $error['picture'] ?></p><?php endif; ?>
                                    </form>
                                </a>
                            </div><!-- /.user-photo -->
                        </div><!-- /.widget -->

                        <?php if(!isset($admin)): ?>
                        <div class="widget">
                            <ul class="menu-advanced">
                                <li><?= \Core\Helpers\Html::link(['actions', 'inscrit', 'membres'], '<i class="fa fa-pencil hidden-sm hidden-xs"></i> Mes actions') ?></li>
                                <li  class="active"><?= \Core\Helpers\Html::link(['users', 'edit', 'membres'], "<i class=\"fa fa-user hidden-sm hidden-xs\"></i> Mes coordonnées </a>") ?></li>
                        </div><!-- /.widget -->
                        <?php endif;; ?>

                    </div><!-- /.sidebar -->
                </div><!-- /.col-* -->

                <div class="col-md-9">
                    <div class="content">


                        <div class="background-white p20 mb30">
                            <?= Form::start($formSubmit, 'POST') ?>

                            <h3 class="page-title">
                                Informations

                                <input type="submit"  class="btn btn-primary btn-xs pull-right" value="Sauvegarder"></input>
                            </h3>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <?= Form::input('text', 'nom', 'Nom', ['class' => 'form-control'], (isset($user->nom))? $user->nom : '') ?>
                                </div><!-- /.form-group -->

                                <div class="form-group col-sm-6">
                                    <?= Form::input('text', 'prenom', 'Prénom', ['class' => 'form-control'], (isset($user->prenom))? $user->prenom : '') ?>
                                </div><!-- /.form-group -->

                                <div class="form-group col-sm-6">
                                    <label>E-mail</label>
                                    <p><?= $user->email; ?></p>
                                </div><!-- /.form-group -->

                                <div class="form-group col-sm-6">
                                    <?= Form::input('text', 'telephone', 'Téléphone', ['class' => 'form-control'], (isset($user->telephone))? $user->telephone : '') ?>
                                </div><!-- /.form-group -->
                            </div><!-- /.row -->
                            </form>

                        </div>
                        <div class="background-white p20 mb30">
                            <?= Form::start($formSubmit, 'POST') ?>

                            <h3 class="page-title">
                                Adresse

                                <input type="submit"  class="btn btn-primary btn-xs pull-right" value="Sauvegarder">
                            </h3>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <?= Form::input('text', 'rue', 'Rue', ['class' => 'form-control'], (isset($user->rue))? $user->rue : '') ?>
                                </div><!-- /.form-group -->

                                <div class="form-group col-sm-6">
                                    <?= Form::input('text', 'ville', 'Ville', ['class' => 'form-control'], (isset($user->ville))? $user->ville : '') ?>
                                </div><!-- /.form-group -->


                                <div class="form-group col-sm-3">
                                    <?= Form::input('text', 'numero', 'Numéro', ['class' => 'form-control'], (isset($user->numero))? $user->numero : '') ?>
                                </div><!-- /.form-group -->

                                <div class="form-group col-sm-3">
                                    <?= Form::input('text', 'codepostal', 'Code postal', ['class' => 'form-control'], (isset($user->codepostal))? $user->codepostal : '') ?>
                                </div><!-- /.form-group -->
                                <div class="form-group col-sm-6">
                                    <?= Form::input('text', 'pays', 'Pays', ['class' => 'form-control'], (isset($user->pays))? $user->pays : '') ?>
                                </div><!-- /.form-group -->

                            </div><!-- /.row -->
                            </form>
                        </div>
                        <div class="background-white p20 mb30">
                            <?= Form::start($formSubmit, 'POST') ?>

                            <h3 class="page-title">
                                Commentaire

                                <input type="submit"  class="btn btn-primary btn-xs pull-right" value="Sauvegarder"></input>
                            </h3>
                            <?= Form::textarea('biographie', ["rows" => "7", "class" => "form-control"], isset($user->biographie)?$user->biographie:'', false) ?>
                            </form>
                        </div>




                    </div><!-- /.content -->
                </div><!-- /.col-* -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->
