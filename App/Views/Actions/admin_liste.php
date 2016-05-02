<?php use Core\Helpers\Form;

?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="page-title">
                    <h1><span class="text-secondary">Liste des actions</span></h1>
                </div><!-- /.page-title -->

                <div class="background-white p20">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>Activité</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Lieu</th>
                            <th>Responsable</th>
                            <th>Visible</th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($actions as $action): ?>
                            <tr>
                                <td>
                                    <?= $action->activite ?>
                                </td>
                                <td>
                                    <?= $action->titre ?>
                                </td>
                                <td>
                                    <?= $action->date_evenement ?>
                                </td>
                                <td>
                                    <?= $action->lieu ?>
                                </td>
                                <td>
                                    <?= \Core\Helpers\Html::link(["users", "edit", "membres"], $action->prenom. ' ' .$action->nom, [$action->userid]) ?>
                                </td>
                                <td>
                                    <i class="fa <?= ($action->visible)? 'fa-eye' : 'fa-eye-slash' ?>" aria-hidden="true"></i>

                                </td>
                                <td>
                                    <?= \Core\Helpers\Html::link(["actions", "edit", "admin"], 'Modifier', [$action->id], ['class' => 'btn btn-info btn-xs']) ?>
                                    <button class="btn btn-danger btn-xs" id="deleteBtn" data-title="<?= $action->titre ?>" data-id="<?= $action->id ?>">Supprimer</button>

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
<div class="modal fade deleteModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Supprimer une action</h4>
            </div>
            <div class="modal-body">
                <p>Etes-vous certain sûr de vouloir supprimer cette action '<span id="title"></span>' ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <a class="btn btn-primary" id="btnConfirmDelete">Confirmer</a>
            </div>
        </div>

    </div>
</div>