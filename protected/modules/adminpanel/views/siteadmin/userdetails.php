<center>
<br>
<table width="50%">
<tr>
<td>
<h4>Account Details</h4>
<?php
//here used the show the data 
 /*$this->widget('zii.widgets.CDetailView', array(

				'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
'attributes'=>array(
		'id',
		'email',
		'created_date',
		),
	'data'=>$model,
	
)); */?>
<div class="row-fluid">

	<div class="span16">
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
			'email',
		'created_date',
		),
)); ?></td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
<?php 
if($profilemodel===null)
{
echo "Profile is not created";	
}
else
{
?>
<h4>Users Profile</h4>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$profilemodel->search(),
	//'data'=>$profilemodel,
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
		
		),
)); ?>
	</div><!--/span-->
</div><!--/row-->
<?php
}
?>
</td></tr>
</table>

</center>