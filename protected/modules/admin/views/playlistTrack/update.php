<?php
/* @var $this PlaylistTrackController */
/* @var $model PlaylistTrack */

$this->breadcrumbs=array(
	'Playlist Tracks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlaylistTrack', 'url'=>array('index')),
	array('label'=>'Create PlaylistTrack', 'url'=>array('create')),
	array('label'=>'View PlaylistTrack', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PlaylistTrack', 'url'=>array('admin')),
);
?>

<h1>Update PlaylistTrack <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>