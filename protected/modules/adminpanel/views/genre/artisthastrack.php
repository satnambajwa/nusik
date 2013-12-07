

<h1>Manage Artist Tracks</h1>



<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'artist-track-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
	'id',
		'artist_track_id',
		'comments_id',
		'users_id=>displayname',
		array( 
			'class'=>'CButtonColumn',
			'template'=>'{delete}{update}',
		       			'deleteButtonUrl'=>'Yii::app()->createUrl("/adminpanel/genre/update", array("id"=>$data->primaryKey))',

			'deleteButtonUrl'=>'Yii::app()->createUrl("/adminpanel/genre/delete", array("id"=>$data->primaryKey))',
		),
	),
)); ?>

