<?php
/* @var $this UsersPlaylistController */
/* @var $model UsersPlaylist */

$this->breadcrumbs=array(
	'Users Playlists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersPlaylist', 'url'=>array('index')),
	array('label'=>'Manage UsersPlaylist', 'url'=>array('admin')),
);
?>

<h1>Create UsersPlaylist</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>