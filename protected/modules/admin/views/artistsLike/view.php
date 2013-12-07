<?php
/* @var $this ArtistsLikeController */
/* @var $model ArtistsLike */

$this->breadcrumbs=array(
	'Artists Likes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ArtistsLike', 'url'=>array('index')),
	array('label'=>'Create ArtistsLike', 'url'=>array('create')),
	array('label'=>'Update ArtistsLike', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArtistsLike', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArtistsLike', 'url'=>array('admin')),
);
?>

<h1>View ArtistsLike #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_id',
		'stats',
		'date_time',
		'artists_profile_id',
	),
)); ?>
