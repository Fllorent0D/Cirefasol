<?php use Core\Helpers\Form; ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="page-title">
                    <h1><span class="text-secondary">Liste des membres</span></h1>
                </div><!-- /.page-title -->

                <div class="background-white p20">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Ville</th>
                                <th>Téléphone</th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td>
                                        <?= $user->nom ?>
                                    </td>
                                    <td>
                                        <?= $user->email ?>
                                    </td>
                                    <td>
                                        <?= $user->ville ?>
                                    </td>
                                    <td>
                                        <?= $user->telephone ?>
                                    </td>
                                    <td>
                                        <?= \Core\Helpers\Html::link(["users", "edit", "membres"], "Profil complet", [$user->id], ["class" => "btn btn-info btn-xs"]) ?>
                                    </td>
                                </tr>


                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->
