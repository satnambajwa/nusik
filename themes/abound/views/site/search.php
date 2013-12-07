<?php
$baseUrl= Yii::app()->theme->baseUrl;
?>

<style>
input[type='text']{height:40px; border:none; padding:none; box-shadow:none; font-size:17px; font-weight:inherit;}
input[type='submit']{height:40px;}
</style>

<?php // CVarDumper::dump($model,10,1);die;?>


<section class="container-fluid">
	<section class="span11 offset1 border-radius10 padding-bottom10 bgcolor-white">
		
				<aside class="span2">
					<div class="mgleft-40">
					 <h3 class=""> Search </h3>
			   <ul class="nav nav-list span2 dropdown pull-left" style="width:100px;" id="">
				  <li class="active"><a href="#" class="">All Results</a></li>
				  <li><a href="#">By Genre</a></li>
				  <li><a href="#">By Location</a></li>
				</ul>
 					</div>
				</aside>
				<div id="search" class="span6 search-text mgtop20">
				<?php 
					
					 $form=$this->beginWidget('CActiveForm', array(
				'id'=>'search',
				'action'=>$this->createUrl('site/search'),
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			 ));
					 echo CHtml::textField('search','',array('class'=>'span5','text'=>$search,'placeholder'=>$search));
					 
					 $src=$baseUrl.'/img/search2.png';
					echo CHtml::imageButton($src, array('class'=>'mgtop-5 mgleft10'));
			?>
					
					<?php $this->endWidget(); ?>
			
				</div>
				<h5 class="span8">Showing  <?//php echo count($model);?> results for "<a href=""><small><?php echo $search;?></small></a>"</h5>
				<div class="span7">
					<?php 
					foreach($model as $result)
						{
						?>					
					<div class="row-fluid border-bottom-lightgrey ">
				
					<div class="span2 mgtop5">
						<a href="<?php echo $this->createUrl('site/profile',array('id'=>$result->profile->users->id));?>">
					  <img src="<?php echo (!$result->profile->image=='')?ImageFly::Instance()->get($result->profile, 'image', 100, 150):$baseUrl.'/img/profile-placeholder.jpg';?>" class="img-polaroid10 mg5" /></a>
					</div>
					<section id="search-result">	
						<div class="span7">
						<span class="span6"><h4 class="padding10 mgtop5 mgleft-5"><a href="<?php echo $this->createUrl('site/profile',array('id'=>$result->profile->users->id));?>"><?php echo $result->profile->users->display_name;?></a></h4></span>
						<p class="span10 mgtop-5 color-lightblue "><img src="<?php echo $baseUrl;?>/img/place.png" class="small-icon mgright5"/>
						<?php //CVarDumper::dump($result->profile->countries->name,10,1);die;
						$city=(isset($result->profile->cities->name)?$result->profile->cities->name:'');
						$country=(isset($result->profile->countries->name)?$result->profile->countries->name:'');
						?>
						<?php echo $city.','.$country;?></p>
						<p class="span10 mgtop-5  color-lightblue "><img src="<?php echo $baseUrl;?>/img/genre.png" class="small-icon mgright5"/><?php echo $result->profile->artistsProfiles[0]->geners->name;?></p> 
						<p class="span10 mgtop-5 color-lightblue "><img src="<?php echo $baseUrl;?>/img/suggesstion.png" class="small-icon mgright5"/>
							<span class="mgtop10"><?php echo $result->profile->artistsProfiles[0]->total_share;?></span> 
							<span class="color-black">|</span><img src="<?php echo $baseUrl;?>/img/heart.png" class="small-icon mgright5"/><span class="mgtop10"><?php echo $result->profile->artistsProfiles[0]->total_likes;?></span>
							<span class=" color-black">|</span><img src="<?php echo $baseUrl;?>/img/note.png" class="small-icon mgright5"/><span class="mgtop10"><?php echo $result->profile->artistsProfiles[0]->total_songs;?></span> 
						</p>
					</div>
						<div class="span2">
							<span class="span12 mgtop20"> 	<?php echo CHtml::ajaxLink( $label = 'Follow', $url =$this->createUrl("site/like",array('uid'=>$result->profile->id,'type'=>'follow')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#suggest-list").hide; }' ), $htmlOptions=array('class'=>'btn large') );?> </span>
							<span class="span12 mgtop20"> 	<?php echo CHtml::ajaxLink( $label = 'Like', $url =$this->createUrl("site/like",array('uid'=>$result->profile->id,'type'=>'like')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("this").hide; }' ), $htmlOptions=array('class'=>'btn large') );?> </span>
						</div>
					</section>
					</div>
					
					<?php }?>
					
				</div>
	</section>	
</section>