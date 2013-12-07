<?php
/* @var $this ArtistsProfileController */
/* @var $model ArtistsProfile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artists-profile-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_id'); ?>
			<?php $list=CHtml::listData(Users::model()->findAllByAttributes(array('roles_id'=>'2')),'id','display_name');  
		  echo $form->dropDownList($model,'profile_id',$list, array('empty'=>'--Select a Artisit--')); ?>
		<?php echo $form->error($model,'profile_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'biography'); ?>
		<?php echo $form->textField($model,'biography',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'biography'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'achivement'); ?>
		<?php echo $form->textField($model,'achivement',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'achivement'); ?>
	</div>
 

	<div class="row">
		<?php echo $form->labelEx($model,'geners_id'); ?>
			<?php $list=CHtml::listData(genres::model()->findAll(),'id','genre_name');  
		  echo $form->dropDownList($model,'geners_id',$list, array('empty'=>'--Select a Genre--')); ?>
		<?php echo $form->error($model,'geners_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status', array('value'=>1, 'uncheckValue'=>0)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->