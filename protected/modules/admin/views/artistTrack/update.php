<?php
/* @var $this ArtistTrackController */
/* @var $model ArtistTrack */

$this->breadcrumbs=array(
	'Artist Tracks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArtistTrack', 'url'=>array('index')),
	array('label'=>'Create ArtistTrack', 'url'=>array('create')),
	array('label'=>'View ArtistTrack', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArtistTrack', 'url'=>array('admin')),
);
?>

<h1>Update ArtistTrack <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>