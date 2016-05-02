<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="page-title">
                    <h1><span class="text-secondary">Mon profil</span></h1>
                </div><!-- /.page-title -->
                <div class="col-md-3">
                    <div class="sidebar">

                        <div class="widget">

                            <ul class="menu-advanced">
                                <li class="active"><?= \Core\Helpers\Html::link(['users', 'edit', 'membres'], '<i class="fa fa-pencil hidden-sm hidden-xs"></i> Mes actions') ?></li>
                                <li ><?= \Core\Helpers\Html::link(['users', 'edit', 'membres'], "<i class=\"fa fa-user hidden-sm hidden-xs\"></i> Mes coordonnées </a>") ?></li>
                            </ul>
                        </div><!-- /.widget -->

                    </div><!-- /.sidebar -->
                </div><!-- /.col-* -->
                <div class="col-sm-8 col-lg-9">
                    <div class="content">
                        <div class="posts posts-condensed">
                        <?php foreach($actions as $action): ?>
                            <div class="post">

                                <div class="post-content">
                                    <h2><a href="blog-detail.html"><?= $action->titre ?></a></h2>
                                </div><!-- /.post-content -->
                                <div class="post-more">
                                    <?= \Core\Helpers\Html::link(["actions", "remove", "membres"], "Se désinscrire", [$action->id], ["class" => "btn btn-xs btn-danger"]) ?>
                                    <a href="#" class="btn btn-xs btn-info">Contacter le responsable</a>
                                </div><!-- /.post-date -->
                            </div><!-- /.post -->

                        <?php endforeach; ?>



                        </div><!-- /.posts -->




                    </div><!-- /.content -->
                </div><!-- /.col-* -->



            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->