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
		'first_name',
		'last_name',
		'gender',
		'date_of_birth',
		'countries.name',
		'cities.name',
		'contact_no',
		'zip_code',
		'last_updated',
		array( 
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/adminpanel/siteadmin/deletegenre", array("id"=>$data->primaryKey))',
		),
		),
		
)); ?>
