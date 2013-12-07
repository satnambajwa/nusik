<?php
$baseUrl= Yii::app()->theme->baseUrl;
?>
<script src="<?php echo $baseUrl;?>/js/common.js" type="text/javascript"></script>
	

<?php
//Find time difference
function timeDifference($timeEnd, $timeStart){
  $tResult = round(abs(strtotime($timeEnd) - strtotime($timeStart)));
  return gmdate("H:i", $tResult);
}
?>

	<section class="container-fluid  bgcolor-white">
	
		<div class="row-fluid">
			<span class="span8 offset1"><p class="heading">My Soundline</p></span>
			<?php if($modelProfile->users->roles_id=='1'){ ?>		<span class="span3">
<a href="#song"class="btn btn-info btn-block btn-large " data-toggle="modal">Upload a Song</a>
			</span><?php }?>
			<hr width="100%" class="mgtop50"/>
			
		</div>	
		<div class="row-fluid bgcolor-white">
			<!-- Feed Section-->
			<section class="span8 soundline-data">
            	<div class="span12">
				<div class="thumbnails">
                	<?php $sLineFeed=Soundline::model()->findAll();
								if(count($sLineFeed)==0)
								 echo '<h4><i>No Feed Availbale</i></h4>';  
								$sLineFeed=array_reverse($sLineFeed);
								foreach($sLineFeed as $feed)
								{
									//CVarDumper::dump($feed,10,1);die;
									if($feed->type=='post')
									{
										$feedPost=ArtistTrack::model()->findByAttributes(array('id'=>$feed->activity_id));
										$img=(isset($feedPost->users->profiles[0]->image))?ImageFly::Instance()->get($feedPost->users->profiles[0], 'image', 250, 250):'';
										$dname=(isset($feedPost->users->display_name))?$feedPost->users->display_name:'';
				//						
						
						?>
								<!--shared a song-->
								<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnail">
												<a href="<?php echo $this->createUrl('site/ajaxprofile',array('id'=>$feedPost->users->id));?>"class="navlink"><img src="<?php echo (!$img=='')? $img:$baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><?php echo $dname;?></p></a>
											</span>
											<span class="span12"><h5 class="span10">has Posted</h5></span>
											<span class="span12"><h7><b></b></h7><a href=""><img src="<?php echo $baseUrl; ?>/img/play.png"/></a> <a href="<?php echo $this->createUrl('site/song',array('sid'=>$feedPost->id)); ?>" class="navlink"><?php echo $feedPost->song_name;?></a>
											<?php $gen=isset($feedPost->users->profiles[0]->artistsProfiles[0]->geners)?$feedPost->users->profiles[0]->artistsProfiles[0]->geners->name:'None'?>
										<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href=""> <?php echo $gen;?></a></span>
											</span>
											
											<span class="span6 offset5">
													<img src="<?php echo $baseUrl;?>/img/likes.png" class="small-icon" title="Like" />
													<img src="<?php echo $baseUrl;?>/img/share.png" title="span2" class="small-icon"/>
													<img src="<?php echo $baseUrl;?>/img/share.png" title="span2" class="small-icon"/>
													<img src="<?php echo $baseUrl;?>/img/down.png" title="span2" class="small-icon"/>
											</span>
											<span class="span12"><small class="offset7 mgtop10">10 mins ago</small></span>
								</div>
							<?php } 
									elseif($feed->type=='follow')
									{
										$feedFollow=Follower::model()->findByAttributes(array('id'=>$feed->activity_id));
										$img=(isset($feedFollow->users->profiles[0]->image))?ImageFly::Instance()->get($feedFollow->users->profiles[0], 'image', 250, 250):'';
										$dname=(isset($feedFollow->users->display_name))?$feedFollow->users->display_name:'';
										$role=(isset($feedFollow->users->roles_id))?$feedFollow->users->roles_id:'';
										$userid=(isset($feedFollow->users->id))?$feedFollow->users->id:'';
										$lrole=(isset($feedFollow->artistsProfile->profile->users->roles_id))?$feedFollow->artistsProfile->profile->users->roles_id:'';
										$luserid=(isset($feedFollow->artistsProfile->profile->users->id))?$feedFollow->artistsProfile->profile->users->id:'';
										
										$uimg=(isset($feedFollow->artistsProfile->profile->image))?ImageFly::Instance()->get($feedFollow->artistsProfile->profile, 'image', 40, 40):'';			
										$pname=	(isset($feedFollow->artistsProfile->profile->users->display_name))?$feedFollow->artistsProfile->profile->users->display_name:'';			
							?>
								<!--Following-->
								<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnail">
												<!-- Pic of Followee(Follower)-->
												<a href="<?php echo ($role=="1")? $this->createUrl('site/ajaxprofile',array('id'=>$userid)):$this->createUrl('site/ajaxlistener',array('id'=>$userid));?>"class="navlink"><img src="<?php echo (!$img=='')? $img:$baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><?php echo $dname;?></p></a>
											</span>
											<span class="span12 mgtop10"><h5 class="span6">is following</h5><span class="span6 thumbnail">
												<!-- pic Whome he is following-->
													<a href="<?php echo ($lrole=="1")? $this->createUrl('site/ajaxprofile',array('id'=>$luserid)):$this->createUrl('site/ajaxlistener',array('id'=>$luserid));?>"class="navlink"><img src="<?php echo (!$uimg=='')?$uimg:$baseUrl.'/img/profile-placeholder.jpg';?>" class="img-small mgleft5" />
												<p align="center"><?php echo $pname;?> </p></a>
											</span> </span>
											
											<span class="span12 mgtop40"><small class="offset6"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?>hours ago</small></span>
								</div>
								<?php } 
								      elseif($feed->type=='sshare')
									  { 
									    $feedSongShare=Sharing::model()->findByPk($feed->activity_id);
										$img=(isset($feedSongShare->users->profiles[0]->image))?ImageFly::Instance()->get($feedSongShare->users->profiles[0], 'image', 250, 250):'';
										$dname=(isset($feedSongShare->users->display_name))?$feedSongShare->users->display_name:'';
										
									  ?>
								<!--Shared a song-->
									<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnail">
												<img src="<?php echo (!$img=='')?$img:$baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><?php echo $dname;?></p>
											</span>
												<span class="span12"><h5 class="span6">has shared</h5></span>
											<span class="span12 mgtop-20"><a href="<?php echo $this->createUrl('site/song/',array('sid'=>$feedSongShare->artistTrack->id));?>" class="navlink"><img src="<?php echo $baseUrl; ?>/img/play.png"/><?php echo $feedSongShare->artistTrack->song_name;?></a>
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/mic.png" /><a href="<?php echo $this->createUrl('site/ajaxprofile',array('id'=>$feedSongShare->artistTrack->users->id));?>" class="mgleft5 navlink"><?php echo $feedSongShare->artistTrack->users->display_name ;?></a></span>
												<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href="">  <?php echo $feedSongShare->artistTrack->users->profiles[0]->artistsProfiles[0]->geners->name;?></a></span>
											</span>
											<span class="span12 mgtop-10"><small class="offset5"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?> hours ago</small></span>
								</div>
								<?php }
								 	   elseif($feed->type=='slike')
									   {
									     $feedSongLike=SongsLike::model()->findByPk($feed->activity_id);
   									     $img=(isset($feedSongLike->users->profiles[0]->image))?ImageFly::Instance()->get($feedSongLike->users->profiles[0], 'image', 250, 250):'';
										 $dname=(isset($feedSongLike->users->display_name))?$feedSongLike->users->display_name:'N/A';
										
									  ?> 
									  <!-- Song Like-->
									  <div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnail">
												<img src="<?php echo (!$img=='')? $img:$baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><?php echo $dname;?></p>
											</span>
												<span class="span12"><h5 class="span6">has liked</h5></span>
											<span class="span12 mgtop-20"><a href="<?php echo $this->createUrl('site/song/',array('sid'=>$feedSongLike->artistTrack->id));?>" class="navlink"><img src="<?php echo $baseUrl; ?>/img/play.png"/><?php echo $feedSongLike->artistTrack->song_name;?></a>
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/mic.png" /><a href="<?php echo $this->createUrl('site/ajaxprofile',array('id'=>$feedSongLike->artistTrack->users->id));?>" class="mgleft5 navlink"><?php echo $feedSongLike->artistTrack->users->display_name ;?></a></span>
												<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href="">  <?php echo $feedSongLike->artistTrack->users->profiles[0]->artistsProfiles[0]->geners->name;?></a></span>
											</span>
											<span class="span12 mgtop-10"><small class="offset5"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?> hours ago</small></span>
								</div>	
								<?php }
								 	   elseif($feed->type=='scomment')
									   {
									     $feedSongComment=ArtistTrackHasComments::model()->findByAttributes(array('comments_id'=>$feed->activity_id));
   									     $img=(isset($feedSongLike->users->profiles[0]->image)) ? ImageFly::Instance()->get($feedSongLike->users->profiles[0], 'image', 250, 250):'';
										 $dname=(isset($feedSongLike->users->display_name))?$feedSongLike->users->display_name:'';
										
									  ?> 
									  <!-- Song Comment-->
									  <div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnail">
												<img src="<?php echo (!$feedSongComment->users->profiles[0]->image=='')? $img : $baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><?php echo $feedSongComment->users->display_name;?></p>
											</span>
											<span class="span12 mgtop10"><p class="span12">Commented on Track <a href="<?php $this->createUrl('site/song',array('sid'=>$feedSongComment->artistTrack->id));?>" class="navlink"><?php echo $feedSongComment->artistTrack->song_name;?></a></p>
												<span class="span11 thumbnail"><p align="center"> <?php echo substr($feedSongComment->comments->comment_text,0,15);?></p></span>
											</span>			
											<span class="span6 offset5">
												<span class="span12 offset10">
													<img src="<?php echo $baseUrl;?>/img/share.png" class="small-icon" title="Like" />
												</span>	
											</span>							
											<span class="span12"><small class="offset6"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?>hours ago</small></span>
								</div>
								<?php }
								        elseif($feed->type=='like')
										{
											$feedFollow=Follower::model()->findByAttributes(array('id'=>$feed->activity_id,'is_liked'=>1));
											$img=(isset($feedFollow->users->profiles[0]->image))? ImageFly::Instance()->get($feedFollow->users->profiles[0], 'image', 250, 250):'';
											$dname=(isset($feedFollow->users->display_name))?$feedFollow->users->display_name:'';
		
											$uimg=(isset($feedFollow->artistsProfile->profile->image))?ImageFly::Instance()->get($feedFollow->artistsProfile->profile, 'image', 40, 40):'';			
											$pname=	(isset($feedFollow->artistsProfile->profile->users->display_name))?$feedFollow->artistsProfile->profile->users->display_name:'';			
									?>
								<!--Liked an artist-->
								<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnail">
												<!-- Pic of Followee(Follower)-->
												<img src="<?php echo (!$img=='')? $img:$baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><?php echo $dname;?></p>
											</span>
											<span class="span12 mgtop10"><h5 class="span6">has liked</h5><span class="span6 thumbnail">
												<!-- pic Whome he is following-->
												<img src="<?php echo (!$uimg=='')?$uimg:$baseUrl.'/img/profile-placeholder.jpg';?>" class="" />
												<p align="center"><?php echo $pname;?> </p>
											</span> </span>
											
											<span class="span12"><small class="offset6 mgtop10"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?>hours ago</small></span>
								</div>
								<?php }
								       elseif($feed->type=='comment')
									   {
							  		   $feedComment=ProfileHasComments::model()->findByAttributes(array('comments_id'=>$feed->activity_id));
										//CVarDumper::dump($feedComment->profile->users->display_name,10,1);die;
   										 // CVarDumper::dump($feedComment->users->profiles,10,1);die;
										   
									   ?>	
								<!--Made a comment-->	
								<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnail">
												<img src="<?php echo (!$feedComment->users->profiles[0]->image=='')? ImageFly::Instance()->get($feedComment->users->profiles[0], 'image', 250, 250) : $baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><?php echo $feedComment->users->display_name;?></p>
											</span>
											<span class="span12 mgtop10"><p class="span12">Commented on <?php echo $feedComment->profile->users->display_name; ?>'s profile</p>
												<span class="span11 thumbnail"><p align="center"> <?php echo $feedComment->comments->comment_text;?></p></span>
											</span>			
											<span class="span6 offset5">
												<span class="span12 offset10">
													<img src="<?php echo $baseUrl;?>/img/share.png" class="small-icon" title="Like" />
												</span>	
											</span>							
											<span class="span12"><small class="offset6"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?>hours ago</small></span>
								</div>
								<?php } 
								       elseif($feed->type=='likeSong')
									   {	?>
								<!--Liked a song-->
								<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnail">
												<img src="<?php echo $baseUrl;?>/img/5.jpg" />
												<p align="center">Sonu</p>
											</span>
												<span class="span12"><h5 class="span6">Liked</h5></span>
											<span class="span12 mgtop-20"><a href=""><img src="<?php echo $baseUrl; ?>/img/play.png"/>Tum Hi Ho</a>
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/mic.png" /><a href="" class="mgleft5">Atif Aslam</a></span>
											
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href=""> Genre Type</a></span>
											</span>
											<span class="span12"><small class="offset6"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?>hours ago</small></span>
								</div>
								<?php }
								}//loopclosed
								?>

        
        
        
        
        
        
        				
						
						
						
						
								
				</div>
                </div>
	  	</section>
			
            
            
            <!--Side Bar-->
			<section class="span4">
				
				<div class="span11 border-radius10 bgcolor-light">
				<span class="span12">
						<ul class="nav nav-tabs span11">
							<li class="active"><a href="#songs" data-toggle="tab"><b>Most Shared</b></a></li>
							<li><a href="#activity"  data-toggle="tab"><b>Most Liked</b></a></li>
						</ul>
					</span>
					<span class="span12 tab-content list-overflow">
					<!-- List of Songs-->
	                    <article class="tab-pane span12 active" id="songs"> 
                    	<?php 
							$mostShared=ArtistTrack::model()->findAll(array('order'=>'total_shares'));
							$mostShared=array_reverse($mostShared);
							foreach($mostShared as $songList)
							{
							?>
							<div class="row-fluid padding-list5">		
									<span class="span3  bgcolor-white thumbnail">
										<a href="<?php echo $this->createUrl('site/ajaxprofile',array('id'=>$songList->users->id));?>" title="Go to <?php  echo $songList->users->display_name;?>'s Profile " class="navlink"><img src="<?php echo (!$songList->users->profiles[0]->image=='')? ImageFly::Instance()->get($songList->users->profiles[0], 'image', 150, 150) : $baseUrl.'/img/profile-placeholder.jpg';?>" />
											<p align="center"><?php echo $songList->users->display_name;?></p></a>
										</span>
									<div class="span9 ">
										<span class="span11 bgcolor-white thumbnail"> <p class="span12 mgtop20"><a href="javascript:void(0)" onclick="playsongs(<?php echo $songList->id; ?>,'<?php echo htmlspecialchars(Yii::app()->createUrl("site/playsongs")); ?>','<?php echo Yii::app()->baseUrl; ?>');"> <img src="<?php echo $baseUrl;?>/img/play.png"/></a>
										<a href="<?php echo $this->createUrl('site/song',array('sid'=>$songList->id));?>" class="navlink" title="Go to Song Page"> <?php echo $songList->song_name; ?> </a> </p>
										<p class="span5 offset7 mgtop5"><?php echo  CHtml::ajaxLink('<img src="'.$baseUrl.'/img/likes.png" id="song-likes" class="small-icon" title="'.$songList->total_likes.' Likes" />', $this->createUrl("site/songOption",array('uid'=>Yii::app()->user->id,'sid'=>$songList->id,'type'=>'like')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#song-likes").attr("title")=html; }' ), $htmlOptions=array() ) ?>

										<?php echo  CHtml::ajaxLink('<img src="'.$baseUrl.'/img/share.png" class="small-icon" title="'.$songList->total_shares.' Shares" />', $this->createUrl("site/songOption",array('uid'=>Yii::app()->user->id,'sid'=>$songList->id,'type'=>'share')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#").html(html); }' ), $htmlOptions=array() ) ?>
										<?php $urlDown=Yii::app()->baseUrl.'/songs/'.$songList->song_url;
															  $urlDown=str_replace("/",'\\',$urlDown);	?>	  
														 <a href="<?php echo $urlDown;?>"><img src="<?php echo $baseUrl;?>/img/down.png" title="Download" class="small-icon"/></a>
														 </span>
									</div>
									
							</div>
							
							<?php }?>
							
						
						</article>
					<!-- List of Recent Updates-->
  					    <article class="tab-pane table-overflow" id="activity"> 
						 	<?php 
							$mostShared=ArtistTrack::model()->findAll(array('order'=>'total_likes'));
							$mostShared=array_reverse($mostShared);
							foreach($mostShared as $songList)
							{
							?>
							<div class="row-fluid padding-list5">		
														
														<span class="span3  bgcolor-white thumbnail">
											<a href="<?php echo $this->createUrl('site/ajaxprofile',array('id'=>$songList->users->id));?>"  class="navlink" title="Go to <?php  echo $songList->users->display_name;?>'s Profile "><img src="<?php echo (!$songList->users->profiles[0]->image=='')? Yii::app()->baseUrl.'/images/'.$songList->users->profiles[0]->image : $baseUrl.'/img/profile-placeholder.jpg';?>" />
											<p align="center"><?php echo $songList->users->display_name;?></p></a>
										</span>
									<div class="span9  bgcolor-white">
										<span class="span12 thumbnail">
										<p class="span12 mgtop20"><a href="" title="Play this Song">
										<img src="<?php echo $baseUrl;?>/img/play.png" /></a>
										<a href="<?php echo $this->createUrl('site/song',array('sid'=>$songList->id));?>" class="navlink" title="Go to Song Page">
										<?php echo $songList->song_name; ?>
										</a>
										</p>
										<p class="span5 offset7 mgtop5"><?php echo  CHtml::ajaxLink('<img src="'.$baseUrl.'/img/likes.png" id="song-likes" class="small-icon" title="'.$songList->total_likes.' Likes" />', $this->createUrl("site/songOption",array('uid'=>Yii::app()->user->id,'sid'=>$songList->id,'type'=>'like')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#song-likes").attr("title")=html; }' ), $htmlOptions=array() ) ?>

										<?php echo  CHtml::ajaxLink('<img src="'.$baseUrl.'/img/share.png" class="small-icon" title="'.$songList->total_shares.' Shares" />', $this->createUrl("site/songOption",array('uid'=>Yii::app()->user->id,'sid'=>$songList->id,'type'=>'share')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#").html(html); }' ), $htmlOptions=array() ) ?>
										<?php $urlDown=Yii::app()->baseUrl.'/songs/'.$songList->song_url;
															  $urlDown=str_replace("/",'\\',$urlDown);	?>	  
														 <a href="<?php echo $urlDown;?>"><img src="<?php echo $baseUrl;?>/img/down.png" title="Download" class="small-icon"/></a>
														 </span>
									</div>
									
							</div>
							
							<?php }?>
						
						</article>
		</span>	
				</div>
			
			</section>
			
			
		</div>
		<!-- Upload Song -->
		<!--<section class="row-fluid">
		  <section id="song" class="modal hide fade">
			 <header class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h1>NUSIK</h1>
			 </header>
			   <div class="modal-body">
			   <?php  echo CHtml::beginForm(' ','post',array('enctype'=>'multipart/form-data','id'=>'frm','name'=>'frm')); ?>
					<table cellspacing="5" cellpadding="" style="margin:auto;">
				  	<tr><td>Song Name</td></tr>
					<tr><td><?php echo CHtml::textField('sname'); ?></td></tr>
					<tr><td>Browse</td></tr>
					<tr><td><?php echo Chtml::fileField('track'); ?></td></tr>
					<tr><td><input type="hidden" value="<?php echo Yii::app()->createUrl("site/uploadsong"); ?>" id="upsurl"></td></tr>
					<tr><td><span style="color:red">Only 2MB File Allowed.</span></td></tr>
					<tr><td>Song Description</td></tr>
					<tr><td><?php echo CHtml::textArea('sdescription') ?></td></tr>
					 <tr><td><?php echo CHtml::submitButton('Upload',array('name'=>'uploadfile','class'=>'btn btn-danger')); ?><div id="loading"></div></td></tr>
					</table>
					<?php echo CHtml::endForm(); ?>
			 </div>
			<footer class="modal-footer">
			   <button class="btn btn-info" data-dismiss="modal">Close</button>
		   </footer>
	</section>
</section>-->
			<section class="row-fluid">
		  <section id="song" class="modal hide fade">
			 <header class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h1>NUSIK</h1>
			 </header>
			   <div class="modal-body">
			   <?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'Upload-Song',
					'action'=>$this->createUrl('site/SongUpload'),
					'htmlOptions'=>array('enctype'=>'multipart/form-data'),
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				 )); ?>
					 <table cellspacing="5" cellpadding="" style="margin:auto;">
				  
						<tr><td>Song Name</td></tr>
						<tr><td><?php echo $form->textField($model,'song_name',array('size'=>45,'maxlength'=>45));?></td></tr>
						<tr><td>Browse</td></tr>
						<tr><td><?php echo $form->fileField($model,'song_url');?></td></tr>
						<tr><td>Song Description</td></tr>
						<tr><td><?php echo $form->textArea($model,'song_discription',array('size'=>45,'maxlength'=>45));?></td></tr>
					   
						<tr><td><?php echo CHtml::submitButton('Post','',$this->createUrl('site/songupload'),array('class'=>'btn btn-danger'));?></td></tr>
					</table>
					 
					
				   
	<?php $this->endWidget(); ?>
				   
			 </div>
			<footer class="modal-footer">
			   <button class="btn btn-info" data-dismiss="modal">Close</button>
		   </footer>
	</section>
</section>



	</section>
