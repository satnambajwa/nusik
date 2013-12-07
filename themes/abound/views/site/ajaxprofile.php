<?php
$baseUrl= Yii::app()->theme->baseUrl;
$rooturl=Yii::app()->baseUrl;
?>
<?php
//Find time difference
function timeDifference($timeEnd, $timeStart){
  $tResult = round(abs(strtotime($timeEnd) - strtotime($timeStart)));
  return gmdate("G:i", $tResult);
}
?>
<script src="<?php echo $baseUrl;?>/js/common.js" type="text/javascript"></script>
 <script>
function comment()
{

	$.ajax({
			type:'POST',
			url:'',
			data:$("#comment").serialize(),
			success:function(response)
			{
				$('#commentCount').html(response);			
			}
		});
}
</script>


<script type="text/javascript" > 

	$(function() {
					      
		$(".a").click(function(){
			$("#tab2").show();
			$("#tab3").hide();
		});
		
		$(".b").click(function(){
			$("#tab2").hide();
			$("#tab3").show();
	     });
			
    });
	
</script>
<script>
function playlistmodal(sid)
{
$("#listmodal").modal('show');
document.getElementById("sid").value=sid;
}
</script>
<script>
function createplaylist()
{
var datastring='pname='+document.getElementById("pname").value;
	$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("user/createplaylist"); ?>',
			data:datastring,
			success:function(response)
			{
			alert(response);
			}
			
		});
}
</script>
<!-- Profile Start-->

<section class="container-fluid1">	

