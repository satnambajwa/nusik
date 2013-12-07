<?php $form=$this->beginWidget('CActiveForm', array(
	//'id'=>'user-details-signup',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
 <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/autosuggest.css" type="text/css" media="screen" >
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/autosuggest.js"></script>
<div class="main">
	<div id="holder"> 
		 <?php echo CHtml::textField('search', '',array('placeholder'=>'Search','id'=>'keyword')); ?>
		 
		 <?php echo CHtml::dropDownList('filter','',array('1'=>'Search by Location','2'=>'Search by genre'),array('id'=>'sby')); ?>&nbsp;&nbsp;
		 <?php echo CHtml::hiddenField('search', Yii::app()->createUrl("adminpanel/siteadmin/autosuggest"),array('placeholder'=>'Search','id'=>'autosuggesturl')); ?>
	 <?php echo $form->labelEx($model,'genres_id'); ?>

		<?php $countryList	= genres::model()->findAll();
  		$list = CHtml::listData($countryList, 'id', 'name');

		echo $form->dropDownList($model, 'geners_id', $list,array('empty'=>'Select a Country',
                        'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('Site/dynamicGenres'),
                        'update' => "#ArtistsProfile_user_id"
                    ) ));
	 ?>
	 <?php //echo $form->labelEx($model,'profile_id'); ?>
			<?php
		$countryList	= profile::model()->findAll();

  		$list = CHtml::listData($countryList, 'id', 'cities_id');
				//CVarDumper::dump($list,10,1);die;

			?>
		<?php 
		  echo $form->dropDownList($model,'profile_id',$list,array('empty'=>'--Select a City--'));?>
	<?php echo $form->error($model,'cities_id'); ?>
	
	</div>
	 <div id="ajax_response">
	


	 </div>
	 	 <?php $this->endWidget(); ?>

</div>
