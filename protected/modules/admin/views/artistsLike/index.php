<?php
/* @var $this ArtistsLikeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Artists Likes',
);

$this->menu=array(
	array('label'=>'Create ArtistsLike', 'url'=>array('create')),
	array('label'=>'Manage ArtistsLike', 'url'=>array('admin')),
);
?>

<h1>Artists Likes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
