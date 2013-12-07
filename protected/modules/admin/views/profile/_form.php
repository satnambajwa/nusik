<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
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
		<?php echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
			<?php  echo $form->dropDownList($model,'gender', array('1'=>'Male','2'=>'Female'));?>
	<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'date_of_birth', //attribute name
                'mode'=>'date', //use "time","date" or "datetime" (default)
                'options'=>array("dateFormat"=>'yy/mm/dd'), // jquery plugin options
                'language' => ''
            ));
        ?>	<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code'); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div> 

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
			<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_no'); ?>
		<?php echo $form->textField($model,'contact_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contact_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id'); ?>
			<?php $list=CHtml::listData(Users::model()->findAllByAttributes(array('roles_id'=>'2')),'id','display_name');  
		  echo $form->dropDownList($model,'users_id',$list, array('empty'=>'--Select a Artisit--')); ?>
	<?php echo $form->error($model,'users_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
	<?php echo $form->checkBox($model,'status', array('value'=>1, 'uncheckValue'=>0)); ?>
			<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_time'); ?>
		<?php echo $form->textField($model,'date_time',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'date_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'countries_id'); ?>
		<?php echo $form->textField($model,'countries_id'); ?>
		<?php echo $form->error($model,'countries_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cities_id'); ?>
		<?php echo $form->textField($model,'cities_id'); ?>
		<?php echo $form->error($model,'cities_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->