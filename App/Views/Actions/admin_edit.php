<?php
use Core\Helpers\Form;use Core\Helpers\Html;
echo Html::js('jquery')
?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 background-white p20">
                    <div class="content">
                        <div class="page-title">
                            <h1><span class="text-secondary">Modifier une action</span></h1>
                        </div><!-- /.page-title -->
                        <?= Form::start('admin/actions/edit/'.$new->id, 'post'); ?>
                        <div class="col-md-8">
                            <div class="form-group <?= (isset($errors['titre']))? 'has-error' : ''; ?> ">
                                <?= Form::input('text', 'titre', 'Titre', ['class' => 'form-control'], (isset($new->titre))? $new->titre : ''); ?>
                                <?php if(isset($errors['titre'])) : ?><small class="text-danger"><?= $errors['titre'] ?></small><?php endif; ?>
                            </div>
                            <div class="form-group <?= (isset($errors['description']))? 'has-error' : ''; ?>">
                                <?= Form::textarea('description', ['class' => 'form-control', 'rows' => 10], (isset($new->description))? $new->description : '', 'Description'); ?>
                                <?php if(isset($errors['description'])) : ?><small class="text-danger"><?= $errors['description'] ?></small><?php endif; ?>

                            </div>


                            <div class="form-group <?= (isset($errors['label']))? 'has-error' : ''; ?>">
                                <?= Form::input('text', 'label', 'Label du bouton d\'inscription', ['class' => 'form-control'], (isset($new->label))? $new->label : ''); ?>
                                <?php if(isset($errors['label'])) : ?><small class="text-danger"><?= $errors['label'] ?></small><?php endif; ?>

                            </div>
                            <div class="form-group">
                                <?= Form::input('text', 'lieu', 'Lieu', ['class' => 'form-control'], (isset($new->lieu))? $new->lieu : ''); ?>
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