<?php
/* @var $this PlaylistTrackController */
/* @var $model PlaylistTrack */

$this->breadcrumbs=array(
	'Playlist Tracks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlaylistTrack', 'url'=>array('index')),
	array('label'=>'Create PlaylistTrack', 'url'=>array('create')),
	array('label'=>'Update PlaylistTrack', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlaylistTrack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlaylistTrack', 'url'=>array('admin')),
);
?>

<h1>View PlaylistTrack #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'songs_table_id',
		'status',
		'date_time',
		'users_playlist_id',
	),
)); ?>
