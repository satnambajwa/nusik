<?php
/* @var $this PlaylistTrackController */
/* @var $model PlaylistTrack */

$this->breadcrumbs=array(
	'Playlist Tracks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PlaylistTrack', 'url'=>array('index')),
	array('label'=>'Manage PlaylistTrack', 'url'=>array('admin')),
);
?>

<h1>Create PlaylistTrack</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>