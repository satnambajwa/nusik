<?php
/* @var $this ArtistsProfileController */
/* @var $model ArtistsProfile */

$this->breadcrumbs=array(
	'Artists Profiles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArtistsProfile', 'url'=>array('index')),
	array('label'=>'Manage ArtistsProfile', 'url'=>array('admin')),
);
?>

<h1>Create ArtistsProfile</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>