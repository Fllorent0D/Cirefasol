<?php use Carbon\Carbon;Carbon::setLocale('fr'); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="document-title">
                    <h1>Services demandés </h1>

                </div><!-- /.document-title -->

                <div class="col-sm-8 col-lg-9">
                    <div class="content">
                        <div class="posts">
                            <?php foreach($services as $service): ?>
                            <div class="post post-boxed">
                                <div class="post-content">
                                    <h2><a href="blog-detail.html"><?= $service->titre ?><a></h2>
                                    <p><?= $service->description ?></p>
                                </div><!-- /.post-content -->
                                <div class="post-meta clearfix">
                                    <?php if(!empty($service->lieu)): ?> <div class="post-meta-author">Lieu <a href="blog-detail.html"><?= $service->lieu ?></a></div><?php endif ?> <!-- /.post-meta-author -->
                                    <?php if(!empty($service->date)): ?><div class="post-meta-date"><?= ucfirst(Carbon::createFromFormat('Y-m-d',$service->date)->diffForHumans()); ?></div><?php endif; ?><!-- /.post-meta-date -->
                                    <div class="post-meta-categories"><i class="fa fa-tags"></i> <a href="blog-detail.html"><?= $service->categorie ?></a></div><!-- /.post-meta-categories -->
                                    <?php if(isset($_SESSION['id']) && $service->inscrit) : ?>
                                    <div class="post-meta-more"><a href="#" class="btn btn-primary" id="inscrire" data-id="<?= $service->id ?>"><i class="fa fa-check"></i> Vous êtes inscrit</a></div><!-- /.post-meta-more -->
                                    <?php else : ?>
                                    <div class="post-meta-more"><a href="#" class="btn btn-info" id="inscrire" data-id="<?= $service->id ?>">Se porter volontaire <i class="fa fa-chevron-right"></i></a></div><!-- /.post-meta-more -->
                                    <?php endif; ?>
                                </div><!-- /.post-meta -->
                            </div><!-- /.post -->
                            <?php endforeach; ?>


                        </div><!-- /.posts -->

                    </div><!-- /.content -->
                </div><!-- /.col-* -->

                <div class="col-sm-4 col-lg-3">
                    <div class="sidebar">

                        <div class="widget">
                            <h2 class="widgettitle">Categories</h2>

                            <ul class="menu">
                                <?php foreach($categories as $categorie) :?>
                                <li><a href="#"><?= $categorie->categorie ?></a></li>
                                <?php endforeach; ?>
                            </ul><!-- /.menu -->
                        </div><!-- /.wifget -->


                        <div class="widget">
                            <h2 class="widgettitle">Archives</h2>

                            <ul class="menu">
                                <li><a href="#">August <strong class="pull-right">12</strong></a></li>
                                <li><a href="#">July <strong class="pull-right">23</strong></a></li>
                                <li><a href="#">June <strong class="pull-right">53</strong></a></li>
                            </ul><!-- /.menu -->
                        </div><!-- /.wifget -->

                    </div><!-- /.sidebar -->
                </div><!-- /.col-* -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->