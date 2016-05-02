<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="page-title">
                    <h1><span class="text-secondary">Inscriptions non enregistrées</span></h1>
                </div><!-- /.page-title -->
                <div class="background-white p20">
                    <table class="table table-responsive" id="">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Inscrit dans</th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($new)): ?>
                        <tr>
                           <td colspan="5" class="text-center">Pas de nouvelles inscriptions</td>
                        </tr>
                        <?php else: ?>
                            <?php foreach($new as $user): ?>
                                <tr>
                                    <td>
                                        <?= $user->prenom . ' ' .$user->nom ?>
                                    </td>
                                    <td>
                                        <?= $user->email ?>
                                    </td>
                                    <td>
                                        <?= $user->telephone ?>
                                    </td>
                                    <td>
                                        <?= $user->titre ?>
                                    </td>
                                    <td>
                                        <?= \Core\Helpers\Html::link(["users", "edit", "membres"], "Coordonnées du volontaire", [$user->usersid], ["class" => "btn btn-info btn-xs"]) ?>
                                        <?= \Core\Helpers\Html::link(["actions", "seen", "admin"], "Marquer comme lu", [$user->usersid, $user->actionsid], ["class" => "btn btn-success btn-xs"]) ?>
                                    </td>
                                </tr>


                            <?php endforeach; ?>
                        <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <br><br><br>
            <div class="row">
                <div class="page-title">
                    <h1><span class="text-secondary">Liste complète</span></h1>
                </div><!-- /.page-title -->

                <div class="background-white p20">
                    <table class="table table-responsive" id="dataAction">
                        <thead>
                        <tr>
                            <th>Activité</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Responsable</th>
                            <th>Volontaires</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($actions as $action): ?>
                            <tr>
                                <td>
                                    <?= $action->activite ?>
                                </td>
                                <td>
                                    <?= $action->date_evenement ?>
                                </td>
                                <td>
                                    <?= $action->titre ?>
                                </td>
                                <td>
                                    <?= \Core\Helpers\Html::link(["users", "edit", "membres"], $action->prenom. ' ' .$action->nom, [$action->userid]) ?>
                                </td>
                                <td>
                                    <ul>
                                        <?php foreach($action->details as $inscrit): ?>

                                            <li> <?= \Core\Helpers\Html::link(["users", "edit", "membres"], $inscrit->prenom. ' ' .$inscrit->nom, [$inscrit->id]) ?>
                                            <?php if($inscrit->traite == false): ?><i class="fa fa-user-plus text-success"></i><?php endif; ?>
                                            </li>

                                        <?php endforeach; ?>
                                    </ul>

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
