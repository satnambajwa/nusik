<?php
/* @var $this ArtistsProfileController */
/* @var $model ArtistsProfile */

$this->breadcrumbs=array(
	'Artists Profiles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArtistsProfile', 'url'=>array('index')),
	array('label'=>'Create ArtistsProfile', 'url'=>array('create')),
	array('label'=>'View ArtistsProfile', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArtistsProfile', 'url'=>array('admin')),
);
?>

<h1>Update ArtistsProfile <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>