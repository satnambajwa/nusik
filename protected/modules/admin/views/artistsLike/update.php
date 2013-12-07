<?php
/* @var $this ArtistsLikeController */
/* @var $model ArtistsLike */

$this->breadcrumbs=array(
	'Artists Likes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArtistsLike', 'url'=>array('index')),
	array('label'=>'Create ArtistsLike', 'url'=>array('create')),
	array('label'=>'View ArtistsLike', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArtistsLike', 'url'=>array('admin')),
);
?>

<h1>Update ArtistsLike <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>