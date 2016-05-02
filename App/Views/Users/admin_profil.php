
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="page-title">
                    <h1><span class="text-secondary">Profil</span></h1>
                </div><!-- /.page-title -->
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="user-photo">
                                <a href="user-profile-edit.html#">
                                    <?= \Core\Helpers\Html::img('profils/'.$user->photo); ?>
                                    </form>
                                </a>
                            </div><!-- /.user-photo -->
                        </div><!-- /.widget -->

                    </div><!-- /.sidebar -->
                </div><!-- /.col-* -->

                <div class="col-md-9">
                    <div class="content">
                        <div class="row">



                            <div class="background-white p20 col-md-5">

                                <h3 class="page-title">
                                    Informations
                                </h3>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <h5>Nom</h5>
                                        <?= (isset($user->nom))? $user->nom :''; ?>


                                        <?= (isset($user->prenom))? '<h5>Prenom</h5>'.$user->prenom :''; ?>

                                        <h5>E-mail</h5>
                                        <p><?= $user->email; ?></p>


                                        <?= (isset($user->telephone))? '<h5>Telephone</h5>'.$user->telephone :''; ?>
                                    </div><!-- /.form-group -->
                                </div><!-- /.row -->


                            </div>

                            <div class="background-white p20 col-md-offset-1 col-md-6">

                                <h3 class="page-title">
                                    Adresse
                                </h3>

                                <div class="row">
                                    <div class="col-md-12">
                                        <?= (isset($user->rue))? $user->rue :''; ?>
                                        <?= (isset($user->numero))? $user->numero :''; ?>

                                        <br>
                                        <?= (isset($user->codepostal))? $user->codepostal :''; ?>
                                        <?= (isset($user->ville))? $user->ville :''; ?>
                                        <br>
                                        <?= (isset($user->pays))? $user->pays :''; ?>
                                    </div>


                                </div><!-- /.row -->
                            </div>
                        </div>
                        <div class="row pt60">
                            <?= (isset($user->biographie))? '<div class="background-white p20 mb30"><h3 class="page-title">
                                Biographie
                            </h3>
                            <p>'.$user->biographie.'</p>
                        </div>' :''; ?>

                        </div>





                    </div><!-- /.content -->
                </div><!-- /.col-* -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->