<div class="profile-back">
<?php if(Yii::app()->user->id==$model->users->id){?><a href="#ChangeCover" style="margin-top:70px;" data-toggle="modal" class="pull-right btn btn-primary" > Change Cover </a><?php }?>
<img src="<?php echo (!$model->cover_photo=='')? Yii::app()->baseUrl.'/images/'.$model->cover_photo: $baseUrl.'/img/Cover_placeholder.jpg';?>" class=" mgtop-20 img-polaroids"/>	
</div>

	
	<section class="profile-container">
			<!-- User profile started-->
			
			
			  
				<!-- Profile Name and right-top buttons-->
			<section class="row-fluid">
				<div class="span12">
										
				<!-- Name of Artist-->
					<div class="span6">	
					<span class="span11 color-black"><h3 class="name-font mgleft padding10"><?php echo $model->first_name.' '.$model->last_name; ?></h3>
					<!--	<span class="span12 mgtop-20 "><small class="color-darkblue offset1"><b class="mgleft10">Joined 31-Sept-2013</b></small></span>
					--></span>
				</div>
				<!-- Social Buttons-->
					<div class="span3 offset3 pull-right mgtop10">
						
						<div class="thumbnails span3 offset5"><a href="<?php echo 'https://www.twitter.com/'. $model->artistsProfiles[0]->tw_link;?>"><img src="<?php echo $baseUrl; ?>/img/twactive.png" title="Follow <?php echo Yii::app()->user->dname?> On Twitter" /></a></div>
						<div class="thumbnails span3 offset5"><a href="<?php echo 'https://www.facebook.com/'. $model->artistsProfiles[0]->fb_link;?>"><img src="<?php echo $baseUrl; ?>/img/fbactive.png" title="Like <?php echo Yii::app()->user->dname?> On Facebook"/></a></div>
				
					</div>
					</div>
				</section>
				<!-- Row Two main-profile section-->
				<section class="row-fluid">
				<!-- Sidebar with biography-->
					<span class="span4 thumbnails">
					<div class="mgleft20">
					<div class="span12 border-radius10 padding20 bgcolor-lightgrey">	
						<?php if(Yii::app()->user->id==$model->users_id) {?> <a href="#profile" class="mgtop30" data-toggle="modal"> Change Photo</a> <a href="#editbasic" class="pull-right" data-toggle="modal">Edit Info</a><?php }?>
					
					</span> 
					
					<span>
						
						<img src="<?php echo (!$model->image=='')? ImageFly::Instance()->get($model, 'image', 600, 745): $baseUrl.'/img/profile-placeholder.jpg';?>" class="img-polaroid span12" />
						
					<div class="span12 mgtop5">
						<h5 class=""><img src="<?php echo $baseUrl; ?>/img/male.png" class="mgright5"/><?php echo $model->gender;?>,
						<?php $Oyear = explode("-",$model->date_of_birth); 
							 $Nyear=explode("-",date('Y-m-d'));
							  echo $Nyear[0]-$Oyear[0];?></h5>
						<h4 class=" mgtop10"><img src="<?php echo $baseUrl; ?>/img/place.png" /> <?php echo (!$model->cities_id=='')? $model->cities->name.','. $model->countries->name:'Location, Country';?></h4>
						<p class="color-darkblue "><img src="<?php echo $baseUrl; ?>/img/email.png"/><b class="mgleft5"><?php $mail=Users::model()->findByAttributes(array('id'=>$model->users_id)); echo $mail->email;?></b></p>
							<p class=" mgtop10"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><b><span class="color-darkblue mgleft5">
							<?php echo(!$model->artistsProfiles[0]->geners)?'No Genre Added':$model->artistsProfiles[0]->geners->name;?></span></b></p><br />
				</div>
				
							<h4 class="mgleft10">ABOUT ME<?php if(Yii::app()->user->id==$model->users_id) {?>  <a href="#editBio" class="pull-right color-blue" data-toggle="modal"> <small>Edit Bio</small></a><?php }?></h4>
								<hr class="color-white mgtop-5"/>
							 <p  class="mgleft10 mgright5 font-segoe" align="justify" ><?php echo $model->artistsProfiles[0]->biography;?></p>
							<h4 class="mgleft10">ACHIEVMENTS</h4>
								<hr class="color-white mgtop-5"/>
							  <ul class="font-segoe">
							  <?php $Oyear = explode(".", $model->artistsProfiles[0]->achivement); 
							  foreach($Oyear as $achive)
							  {
								echo '<li>'.$achive.'</li>';
							 }?>
							</ul>
					</div>
					</div>
				</span>	 
				<!-- Profile Tabs and rest Informations-->	
					<div class="span8 border-radius10"  id="profile-data">
						<!-- Colored Boxes-->
							<span class="span12 mgtop20">
						<!-- Likes-->
							<span class="span2 box-blue"><img src="<?php echo $baseUrl;?>/img/likes.png"/><h4 class="mgtop5" id="likeCount">
						<?php echo ($model->artistsProfiles[0]->total_likes)?$model->artistsProfiles[0]->total_likes:'0';?></h4>
						<h6 class="mgtop-10">
						<?php if(Yii::app()->user->id==$model->users->id){ ?>Likes<?php } else{ echo CHtml::ajaxLink( $label = 'Like', $url =$this->createUrl("site/like",array('uid'=>$model->id,'type'=>'like')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#likeCount").html(html); }' ), $htmlOptions=array() );}?></h6>
					   </span>
							<!-- Songs-->
							<span class="span2 box-red"><img src="<?php echo $baseUrl;?>/img/songs.png"/><h4 class="mgtop5"><?php echo ($model->artistsProfiles[0]->total_songs)?$model->artistsProfiles[0]->total_songs:'0';?></h4><h6 class="mgtop-10"><a href="#songs">Songs</a></h6> </span>
							<!--Comments-->
							<span class="span2 box-grey"><a href="#comment" data-toggle="modal" class="pull-right"><img src="<?php echo $baseUrl;?>/img/comment.png"/><h4 class="mgtop5" id="commentCount"><?php echo ($model->artistsProfiles[0]->total_comments)?$model->artistsProfiles[0]->total_comments:'0';?></h4><h6 class="mgtop-10">Comments</h6> </a></span>
							<!--Shares-->
							<span class="span2 box-green"><img src="<?php echo $baseUrl;?>/img/shared.png"/><h4 class="mgtop5" id="shareCount"><?php echo ($model->artistsProfiles[0]->total_share)?$model->artistsProfiles[0]->total_share:'0';?></h4><h6 class="mgtop-10"><?php if(Yii::app()->user->id==$model->users->id){ ?>Share<?php } else{ echo CHtml::ajaxLink( $label = 'Share', $url =$this->createUrl("site/like",array('uid'=>$model->id,'type'=>'share')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#shareCount").html(html); }' ), $htmlOptions=array() );}?></h6> </span>
							<!--Followers-->
							<span class="span2 box-orange">
								<img src="<?php echo $baseUrl;?>/img/groups.png"/>
									<h4 class="mgtop5" id="followCount">
										<?php echo ($model->artistsProfiles[0]->total_followers)?$model->artistsProfiles[0]->total_followers:'0';?>
									</h4>
									<h6 class="mgtop-10">
							<?php if(Yii::app()->user->id==$model->users->id){ ?>Followers<?php } else{ echo CHtml::ajaxLink( $label = 'Followers', $url =$this->createUrl("site/like",array('uid'=>$model->id,'type'=>'follow')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#followCount").html(html); }' ), $htmlOptions=array() );}?> </h6> 
							</span>
						</span>
						<!-- List of Followers-->
							<div class="span12">
							<span class="span6"><h3>Followers</h3></span>
						<?php //CVarDumper::dump(count($model->artistsProfiles[0]->followers),10,1);die;?>
									<?php  if(count($model->artistsProfiles[0]->followers)>='4')
									{ ?>
									<span class="offset3 span3"><a href="<?php echo $this->createUrl('site/viewList', array('type'=>'follower', 'id'=>$model->artistsProfiles[0]->id));?>" class="listlink"><small class="btn btn-success badge mgtop20 ">View All</small></a></span>
									<?php }?>
						</div>
							<div class="span12">
								<span class="thumbnails">
											<?php 
											
													$countFollow=0;
											if(count($model->artistsProfiles[0]->followers)>0)
												   {
													$followList=Follower::model()->findAllByAttributes(array('artists_profile_id'=>$model->artistsProfiles[0]->id,'is_followed'=>'1'));	
													foreach($followList as $follow)
													{	
													  $countFollow++;
													  
													  if($countFollow>5)
													  break;
													  
													  
													  
													?>
											
										
												<span class="span2 thumbnail">
													<a href="<?php echo ($follow->users->roles->roles_name=='Artist')?$this->createUrl('site/ajaxprofile',array('id'=>$follow->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$follow->users->id));?>" class="navlink"><img src="<?php echo (!$follow->users->profiles[0]->image=='')? ImageFly::Instance()->get($follow->users->profiles[0], 'image', 150, 150): $baseUrl.'/img/profile-placeholder.jpg';?>"/>
													<p align="center"><?php echo $follow->users->display_name;?></p></a>
												</span>
										
											
													<?php }
													}
													else
													{?>
													 <h4> <i>No one Following you !!</i></h4>
													<?php } //CVarDumper::dump($countFollow,10,1);die;?>
											</span>													
							</div>
						<!-- Tabs for Songs Activity-->		
							<span class="span12 mgtop30">
								<ul class="nav nav-tabs span11">
									<li class="active"><a href="#songs" data-toggle="tab"><b>Songs</b></a></li>
									<li><a href="#tab-recent"  data-toggle="tab"><b>Recent Activity</b></a></li>
									<li><a href="#activity"  data-toggle="tab"><b>Concerts</b></a></li>
									<li><a href="#tab-comment"  data-toggle="tab"><b>Comments</b></a></li>
								</ul>
							</span>
							<!-- Both Tabs-->
							<span class="span11 tab-content table-overflow mgtop-5">
										<!-- List of Songs-->
											<article class="tab-pane active" id="songs"> 
												
												<table width="100%" class="mgleft-20">
													<tr>
														<th></th>
														<th>Song Name</th>
														<th>Artist</th>
														<th></th>
													</tr>
												<?php 
													$user=Users::model()->findByAttributes(array('id'=>$model->users_id));
													//CVarDumper::dump($user->artistTracks,10,1);die;?>
													<?php 
														if(count($user->artistTracks)>0)
														{
															$track=$user->artistTracks;
															foreach($track as $song)
															{ 
													?>
															
														<tr>
														<td><a href="javascript:void(0)" onclick="playsongs(<?php echo $song->id; ?>,'<?php echo htmlspecialchars(Yii::app()->createUrl("site/playsongs")); ?>','<?php echo Yii::app()->baseUrl; ?>');"><img src="<?php echo $baseUrl;?>/img/note.png"/></a></td>
														<td><a href="javascript:void(0)" onclick="playsongs(<?php echo $song->id; ?>,'<?php echo htmlspecialchars(Yii::app()->createUrl("site/playsongs")); ?>','<?php echo Yii::app()->baseUrl; ?>');"><?php echo $song->song_name;?></a></td>
														<td><a href="#" class="color-darkblue"><b><?php echo $song->song_name;?></b></a></td>
														<td><a href="javascript:void(0)" onclick="playlistmodal(<?php echo $song->id; ?>);"><img src="<?php echo $baseUrl;?>/img/add-list.png" title="Add to Playlist" class="small-icon"/> </a></td>
														<td id='song-option'><?php echo  CHtml::ajaxLink('<img src="'.$baseUrl.'/img/likes.png" id="song-likes" class="small-icon" title="'.$song->total_likes.' Likes" />', $url= $this->createUrl("site/songOption",array('uid'=>$model->users->id,'sid'=>$song->id,'type'=>'like')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#song-likes").attr("title")=html; }' ), $htmlOptions=array() ) ?>
														<?php echo  CHtml::ajaxLink('<img src="'.$baseUrl.'/img/share.png" class="small-icon" title="'.$song->total_shares.' Likes" />', $url=$this->createUrl("site/songOption",array('uid'=>$model->users->id,'sid'=>$song->id,'type'=>'share')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#").html(html); }' ), $htmlOptions=array() ) ?>
														<?php $urlDown=Yii::app()->baseUrl.'/songs/'.$song->song_url;
															  $urlDown=str_replace("/",'\\',$urlDown);
															  //CVarDumper::dump($urlDown,10,1);die;?>
															  
														 <a href="<?php echo $urlDown;?>"><img src="<?php echo $baseUrl;?>/img/down.png" title="Download" class="small-icon"/></a>
														
														</td>
														
													</tr>
													<?php }} else{
													  ?>
													  <h3><i><?php echo $model->users->display_name; ?> hasn't uploaded a song yet!</i></h3>
													  
													<?php }?>
												</table>
											</article>
										<!-- List of Recent Updates-->
											<article class="tab-pane table-overflow" id="tab-recent"> 
											 <?php $modelFeed=SoundLine::model()->findAllByAttributes(array('profile_id'=>$model->id));
												 $modelFeed=array_reverse($modelFeed);
												  foreach($modelFeed as $feed)
												   {
												   if(count($feed)==0)
												   continue;
											   
													if($feed->type=='post')
													{
														$dataFeed=ArtistTrack::model()->findByAttributes(array('id'=>$feed->activity_id));
														$usersInfo=Profile::model()->findByAttributes(array('users_id'=>$feed->user_id));
														$msg='has shared a song.';
													
													}											   
													if($feed->type=='comment')
													{
														$dataFeed=ProfileHasComments::model()->findByAttributes(array('comments_id'=>$feed->activity_id));
														$usersInfo=Profile::model()->findByAttributes(array('users_id'=>$feed->user_id));
														$msg='has commented on your profile.';
													}
													if($feed->type=='like')
													{
														$dataFeed=Follower::model()->findByAttributes(array('id'=>$feed->activity_id));
														$usersInfo=Profile::model()->findByAttributes(array('users_id'=>$feed->user_id));
														$msg='has liked your profile.';
													}
													if($feed->type=='follow')
													{
														$dataFeed=Follower::model()->findByAttributes(array('id'=>$feed->activity_id));
														$usersInfo=Profile::model()->findByAttributes(array('users_id'=>$feed->user_id));
														$msg='has followed you.';
													}
													if($feed->type=='share')
													{
														$dataFeed=Follower::model()->findByAttributes(array('id'=>$feed->activity_id));
														$usersInfo=Profile::model()->findByAttributes(array('users_id'=>$feed->user_id));
														$msg='has shared your profile.';
													}
												// CVarDumper::dump($dataFeed,10,1);die;
												 
											 ?>
												<div class="row-fluid">		
													<span class="span2 thumbnail">
														<img src="<?php echo (!$usersInfo->image=='')? ImageFly::Instance()->get($usersInfo, 'image', 150, 150): $baseUrl.'/img/profile-placeholder.jpg';?>" />
														<p align="center"><a href="<?php echo ($usersInfo->users->roles_id==1)?$this->createUrl('site/profile',array('id'=>$usersInfo->users_id)):$this->createUrl('site/listener',array('id'=>$usersInfo->users_id));?>
											"><?php echo $usersInfo->users->display_name;?></a></p>
													</span>
													<span class="span8 thumbnail"><p class="span12 mgtop20"><?php echo $msg; ?></p>
													<p class="span10 offset9 mgtop5"><small><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?> hours ago</small></p></span>	
													<hr class="div-border1 mgtop5" width="100%"/>
												</div>
												<?php }?>			
											</article>
										<!--List of Comments-->
											<article class="tab-pane table-overflow" id="tab-comment"> 
											 <?php  $modelComment=ProfileHasComments::model()->findAllByAttributes(array('profile_id'=>$model->id));
											 $modelComment=array_reverse($modelComment);
											   foreach($modelComment as $comment)
											   {
											   // CVarDumper::dump($comment,10,1);die;
												$name=Users::model()->findByAttributes(array('id'=>$comment->users_id));
											 ?>
												<div class="row-fluid">		
													<span class="span2 thumbnail">
														<img src="<?php echo (!$model->image=='')? ImageFly::Instance()->get($comment->profile, 'image', 150, 150): $baseUrl.'/img/profile-placeholder.jpg';?>" />
														<p align="center"><a href="<?php echo ($name->roles_id==1)?$this->createUrl('site/profile',array('id'=>$name->id)):$this->createUrl('site/listener',array('id'=>$name->id));?>
											"><?php echo $name->display_name;?></a></p>
													</span>
													<span class="span8 thumbnail"><p class="span12 mgtop20"><?php echo $comment->comments->comment_text;?></p>
													<p class="span10 offset9 mgtop5"><small><?php echo timeDifference($comment->comments->add_date,date('Y-m-d H:i'));?> hours ago</small></p></span>	
													<hr class="div-border1 mgtop5" width="100%"/>
												</div>
												<?php }?>			
											</article>
							</span>
					<!-- List of Likes-->	
							<span class="span12 thumbnails">
								<!-- Heading -->	
					
								<span class="span12 mgtop30">
								<div class="span6"><h3 class="mgleft20">Liked By <?php echo $model->users->display_name;?></h3></div>
								<?php
									$following=Follower::model()->findAllByAttributes(array('users_id'=>$model->users_id,'is_liked'=>1));
								//CVarDumper::dump(,10,1);die;?><?php  if(count($following)>='5')
									{ ?>
									<span class="span3 offset3"><a href="<?php echo $this->createUrl('site/viewList', array('type'=>'liked', 'id'=>$model->users_id));?>" class="listlink"><small class="btn btn-success badge mgtop20 mgleft20">View All</small></a></span>
									<?php }?>
									</span>					
							
									<?php 
									if(count($following))
									{
									foreach($following as $follows)
									{ 	
									//CVarDumper::dump(,10,1);die;
									?>
									<span class="span2 thumbnail">
										<a href="<?php echo ($follows->artistsProfile->profile->users->roles->roles_name=='Artist')?$this->createUrl('site/ajaxprofile',array('id'=>$follows->artistsProfile->profile->users_id)):$this->createUrl('site/ajaxlistener',array('id'=>$follows->artistsProfile->profile->users_id));?>" class="navlink"><img src="<?php echo (!$follows->artistsProfile->profile->image=='')?ImageFly::Instance()->get($follows->artistsProfile->profile, 'image', 150, 150):$baseUrl.'/img/profile-placeholder.jpg';?>" />
											<p align="center"><?php echo $follows->artistsProfile->profile->users->display_name;?></p></a>
									</span>
									<?php }
										}
										else
										{?>
									 <h4 class="span8"><i><?php echo $model->users->display_name; ?> hasn't Liked anyone!!</i></h4>

								   <?php }?>
									
										
								</span>
						<!-- List of Following-->	
							<span class="span12 thumbnails">
								<!-- Heading -->	
					
								<span class="span12 mgtop30">
								<div class="span6"><h3 class="mgleft20">Followed By <?php echo $model->users->display_name;?></h3></div>
								<?php
									$following=Follower::model()->findAllByAttributes(array('users_id'=>$model->users_id,'is_followed'=>1));
								//CVarDumper::dump(,10,1);die;?><?php  if(count($following)>='5')
									{ ?>
									<span class="span3 offset3"><a href="<?php echo $this->createUrl('site/viewList', array('type'=>'following', 'id'=>$model->users_id));?>" class="listlink"><small class="btn btn-success badge mgtop20 mgleft20">View All</small></a></span>
									<?php }?>
									</span>					
							
									<?php 
									if(count($following))
									{
									foreach($following as $follows)
									{ 	
									//CVarDumper::dump(,10,1);die;
									?>
									<span class="span2 thumbnail">
										<a href="<?php echo ($follows->artistsProfile->profile->users->roles->roles_name=='Artist')?$this->createUrl('site/ajaxprofile',array('id'=>$follows->artistsProfile->profile->users_id)):$this->createUrl('site/ajaxlistener',array('id'=>$follows->artistsProfile->profile->users_id));?>" class="navlink"><img src="<?php echo (!$follows->artistsProfile->profile->image=='')?ImageFly::Instance()->get($follows->artistsProfile->profile, 'image', 150, 150):$baseUrl.'/img/profile-placeholder.jpg';?>" />
											<p align="center"><?php echo $follows->artistsProfile->profile->users->display_name;?></p></a>
									</span>
									<?php }
										}
										else
										{?>
											 <h4 class="span8"><i><?php echo $model->users->display_name; ?> hasn't Liked anyone!!</i></h4>

								   <?php }?>
									
										
								</span>	
										
					</div>
						
				
			
			</section>
			<!-- User profile Ends-->		
	</section>
</section>
<!-- Change Profile Picture-->
<section id="profile" class="modal hide fade">
           <div class="modal-body">
             <h4><span id="role"> </span>Change Photo</h4>
             <p>
             <div id="span8">
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'change-photo',
				'action'=>$this->createUrl("site/updatePhoto",array('id'=>$model->id)),
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			 )); ?>
                 <table cellspacing="5" cellpadding="" style="margin:auto;">
              
                    <tr><td>Browse Your Photo:</td></tr>
                    <tr><td><?php echo $form->fileField($model,'image'); ?></td></tr>
					<tr><td><center> <?php echo CHtml::submitButton('Submit','',array('class'=>'btn btn-primary')); ?></center></td></tr>
                </table>
			
				 
				
               
<?php $this->endWidget(); ?>
               </div>
           </p>  
         </div>
        <footer class="modal-footer">
	       <button class="btn btn-info" data-dismiss="modal">Close</button>
       </footer>
</section>
<!-- Change Cover Photo-->
<section id="ChangeCover" class="modal hide fade">
           <div class="modal-body">
             <h4><span id="role"> </span>Change Photo</h4>
             <p>
             <div id="span8">
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'change-photo',
				'action'=>$this->createUrl("site/updateCover",array('id'=>$model->id)),
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			 )); ?>
                 <table cellspacing="5" cellpadding="" style="margin:auto;">
              
                    <tr><td>Browse Your Photo:</td></tr>
                    <tr><td><?php echo $form->fileField($model,'image'); ?></td></tr>
					<tr><td><center> <?php echo CHtml::submitButton('Submit','',array('class'=>'btn btn-info')); ?></center></td></tr>
                </table>
			
				 
				
               
<?php $this->endWidget(); ?>
               </div>
           </p>  
         </div>
        <footer class="modal-footer">
	       <button class="btn btn-info" data-dismiss="modal">Close</button>
       </footer>
</section>
<!-- Update Basic Information-->
<section id="editbasic" class="modal hide fade">
           <div class="modal-body">
             <h4><span id="role"> </span>Update Basic Information</h4>
             <p>
             <div id="span8">
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'change-photo',
				'action'=>$this->createUrl("site/updateBasicInfo",array('id'=>$model->id)),
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			 )); ?>
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
														'update' => "#Profile_cities_id"
													) ));
												?>
										</td>
									</tr>
									<tr>
										<td><h4>City:</h4></td>
										<td><?php  $listcity=CHtml::listData(cities::model()->findAll(), 'id','name'); ?>
											<?php 
											echo $form->dropDownList($model,'cities_id',$listcity,array('empty'=>'--Select a City--'));?>
										</td>
									</tr>
									
									<!--
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
										<td><h4>City:</h4></td>
										<td><?php $listcity=CHtml::listData(cities::model()->findAll(), 'id','name'); ?>
											<?php 
											echo $form->dropDownList($model,'cities_id',$listcity,array('empty'=>'--Select a City--'));?>
										</td>
									</tr>-->
									<tr>
										<td><h4>Zip Code:</h4></td>
										<td><?php echo $form->textField($model,'zip_code',array('size'=>45,'maxlength'=>7)); ?></td>
									</tr>
									<tr>
										<td><h4>Contact:</h4></td>
										<td><?php echo $form->textField($model,'contact_no',array('size'=>45,'maxlength'=>16)); ?></td>
									</tr>
									<tr><td><center> <?php echo CHtml::submitButton('Submit','',array('class'=>'btn btn-danger')); ?></center></td></tr>
								
                </table>
			
				 
				
               
<?php $this->endWidget(); ?>
               </div>
           </p>  
         </div>
        <footer class="modal-footer">
	       <button class="btn btn-info" data-dismiss="modal">Close</button>
       </footer>
</section>
<!-- Update Artist Information-->
<section id="editBio" class="modal hide fade">
           <div class="modal-body">
             <h4><span id="role"> </span>Tell us something about you</h4>
             <p>
             <div id="span8">
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'update-bio',
				'action'=>$this->createUrl("site/BioInfo",array('id'=>$model->id)),
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			 ));
			 $Bio=ArtistsProfile::model()->findByAttributes(array('profile_id'=>$model->id)); ?>
                		<table class="span5 line-height20" cellpadding="10px" cellspacing="20px">
									
									 <tr>
										<td><h4>About Me:</h4></td>
										<td><?php echo $form->textArea($Bio,'biography',array('rows'=>7,'cols'=>200)); ?></td>
									</tr>
									<tr>
										<td><h4>Achievements:</h4><sub>*Must be spearated with (.)dot</sub></td>
										<td><?php echo $form->textArea($Bio,'achivement',array('rows'=>7,'width'=>20)); ?></td>
									</tr>
									<tr>
										<td><h4>Facebook:</h4><small class="mgtop-10">http://www.facebook.com/</small></td>
										<td><?php echo $form->textField($Bio,'fb_link',array('placeholder'=>'example.123')); ?></td>
									</tr>
									<tr>
										<td><h4>Twitter:</h4><small class="mgtop-10">http://www.twitter.com/</small></td>
										<td><?php echo $form->textField($Bio,'tw_link',array('placeholder'=>'@example')); ?></td>
									</tr>
									<tr><td><center> <?php echo CHtml::submitButton('Submit','',array('class'=>'btn btn-info')); ?></center></td></tr>
								
               			 </table>
			
				 
				
               
<?php $this->endWidget(); ?>
               </div>
           </p>  
         </div>
        <footer class="modal-footer">
	       <button class="btn btn-info" data-dismiss="modal">Close</button>
       </footer>
</section>
<!-- Comment-->
<section id="comment" class="modal hide fade">
           <div class="modal-body">
             <h4><span id="role"> </span>Write a Comment on <?php echo $mail->display_name;?>'s Soundline</h4>
             <p>
             <div id="span8">
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'comment',
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			 ));
			 $comment= new Comments;
			 
			 ?>
                		<table class="span5 line-height20" cellpadding="10px" cellspacing="20px">
									
									 <tr>
										<td colspan=2><?php echo $form->textArea($comment,'comment_text',array('rows'=>7,'placeholder'=>'Your Comment','class'=>'span5')); ?></td>
									</tr>
									
									<tr><td colspan="2"> <?php
									echo CHtml::ajaxButton( $label = 'Comment', $url =$this->createUrl("site/comment",array('uid'=>$model->id)), $ajaxOptions=array ( 'type'=>'POST', 'dataType'=>'json', 'success'=>'function(html){jQuery("#commentCount").html(html); $("#comment").modal("hide"); }' ), $htmlOptions=array ('class'=>'pull-right btn btn-danger') );?>
									</td></tr>
								
               			 </table>
			
				 
				
               
