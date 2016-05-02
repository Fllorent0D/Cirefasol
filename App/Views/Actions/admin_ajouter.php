<?php
use Core\Helpers\Form;
?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 background-white p20">
                    <div class="content">
                        <div class="page-title">
                            <h1><span class="text-secondary">Ajouter une action</span></h1>
                        </div><!-- /.page-title -->
                        <?= Form::start('admin/actions/ajouter', 'post'); ?>
                        <div class="col-md-8">
                            <div class="form-group <?= (isset($errors['titre']))? 'has-error' : ''; ?> ">
                                <?= Form::input('text', 'titre', 'Titre', ['class' => 'form-control'], (isset($new->titre))? $new->titre : ''); ?>
                                <?php if(isset($errors['titre'])) : ?><small class="text-danger"><?= $errors['titre'] ?></small><?php endif; ?>
                            </div>
                            <div class="form-group <?= (isset($errors['description']))? 'has-error' : ''; ?>">
                                <?= Form::textarea('description', ['class' => 'form-control', 'rows' => 10], (isset($new->titre))? $new->titre : '', 'Description'); ?>
                                <?php if(isset($errors['description'])) : ?><small class="text-danger"><?= $errors['description'] ?></small><?php endif; ?>

                            </div>
                            <div class="form-group <?= (isset($errors['activite']))? 'has-error' : ''; ?>">
                                <label for="datetimepicker1">Catégorie d'activités : </label>
                                <?= Form::select('activite', false, $activites ,null,  ['class' => 'form-control js-select-tags']) ?>
                                <?php if(isset($errors['activite'])) : ?><small class="text-danger"><?= $errors['activite'] ?></small><?php endif; ?>

                            </div> 
                            <div class="form-group <?= (isset($errors['responsable']))? 'has-error' : ''; ?>">
                                <label for="datetimepicker1">Responsable : </label>
                                <?= Form::select('responsable', false, $responsables ,null,  ['class' => 'form-control js-select-contact']) ?>
                                <?php if(isset($errors['responsable'])) : ?><small class="text-danger"><?= $errors['responsable'] ?></small><?php endif; ?>

                            </div>
                            <div class="form-group <?= (isset($errors['label']))? 'has-error' : ''; ?>">
                                <?= Form::input('text', 'label', 'Label du bouton d\'inscription', ['class' => 'form-control'], (isset($new->label))? $new->label : ''); ?>
                                <?php if(isset($errors['label'])) : ?><small class="text-danger"><?= $errors['label'] ?></small><?php endif; ?>

                            </div>
                            <div class="form-group">
                                <?= Form::input('text', 'lieu', 'Lieu', ['class' => 'form-control'], (isset($new->titre))? $new->titre : ''); ?>
                            </div>
                            <div class="form-group">
                                <label>Type d'action</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="ponctuelle" id="optionsRadios2" value="0" checked>
                                        Action permanente
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="ponctuelle" id="optionsRadios1" value="1">
                                        Action ponctuelle
                                    </label>
                                </div>

<!--                            <div class="form-group">
                                <label for="datetimepicker1">Date : </label>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" id='datetimepicker4' />
                                </div>
                            </div>
-->
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Ajouter" class="btn btn-primary">
                            </div>
                        </div>
                        </form>


                    </div><!-- /.content -->
                </div><!-- /.col-* -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->