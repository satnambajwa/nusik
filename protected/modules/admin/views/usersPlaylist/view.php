<?php
/* @var $this UsersPlaylistController */
/* @var $model UsersPlaylist */

$this->breadcrumbs=array(
	'Users Playlists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UsersPlaylist', 'url'=>array('index')),
	array('label'=>'Create UsersPlaylist', 'url'=>array('create')),
	array('label'=>'Update UsersPlaylist', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsersPlaylist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersPlaylist', 'url'=>array('admin')),
);
?>

<h1>View UsersPlaylist #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'playlist_name',
		'created_date',
		'status',
		'date_time',
		'users_id',
		'users_users_id',
	),
)); ?>
