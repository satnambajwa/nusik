<?php
/* @var $this ArtistTrackController */
/* @var $model ArtistTrack */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artist-track-form',
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),

	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'song_url'); ?>
			<?php echo $form->fileField($model,'song_url'); ?>
	<?php echo $form->error($model,'song_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id'); ?>
		<?php $list=CHtml::listData(Users::model()->findAllByAttributes(array('roles_id'=>'2')),'id','display_name');  
		  echo $form->dropDownList($model,'users_id',$list, array('empty'=>'--Select a Artisit--')); ?>
		<?php echo $form->error($model,'users_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'song_name'); ?>
		<?php echo $form->textField($model,'song_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'song_name'); ?>
	</div>


 
	<div class="row">
		<?php echo $form->labelEx($model,'song_discription'); ?>
		<?php echo $form->textField($model,'song_discription',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'song_discription'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
			<?php echo $form->checkBox($model,'status', array('value'=>1, 'uncheckValue'=>0)); ?><?php echo $form->error($model,'status'); ?>
	</div>
 

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->