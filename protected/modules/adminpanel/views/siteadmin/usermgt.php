<style>
.green
{
color:green;
}
.red
{
color:red;
}
</style>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>


<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	

	'columns'=>array(
		array(
                         'id'=>'autoId',
			 'class'=>'CCheckBoxColumn',
			 'selectableRows' => '2', 
                 	),
		'id',
	
		'email',
		array(
				'name'=>'roles_id',
				'header'=>'Roles',
				'value'=>'($data->roles_id=="1")?("Artist"):("Listener")',
			),
		array(
			'name'=>'status',
			'header'=>'Status',
			 'filter'=>array('1'=>'Yes','0'=>'No'),
                         'value'=>'($data->status=="1")?("Yes"):("No")',
			'cssClassExpression'=>'($data->status=="1")?("green"):("red")',
			
			),
		array( 
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
		        'viewButtonUrl'=>'Yii::app()->createUrl("/adminpanel/siteadmin/userdetails", array("id"=>$data->primaryKey))',
			 'updateButtonUrl'=>'Yii::app()->createUrl("/adminpanel/siteadmin/userupdate", array("id"=>$data->primaryKey))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/adminpanel/siteadmin/deleteuser", array("id"=>$data->primaryKey))',
		),
	),
)); ?>

<script>
function reloadGrid() 
{
 $.fn.yiiGridView.update('user-grid');
}
</script>
<?php echo CHtml::ajaxSubmitButton('Activate',array('siteadmin/ajaxupdate','act'=>'doActive'),array('success'=>'reloadGrid'),array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;

<?php echo CHtml::ajaxSubmitButton('In Activate',array('siteadmin/ajaxupdate','act'=>'doInactive'),array('success'=>'reloadGrid'),array('class'=>'btn btn-danger')); ?>&nbsp;&nbsp;

<?php echo CHtml::link('Add User',array('siteadmin/createuser'),array('class'=>'btn btn-white')); ?>



<?php echo CHtml::link('Profile',array('siteadmin/profileview'),array('class'=>'btn btn-success')); ?>


<?php $this->endWidget(); ?>