<?php $this->endWidget(); ?>
               </div>
           </p>  
         </div>
        <footer class="modal-footer">
	       <button class="btn btn-info" data-dismiss="modal">Close</button>
       </footer>
</section>

<!--- Chandan's code for Play list-->
<div  id="listmodal" class="modal hide fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Your Play List</h4>
      </div>
      <div class="modal-body">
      <ul class="nav nav-tabs">
	  <li><a href="#home" data-toggle="tab">Add Songs In Your Play List</a></li>
	  <li><a href="#play-list" data-toggle="tab">Create New Play List</a></li>
	</ul>
	<script>
function addsong()
{
var datastring='pid=' + document.getElementById("playlistname").value + '&sid=' + document.getElementById("sid").value;
	$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("site/addsong"); ?>',
			data:datastring,
			success:function(response)
			{
			alert(response);
				$("#listmodal").modal("hide"); 	
		
			}
			
		});
}
</script>
<script>
function createplaylist()
{
var datastring='pname='+document.getElementById("pname").value;
	$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("site/createplaylist"); ?>',
			data:datastring,
			success:function(response)
			{
			alert(response);
			}
			
		});
}
</script>


	<div class="tab-content">
	  <div class="tab-pane active" id="home">
	  <table>
	  <tr><td><input type="hidden" name="sid" value="" id="sid"></td></tr>
	   <tr><td>Select Play List</td></tr>
	   <tr><td>
	   <?php 
		$playList	= UsersPlaylist::model()->findAllByAttributes(array('users_id'=>Yii::app()->user->id));
		$list = CHtml::listData($playList, 'id', 'playlist_name');
		echo CHtml::dropDownList('playlistname','',$list,array('id'=>'playlistname')); 
		?>
	</td><tr>
	<tr><td><input type="button" value="Create" onclick="addsong();"></td></tr>
	</table>
	  </div>
	  <div class="tab-pane" id="play-list">
	  <table>
	  <tr><td>Enter Play List Name</td><tr>
	  <tr><td><input type="text" name="pname" id="pname"></td></tr>
	  <tr><td><input type="button" value="Create" onclick="createplaylist();"></td></tr>
	  </table>
	  </div>
	 </div>
              </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>