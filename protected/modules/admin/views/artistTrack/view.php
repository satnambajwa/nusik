<?php
/* @var $this ArtistTrackController */
/* @var $model ArtistTrack */

$this->breadcrumbs=array(
	'Artist Tracks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ArtistTrack', 'url'=>array('index')),
	array('label'=>'Create ArtistTrack', 'url'=>array('create')),
	array('label'=>'Update ArtistTrack', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArtistTrack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArtistTrack', 'url'=>array('admin')),
);
?>

<h1>View ArtistTrack #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'song_name',
		'song_url',
		'uploaded_date',
		'song_discription',
		'users_id',
		'status',
		'date_time',
	),
)); ?>
