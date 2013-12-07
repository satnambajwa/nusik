

<h1>Manage Artist Track Comments</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'artist-track-has-comments-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'artist_track_id',
		'comments_id',
		'users_id',
			array(
		'header'=>'Users Name',
		'value'=>'$data->users->display_name',
		),
			array( 
			'class'=>'CButtonColumn',
			'template'=>'{delete}',

			'deleteButtonUrl'=>'Yii::app()->createUrl("/adminpanel/genre/deleteartisthastrack", array("id"=>$data->primaryKey))',
		),
	),
)); ?>
