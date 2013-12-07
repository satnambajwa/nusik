<?php
/* @var $this PlaylistTrackController */
/* @var $model PlaylistTrack */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'songs_table_id'); ?>
		<?php echo $form->textField($model,'songs_table_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_time'); ?>
		<?php echo $form->textField($model,'date_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'users_playlist_id'); ?>
		<?php echo $form->textField($model,'users_playlist_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->