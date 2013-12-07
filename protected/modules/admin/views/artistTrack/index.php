<?php
/* @var $this ArtistTrackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Artist Tracks',
);

$this->menu=array(
	array('label'=>'Create ArtistTrack', 'url'=>array('create')),
	array('label'=>'Manage ArtistTrack', 'url'=>array('admin')),
);
?>

<h1>Artist Tracks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
