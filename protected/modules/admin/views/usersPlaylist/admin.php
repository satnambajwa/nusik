<?php
/* @var $this UsersPlaylistController */
/* @var $model UsersPlaylist */

$this->breadcrumbs=array(
	'Users Playlists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UsersPlaylist', 'url'=>array('index')),
	array('label'=>'Create UsersPlaylist', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-playlist-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users Playlists</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-playlist-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'playlist_name',
		'created_date',
		'status',
		'date_time',
		'users_id',
		/*
		'users_users_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
