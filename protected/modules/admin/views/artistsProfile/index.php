<?php
/* @var $this ArtistsProfileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Artists Profiles',
);

$this->menu=array(
	array('label'=>'Create ArtistsProfile', 'url'=>array('create')),
	array('label'=>'Manage ArtistsProfile', 'url'=>array('admin')),
);
?>

<h1>Artists Profiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
