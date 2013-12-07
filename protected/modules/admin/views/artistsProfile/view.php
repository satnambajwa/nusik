<?php
/* @var $this ArtistsProfileController */
/* @var $model ArtistsProfile */

$this->breadcrumbs=array(
	'Artists Profiles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ArtistsProfile', 'url'=>array('index')),
	array('label'=>'Create ArtistsProfile', 'url'=>array('create')),
	array('label'=>'Update ArtistsProfile', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArtistsProfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArtistsProfile', 'url'=>array('admin')),
);
?>

<h1>View ArtistsProfile #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'profile_id',
		'biography',
		'achivement',
		'created_date',
		'last_updated_date',
		'status',
		'geners_id',
	),
)); ?>
