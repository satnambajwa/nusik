<?php
/* @var $this ArtistTrackController */
/* @var $model ArtistTrack */

$this->breadcrumbs=array(
	'Artist Tracks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ArtistTrack', 'url'=>array('index')),
	array('label'=>'Create ArtistTrack', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#artist-track-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Artist Tracks</h1>

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
	'id'=>'artist-track-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'song_name',
		'song_url',
		'uploaded_date',
		'song_discription',
		'users_id',
		/*
		'status',
		'date_time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
