<?php
/* @var $this PlaylistTrackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Playlist Tracks',
);

$this->menu=array(
	array('label'=>'Create PlaylistTrack', 'url'=>array('create')),
	array('label'=>'Manage PlaylistTrack', 'url'=>array('admin')),
);
?>

<h1>Playlist Tracks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
