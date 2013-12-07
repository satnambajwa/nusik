<script>
$(document).ready(function()
{
	$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("adminpanel/city/loadcountry"); ?>',
			beforeSend:function()
			{
			
			},
			success:function(response)
			{
			$("#country").html(response);
			//$.fn.yiiGridView.update('genere-grid');
			}
		});
});
</script>
<script>
function saverecord()
{
	$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("adminpanel/city/addcity"); ?>',
			data:$("#frm").serialize(),
			beforeSend:function()
			{
			$("#ld").html('');
			$("#ld").html('<img src="images/loading1.gif">');
			},
			success:function(response)
			{
			alert(response);
			$("#ld").html('');
			$.fn.yiiGridView.update('city-grid');
			}
		});
}
</script>
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'frm', 'enableAjaxValidation'=>true,)); ?>
<?php
 echo CHtml::link('Country Management',array('siteadmin/country'),array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;
<?php echo CHtml::link('City Management',array('siteadmin/city'),array('class'=>'btn btn-info')); ?>&nbsp;&nbsp;
<?php echo CHtml::link('Genere Management',array('genre/genremgt'),array('class'=>'btn btn-white')); ?>&nbsp;&nbsp;<div id="ld" style="position:relative;top:20;"></div><br><br>
	<div class="span10">

<h3>City Management</h3>
<br>
<?php echo CHtml::dropDownList('country','',array(),array('id'=>'country')); ?>&nbsp;&nbsp;
<?php echo CHtml::textField('cityname','', array('id'=>'cityname')); ?>&nbsp;&nbsp;<br>
<?php echo CHtml::link('Add City','javascript:void(0)',array('class'=>'btn btn-danger','onclick'=>'saverecord();')); ?>&nbsp;&nbsp;
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'city-grid',
	//'dataProvider'=>$dataProvider,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array 
		(
		'header'=>'Country Name',
		'value'=>'$data->country->name',
		),
		'name',
		/*array( 
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		       'updateButtonUrl'=>'Yii::app()->createUrl("/adminpanel/city/cityupdate", array("id"=>$data->primaryKey))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/adminpanel/siteadmin/deletecity", array("id"=>$data->primaryKey))',
		),*/
		),
		
));
?></div>
<?php $this->endWidget();?>