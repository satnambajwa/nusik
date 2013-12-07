<?php
/* @var $this ArtistsLikeController */
/* @var $model ArtistsLike */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artists-like-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id'); ?>
		<?php echo $form->textField($model,'users_id'); ?>
		<?php echo $form->error($model,'users_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stats'); ?>
		<?php echo $form->textField($model,'stats'); ?>
		<?php echo $form->error($model,'stats'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_time'); ?>
		<?php echo $form->textField($model,'date_time',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'date_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'artists_profile_id'); ?>
		<?php echo $form->textField($model,'artists_profile_id'); ?>
		<?php echo $form->error($model,'artists_profile_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->