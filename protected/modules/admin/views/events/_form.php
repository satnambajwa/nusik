<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'events_name'); ?>
		<?php echo $form->textField($model,'events_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'events_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'events_address'); ?>
		<?php echo $form->textField($model,'events_address',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'events_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_date'); ?>
				<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'event_date', //attribute name
                'mode'=>'date', //use "time","date" or "datetime" (default)
                'options'=>array("dateFormat"=>'yy/mm/dd'), // jquery plugin options
                'language' => ''
            ));
        ?>
		<?php echo $form->error($model,'event_date'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->