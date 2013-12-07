<?php
/* @var $this ArtistsLikeController */
/* @var $model ArtistsLike */

$this->breadcrumbs=array(
	'Artists Likes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArtistsLike', 'url'=>array('index')),
	array('label'=>'Manage ArtistsLike', 'url'=>array('admin')),
);
?>

<h1>Create ArtistsLike</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>