<?php
/* @var $this ArtistTrackController */
/* @var $model ArtistTrack */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artist-track-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="span10">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<div class="span-16">
		<?php echo $form->labelEx($model,'users_id'); ?>
		<?php echo $form->textField($model,'users_id'); ?>
		<?php echo $form->error($model,'users_id'); ?>
	</div>
	<div class="row">

		<?php echo $form->labelEx($model,'song_name'); ?>
		<?php echo $form->textField($model,'song_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'song_name'); ?>
<div>
	<div class="row">
		<div class="span-12">

		<?php echo $form->labelEx($model,'song_url'); ?>
		<?php echo $form->textField($model,'song_url',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'song_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uploaded_date'); ?>
		<?php echo $form->textField($model,'uploaded_date'); ?>
		<?php echo $form->error($model,'uploaded_date'); ?>
	</div>
	</div>

	<div class="row">
			<div class="span-12">

		<?php echo $form->labelEx($model,'song_discription'); ?>
		<?php echo $form->textArea($model,'song_discription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'song_discription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_likes'); ?>
		<?php echo $form->textField($model,'total_likes'); ?>
		<?php echo $form->error($model,'total_likes'); ?>
	</div>	</div>


	<div class="row">
				<div class="span-12">

		<?php echo $form->labelEx($model,'total_comments'); ?>
		<?php echo $form->textField($model,'total_comments'); ?>
		<?php echo $form->error($model,'total_comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_shares'); ?>
		<?php echo $form->textField($model,'total_shares'); ?>
		<?php echo $form->error($model,'total_shares'); ?>
	</div>
	</div>

	<div class="row">
				<div class="span-12">

		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_time'); ?>
		<?php echo $form->textField($model,'date_time'); ?>
		<?php echo $form->error($model,'date_time'); ?>
	</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success')); ?>

	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->