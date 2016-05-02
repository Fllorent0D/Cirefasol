<?php
use Core\Helpers\Form;
use Core\Helpers\Html;
use Core\Helpers\Text;
?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content background-white p20">
                        <div class="page-title">
                            <h1 class="display-inline-block">Services</h1>
                            <h4><?= Html::link(['services', 'ajouter', 'admin'], Html::fa('plus') . ' Ajouter', [], ['class'=>'pull-right display-inline-block']) ?></h4>
                        </div><!-- /.page-title -->
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Catégorie</th>
                                <th>Lieu</th>
                                <th>Date</th>
                                <th>Inscrit(s)</th>
                                <th>Actif</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($services as $service): ?>
                            <tr>
                                <td><?= $service->titre; ?></td>
                                <td><?= Text::cut($service->description, 50); ?></td>
                                <td><?= $service->categorie ?></td>
                                <td><?= $service->lieu; ?></td>
                                <td><?= $service->date; ?></td>
                                <td><?= $service->nbr ?></td>
                                <td><?= ($service->archive == 0)? Html::fa('check') : Html::fa('times') ?></td>
                                <td></td>
                            </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div><!-- /.content -->
                </div><!-- /.col-* -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->