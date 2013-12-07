<?php
/* @var $this ArtistTrackController */
/* @var $model ArtistTrack */

$this->breadcrumbs=array(
	'Artist Tracks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArtistTrack', 'url'=>array('index')),
	array('label'=>'Manage ArtistTrack', 'url'=>array('admin')),
);
?>

<h1>Create ArtistTrack</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>