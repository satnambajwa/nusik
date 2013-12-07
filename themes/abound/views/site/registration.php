<?php
/* @var $this SiteController */
/* @var $error array */

$baseUrl= Yii::app()->theme->baseUrl;
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-registration',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'action'=>$this->createUrl('site/registration'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<section class="container-fluid">
	<section class="span12">
			 <div class="span5 border-radius10 padding-soundline20 bgcolor-white">
					<span class="span5"> <img src="<?php echo $baseUrl;?>/img/logos.png" class="span3"/></span>
					<span class="span5"><h2 class="color-darkblue mgleft20 ">a new way to discover Music</h2></span>
					
					<span class="span4 mgtop10">
								<h4 class="font-segoe  color-black"> Why you'll love Nusik</h4>
								<p class="font-segoe14 mgtop10 span4"><img src="<?php echo $baseUrl;?>/img/genre.png" class="small-icon"/><span class="mgleft5">Discover New Music All day</span></p>
								<p class="font-segoe14 mgtop10 span4"><img src="<?php echo $baseUrl;?>/img/genre.png" class="small-icon"/><span class="mgleft5">More then 2000+ registered Artists</span></p>
								<p class="font-segoe14 mgtop10 span4 "><img src="<?php echo $baseUrl;?>/img/genre.png" class="small-icon"/><span class="mgleft5">Showcasing Fresh Talent </span></p>
								<p class="font-segoe14 mgtop10 span4"><img src="<?php echo $baseUrl;?>/img/genre.png" class="small-icon"/><span class="mgleft5">Follow your fevorite Artist</span></p>
								<p class="font-segoe14 mgtop10 span4"><img src="<?php echo $baseUrl;?>/img/genre.png" class="small-icon"/><span class="mgleft5">10,000+ Songs uploaded so far</span></p>
								<p class="font-segoe14 mgtop10 span4"><img src="<?php echo $baseUrl;?>/img/genre.png" class="small-icon"/><span class="mgleft5">Follow the story of your fevorite Song</span></p>
								<span class="span4 "><a href="" class="btn btn-info pull-right mgtop20 padding10"> Know More about Nusik</a></span>
								
					</span>
					
			 </div>
			 <section class="span6 bgcolor-white border-radius10">
								<span class="span4 mgtop30">
								<ul class="nav nav-tabs span4">
									<li class="active"><a href="#songs" data-toggle="tab"><b>Basic Info</b></a></li>
									<li><a href="#activity"  data-toggle="tab"><b>Upload Photo</b></a></li>
									<li><a href="#activity"  data-toggle="tab"><b>Artist Info</b></a></li>
								</ul>
							</span>
								<span class="span6 tab-content">
										
									 <article class="tab-pane active" id="songs"> 
										<table class="span5 line-height20" cellpadding="10px" cellspacing="20px">
									
									 <tr>
										<td><h4>First Name:</h4></td>
										<td><?php echo $form->textField($model,'first_name',array('size'=>30,'maxlength'=>45)); ?></td>
									</tr>
									<tr>
										<td><h4>Last Name:</h4></td>
										<td><?php echo $form->textField($model,'last_name',array('size'=>30,'maxlength'=>45)); ?></td>
									</tr>
									<tr>
										<td><h4>Gender:</h4></td>
										<td><?php  echo $form->dropDownList($model,'gender', array('Male'=>'Male','Female'=>'Female'));?></td>
									</tr>
									<tr>
									<td><h4>Date of Birth:</h4> </td>
									<td>						<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
									$this->widget('CJuiDateTimePicker',array(
										'model'=>$model, //Model object
										'attribute'=>'date_of_birth', //attribute name
										'mode'=>'date', //use "time","date" or "datetime" (default)
										'options'=>array("dateFormat"=>'yy/mm/dd'), // jquery plugin options
										'language' => '',
									));
								?></td>
									</tr>
									<tr>
										<td><h4>Country:</h4></td>				
										<td><?php $countryList	= Countries::model()->findAll();
												$list = CHtml::listData($countryList, 'id', 'name');
												echo $form->dropDownList($model, 'countries_id', $list,array('empty'=>'Select a Country',
														'ajax' => array(
														'type' => 'POST',
														'url' => CController::createUrl('site/dynamicCity'),
														'update' => "#Profile_city_id"
													) ));
												?>
										</td>
									</tr>
									<tr>
										<td><h4>Country:</h4></td>
										<td><?php $listcity=CHtml::listData(cities::model()->findAll(), 'id','name'); ?>
											<?php 
											echo $form->dropDownList($model,'cities_id',$listcity,array('empty'=>'--Select a City--'));?>
										</td>
									</tr>
									<tr>
										<td><h4>Zip Code:</h4></td>
										<td><?php echo $form->textField($model,'zip_code',array('size'=>45,'maxlength'=>7)); ?></td>
									</tr>
									<tr>
										<td><h4>Contact:</h4></td>
										<td><?php echo $form->textField($model,'contact_no',array('size'=>45,'maxlength'=>16)); ?></td>
									</tr>
									<tr>
										<td><h4>Image:</h4></td>				
										<td><?php echo $form->fileField($model,'image'); ?></td>
									</tr>
									<tr>
										<td><h4>Cover Photo:</h4></td>
										<td><?php echo $form->fileField($model,'cover_photo'); ?></td>
									</tr>
								
						</table>
									<p class="span5 mgtop10"> <sup>*</sup>By clicking "Create Profile" you will be accepting our <a href="#">"Terms & Conditions"</a></p>
									<span class="span5  padding20"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create Profile' : 'Save',array('class'=>'btn btn-primary large pull-right')); ?></span>
									</article>
								</span>
					</section>
	</section>
</section>	
		
<?php $this->endWidget(); ?>