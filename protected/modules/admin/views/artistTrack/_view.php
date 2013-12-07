<?php
/* @var $this ArtistTrackController */
/* @var $data ArtistTrack */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('song_name')); ?>:</b>
	<?php echo CHtml::encode($data->song_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('song_url')); ?>:</b>
	<?php echo CHtml::encode($data->song_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uploaded_date')); ?>:</b>
	<?php echo CHtml::encode($data->uploaded_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('song_discription')); ?>:</b>
	<?php echo CHtml::encode($data->song_discription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_id')); ?>:</b>
	<?php echo CHtml::encode($data->users_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_time')); ?>:</b>
	<?php echo CHtml::encode($data->date_time); ?>
	<br />

	*/ ?>

</div>