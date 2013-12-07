<?php
 echo CHtml::link('Country Management',array('siteadmin/country'),array('class'=>'btn btn-info')); ?>&nbsp;&nbsp;
<?php echo CHtml::link('City Management',array('city/citymgt'),array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;
<?php echo CHtml::link('Genere Management',array('genre/genremgt'),array('class'=>'btn btn-white')); ?>&nbsp;&nbsp;<br><br>
<h3>Profile View</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'artists-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
	'id',
		'report_id',
		'last_name',
		'artist_track_id',
		'users_id',
		'comments',
		'add_date',
	
		array( 
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/adminpanel/siteadmin/deletegenre", array("id"=>$data->primaryKey))',
		),
		),
		
)); ?>
