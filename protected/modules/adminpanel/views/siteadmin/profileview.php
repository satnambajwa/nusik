<h3>Profile View</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'profile-grid',
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
			'deleteButtonUrl'=>'Yii::app()->createUrl("/adminpanel/siteadmin/deleteprofile", array("id"=>$data->primaryKey))',
		),
		),
		
)); ?>
