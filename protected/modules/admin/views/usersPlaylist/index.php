<?php
/* @var $this UsersPlaylistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Playlists',
);

$this->menu=array(
	array('label'=>'Create UsersPlaylist', 'url'=>array('create')),
	array('label'=>'Manage UsersPlaylist', 'url'=>array('admin')),
);
?>

<h1>Users Playlists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
