<center>
<br>
<table width="50%">
<tr>
<td>
<h1>Account Details</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'created_date',
		),
)); ?>
</td></tr>
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
<h1>Users Profile</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$profilemodel,
	'attributes'=>array(
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
<?php
}
?>
</td></tr>
</table>

</center>