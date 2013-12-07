<?php echo CHtml::link('Reports on Comments',array('report/commentreports'),array('class'=>'btn btn-info')); ?>&nbsp;&nbsp;
<?php echo CHtml::link('Reports on Track',array('report/trackreports'),array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;
<?php echo CHtml::link('Reports on Profile',array('report/profilereports'),array('class'=>'btn btn-white')); ?>&nbsp;&nbsp;<br><br>
	<div class="span10">

<h3>Reports on Users Comments</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		array(
		'header'=>'Users',
		'value'=>'$data->users->email',
		),
		array 
		(
		'name'=>'report_id',
		'value'=>'$data->report->title',
		),
		array 
		(
		'name'=>'comments_id',
		'value'=>'$data->comments->comment_text',
		),
		array( 
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
		       
			'deleteButtonUrl'=>'Yii::app()->createUrl("/adminpanel/report/deletecom", array("id"=>$data->primaryKey))',
		),
		),
)); ?>
</div>