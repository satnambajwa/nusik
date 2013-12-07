<?php
/* @var $this UsersPlaylistController */
/* @var $model UsersPlaylist */

$this->breadcrumbs=array(
	'Users Playlists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersPlaylist', 'url'=>array('index')),
	array('label'=>'Create UsersPlaylist', 'url'=>array('create')),
	array('label'=>'View UsersPlaylist', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersPlaylist', 'url'=>array('admin')),
);
?>

<h1>Update UsersPlaylist <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>