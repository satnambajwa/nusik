<script>
	function tracklist(str)
	{
		var datastring='id='+str;
		$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("site/updatesongs"); ?>',
			data:datastring,
			success:function(res)
			{
			$("#list").html(res);
			}
			});
	}
	</script>
<?php
$baseUrl= Yii::app()->theme->baseUrl;
?>

	<?php
//Find time difference
function timeDifference($timeEnd, $timeStart){
  $tResult = round(abs(strtotime($timeEnd) - strtotime($timeStart)));
  return gmdate("H:i", $tResult);
}
?>



	
<section class="container-fluid1">
<div class="profile-back">
<?php if(Yii::app()->user->id==$model->users->id){?><a href="#ChangeCover" style="margin-top:70px;" data-toggle="modal" class="pull-right btn btn-primary" > Change Cover </a><?php }?>
<img src="<?php echo (!$model->cover_photo=='')? Yii::app()->baseUrl.'/images/'.$model->cover_photo: $baseUrl.'/img/Cover_placeholder.jpg';?>" class=" mgtop-20 img-polaroids"/>	
</div>
<section class="profile-container">
	<!-- Name of the Profile Holder-->
			<section class="row-fluid">
				<div class="span12">
						<div class="span6">	
							<span class="span11 color-black"><h3 class="name-font mgleft padding10"><?php echo $model->first_name.' '.$model->last_name; ?></h3>	</span>
						</div>
				</div>
			</section>
	
	<section class="row-fluid">
	<span class="span8  bgcolor-white">
		<div class="mgleft20">
		<div class="span12 border-radius10 padding20">	
		<span class="span12">
			<ul id="#nav" class="nav nav-tabs span12 mgtop-20">
				<li class="active"><a href="#content" data-toggle="tab"><b>My Nusik</b></a></li>
				<li class=""><a href="#playlist" data-toggle="tab"><b>My Playlists</b></a></li>
				<li class=""><a href="#following" data-toggle="tab"><b>Following</b></a></li>
			</ul>
		</span>
		<div class="row-fluid">
		<section>
		<section class="span12 soundline-data">
            	<div class="span12">
		<div class="tab-content">
			<div class="tab-pane" id="content">
                		
        						<?php 
							//	CVarDumper::dump($model->users->id.''.Yii::app()->user->id,10,1);die;
								$sLineFeed=Soundline::model()->findAllByAttributes(array('user_id'=>$model->users->id));
								$sLineFeed=array_reverse($sLineFeed);
								//CVarDumper::dump($sLineFeed,10,1);die;
								foreach($sLineFeed as $feed)
								{
									//CVarDumper::dump($feed,10,1);die;
									if($feed->type=='post')
									{
						
						?>
								<!--shared a song-->
								<!--<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnail">
												<img src="<?php echo $baseUrl;?>/img/3.jpg" />
												<p align="center">Shreya Ghosal</p>
											</span>
											<span class="span12"><h5 class="span10">has shared</h5></span>
											<span class="span12"><h7><b></b></h7><a href=""><img src="<?php echo $baseUrl; ?>/img/play.png"/>Tumko Bhul Na Payege</a>
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href=""> Genre Type</a></span>
											</span>
											<span class="span6 offset5">
													<img src="<?php echo $baseUrl;?>/img/likes.png" class="small-icon" title="Like" />
													<img src="<?php echo $baseUrl;?>/img/share.png" title="span2" class="small-icon"/>
													<img src="<?php echo $baseUrl;?>/img/share.png" title="span2" class="small-icon"/>
													<img src="<?php echo $baseUrl;?>/img/down.png" title="span2" class="small-icon"/>
											</span>
											<span class="span12"><small class="offset7 mgtop10">10 mins ago</small></span>
								</div>-->
							<?php } 
									elseif($feed->type=='follow')
									{
										$feedFollow=Follower::model()->findByAttributes(array('id'=>$feed->activity_id));
										if(count($feedFollow)==0)
											continue;
											
										$img=(isset($feedFollow->users->profiles[0]->image))? ImageFly::Instance()->get($feedFollow->users->profiles[0], 'image', 400, 250):'';
										$dname=(isset($feedFollow->users->display_name))?$feedFollow->users->display_name:'';
										$uimg=(isset($feedFollow->artistsProfile->profile->image))? ImageFly::Instance()->get($feedFollow->artistsProfile->profile, 'image', 400, 250):'';			
										$pname=	(isset($feedFollow->artistsProfile->profile->users->display_name))?$feedFollow->artistsProfile->profile->users->display_name:'';			
							?>
								<!--Following-->
								<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnailcustom">
												<!-- Pic of Followee(Follower)-->
												<img src="<?php echo (!$img=='')? $img:$baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><a href="<?php echo ($feedFollow->users->roles_id=='1')? $this->createUrl('site/ajaxprofile',array('id'=>$feedFollow->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$feedFollow->users->id)) ?>" class="navlink"><?php echo $dname;?></a></p>
											</span>
											<span class="span12 mgtop10"><h6 class="span6">is following</h6><span class="span6 thumbnail">
												<!-- pic Whome he is following-->
												<img src="<?php echo (!$uimg=='')?$uimg:$baseUrl.'/img/profile-placeholder.jpg';?>" class="img-small" />
												<p align="center"><a href="<?php echo ($feedFollow->artistsProfile->profile->users->roles_id=='1')? $this->createUrl('site/ajaxprofile',array('id'=>$feedFollow->artistsProfile->profile->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$feedFollow->artistsProfile->profile->users->id)) ?>" class="navlink"><?php echo $pname;?></a> </p>
											</span> </span>
											
											<span class="span12 mgtop20"><small class="offset5"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?>hours ago</small></span>
								</div>
								<?php } 
								      elseif($feed->type=='sshare')
									  { 
									    $feedSongShare=Sharing::model()->findByPk($feed->activity_id);
										if(count($feedSongShare)==0)
											continue;
										$img=(isset($feedSongShare->users->profiles[0]->image))?ImageFly::Instance()->get($feedSongShare->users->profiles[0], 'image', 400, 250):'';
										$dname=(isset($feedSongShare->users->display_name))?$feedSongShare->users->display_name:'';
										
									  ?>
								<!--Shared a song-->
										<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnailcustom">
												<img src="<?php echo (!$img=='')? $img:$baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><a href="<?php echo ($feedSongShare->users->roles_id=='1')? $this->createUrl('site/ajaxprofile',array('id'=>$feedSongShare->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$feedSongShare->users->id)); ?>" class="navlink"><?php echo $dname;?></a></p>
											</span>
												<span class="span12"><h5 class="span6">has shared</h5></span>
											<span class="span12 mgtop-20"><a href="<?php echo $this->createUrl('site/song/',array('sid'=>$feedSongShare->artistTrack->id));?>"><img src="<?php echo $baseUrl; ?>/img/play.png"/><?php echo $feedSongShare->artistTrack->song_name;?></a>
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/mic.png" /><a href="<?php echo $this->createUrl('site/profile',array('id'=>$feedSongShare->artistTrack->users->id));?>" class="mgleft5"><?php echo $feedSongShare->artistTrack->users->display_name ;?></a></span>
												<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href="">  <?php echo $feedSongShare->artistTrack->users->profiles[0]->artistsProfiles[0]->geners->name;?></a></span>
											</span>
											<span class="span12 mgtop-10"><small class="offset5"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?> hours ago</small></span>
								</div>
								<?php }
								 	   elseif($feed->type=='slike')
									   {
									     $feedSongLike=SongsLike::model()->findByPk($feed->activity_id);
										 if(count($feedSongLike)==0)
											continue;
   									     $img=(isset($feedSongLike->users->profiles[0]->image))?ImageFly::Instance()->get($feedSongLike->users->profiles[0], 'image', 400, 250):'';
										 $dname=(isset($feedSongLike->users->display_name))?$feedSongLike->users->display_name:'N/A';
										
									  ?> 
									  <!-- Song Like-->
									  <div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnailcustom">
												<img src="<?php echo (!$img=='')? $img:$baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><a href="<?php echo ($feedSongLike->users->roles_id=='1')? $this->createUrl('site/ajaxprofile',array('id'=>$feedSongLike->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$feedSongLike->users->id)); ?>" class="navlink"><?php echo $dname;?></a></p>
											</span>
												<span class="span12"><h5 class="span6">has liked</h5></span>
											<span class="span12 mgtop-20"><a href="<?php echo $this->createUrl('site/song/',array('sid'=>$feedSongLike->artistTrack->id));?>"><img src="<?php echo $baseUrl; ?>/img/play.png"/><?php echo $feedSongLike->artistTrack->song_name;?></a>
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/mic.png" /><a href="<?php echo $this->createUrl('site/profile',array('id'=>$feedSongLike->artistTrack->users->id));?>" class="mgleft5"><?php echo $feedSongLike->artistTrack->users->display_name ;?></a></span>
												<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href="">  <?php echo $feedSongLike->artistTrack->users->profiles[0]->artistsProfiles[0]->geners->name;?></a></span>
											</span>
											<span class="span12 mgtop-10"><small class="offset3"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?> hours ago</small></span>
								</div>	
								<?php }
								 	   elseif($feed->type=='scomment')
									   {
									     $feedSongComment=ArtistTrackHasComments::model()->findByAttributes(array('comments_id'=>$feed->activity_id));
   									     if(count($feedSongComment)==0)
											continue;
										 $img=(isset($feedSongLike->users->profiles[0]->image))?ImageFly::Instance()->get($feedSongLike->users->profiles[0], 'image', 400, 250):'';
										 $dname=(isset($feedSongLike->users->display_name))?$feedSongLike->users->display_name:'';
										
									  ?> 
									  <!-- Song Comment-->
									   <div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnailcustom">
												<img src="<?php echo (!$feedSongComment->users->profiles[0]->image=='')? ImageFly::Instance()->get($feedSongComment->users->profiles[0], 'image', 400, 250) : $baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><a href="<?php echo ($feedSongComment->users->roles_id=='1')? $this->createUrl('site/ajaxprofile',array('id'=>$feedSongComment->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$feedSongComment->users->id)); ?>" class="navlink"><?php echo $feedSongComment->users->display_name;?></a></p>
											</span>
											<span class="span12 mgtop10"><p class="span12">Commented on Track <a href="<?php $this->createUrl('site/song',array('sid'=>$feedSongComment->artistTrack->id));?>"><?php echo $feedSongComment->artistTrack->song_name;?></a></p>
												<span class="span11 thumbnail"><p align="center"> <?php echo $feedSongComment->comments->comment_text;?></p></span>
											</span>			
											<span class="span6 offset5">
												<span class="span12 offset10">
													<img src="<?php echo $baseUrl;?>/img/share.png" class="small-icon" title="Like" />
												</span>	
											</span>							
											<span class="span12 "><small class="offset5"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?>hours ago</small></span>
								</div>
								<?php }
								        elseif($feed->type=='like')
										{
											$feedFollow=Follower::model()->findByAttributes(array('id'=>$feed->activity_id,'is_liked'=>1));
											if(count($feedFollow)==0)
											continue;
											$img=(isset($feedFollow->users->profiles[0]->image))?ImageFly::Instance()->get($feedFollow->users->profiles[0], 'image', 400, 250):'';
											$dname=(isset($feedFollow->users->display_name))?$feedFollow->users->display_name:'';
					//						CVarDumper::dump($feedFollow->artistsProfile->profile->image,10,1);die;
											$uimg=(isset($feedFollow->artistsProfile->profile->image))?ImageFly::Instance()->get($feedFollow->artistsProfile->profile, 'image', 400, 250):'';			
											$pname=	(isset($feedFollow->artistsProfile->profile->users->display_name))?$feedFollow->artistsProfile->profile->users->display_name:'';			
									?>
								<!--Liked an artist-->
							
								<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnailcustom">
												<!-- Pic of Followee(Follower)-->
												<img src="<?php echo (!$img=='')? $img:$baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center">
												<a href="<?php echo ($feedFollow->users->roles_id=='1')? $this->createUrl('site/ajaxprofile',array('id'=>$feedFollow->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$feedFollow->users->id)); ?>" class="navlink">
												<?php echo $dname;?></a></p>
											</span>
											<span class="span12 mgtop10"><h5 class="span6">has liked</h5><span class="span6 thumbnail">
												<!-- pic Whome he is following-->
												<img src="<?php echo (!$uimg=='')?$uimg:$baseUrl.'/img/profile-placeholder.jpg';?>" class="img-small" />
												<p align="center"> <a href=" <?php echo ($feedFollow->artistsProfile->profile->users->roles_id=='1')? $this->createUrl('site/ajaxprofile',array('id'=>$feedFollow->artistsProfile->profile->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$feedFollow->artistsProfile->profile->users->id)); ?>" class="navlink"><?php echo $pname;?></a> </p>
											</span> </span>
											
											<span class="span12 mgtop30"><small class="offset5"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?>hours ago</small></span>
								</div>
								<?php }
								       elseif($feed->type=='comment')
									   {
							  		   $feedComment=ProfileHasComments::model()->findByAttributes(array('comments_id'=>$feed->activity_id));
										if(count($feedComment)==0)
											continue;
									   ?>	
								<!--Made a comment-->	
								<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnailcustom">
												<img src="<?php echo (!$feedComment->users->profiles[0]->image=='')? ImageFly::Instance()->get($feedComment->users->profiles[0], 'image', 400, 250) : $baseUrl.'/img/profile-placeholder.jpg';?>" />
												<p align="center"><a href="<?php echo ($feedComment->users->roles_id=='1')? $this->createUrl('site/ajaxprofile',array('id'=>$feedComment->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$feedComment->users->id)); ?>" class="navlink"><?php echo $feedComment->users->display_name;?></a></p>
											</span>
											<span class="span12 mgtop10"><p class="span12">Commented on><a href="<?php echo ($feedComment->profile->users->roles_id=='1')? $this->createUrl('site/ajaxprofile',array('id'=>$feedComment->profile->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$feedComment->profile->users->id)); ?>" class="navlink"> <?php echo $feedComment->profile->users->display_name; ?></a>'s profile</p>
												<span class="span11 thumbnail"><p align="center"> <?php echo substr($feedComment->comments->comment_text,0,10);?></p></span>
											</span>			
											<span class="span6 offset5">
												<span class="span12 offset10">
													<img src="<?php echo $baseUrl;?>/img/share.png" class="small-icon" title="Like" />
												</span>	
											</span>							
											<span class="span12 mgtop5"><small class="offset5"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?>hours ago</small></span>
								</div>
								<?php } 
								       elseif($feed->type=='likeSong')
									   {	?>
								<!--Liked a song-->
								<div class="span3 thumbnail mgtop10 mgleft5 height500" style="margin-left:7%;">	
											<span class="span12 thumbnailcustom">
												<img src="<?php echo $baseUrl;?>/img/5.jpg" />
												<p align="center">Sonu</p>
											</span>
												<span class="span12"><h5 class="span6">Liked</h5></span>
											<span class="span12 mgtop-20"><a href=""><img src="<?php echo $baseUrl; ?>/img/play.png"/>Tum Hi Ho</a>
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/mic.png" /><a href="" class="mgleft5">Atif Aslam</a></span>
											
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href=""> Genre Type</a></span>
											</span>
											<span class="span12  mgtop20"><small class="offset5"><?php echo timeDifference($feed->add_date,date('Y-m-d H:i'));?>hours ago</small></span>
								</div>
								<?php }
								}//loopclosed
								?>

        
        
        
        
        
        
        				
						
						
						
						
								
				</div>
			<div style="width:100%" class="tab-pane" id="playlist" >
			  <table width="100%"><tr><td align="center" valign="top">
			   <?php 
			   $criteria=new CDbCriteria();
			   $criteria->condition='users_id='.$model->users->id;
			   $playlist= UsersPlaylist::model()->findAll( $criteria);
			   ?>
			  <table>
			  <?php 
			  foreach($playlist as $pl)
			  {
			  ?>
			  <tr><td>
			  <a href="javascript:void(0)" onclick="tracklist(<?php echo $pl->id ?>);"><?php echo $pl->playlist_name; ?></a>
			  </td><tr>
			  <?php
			  }
			  ?>
			</table>
			</td><td valign="top" align="center">
			<div id="list" style="display: inline-block;margin-top:0px;">
			</div>
			</td></tr>
			</table>
			 </div>
			 <div id="following"  class="tab-pane">
				<?php $following= Follower::model()->findAllByAttributes(array('users_id'=>$model->users->id));
				// CVarDumper::dump($following,10,1);die;
				 if(count($following>0))
				  {
					 foreach($following as $follow)
						{
				 
				 ?>
				 	
												<span class="span2 thumbnail">
													<a href="<?php echo ($follow->artistsProfile->profile->users->roles->roles_name=='Artist')?$this->createUrl('site/ajaxprofile',array('id'=>$follow->artistsProfile->profile->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$follow->artistsProfile->profile->users_id));?>" class="navlink"><img src="<?php echo (!$follow->artistsProfile->profile->image=='')? ImageFly::Instance()->get($follow->artistsProfile->profile, 'image', 150, 150): $baseUrl.'/img/profile-placeholder.jpg';?>"/>
													<p align="center"><?php echo $follow->artistsProfile->profile->users->display_name;?></p></a>
												</span>
									
				
				<?php } //foreach closed
				}//if closed
				else
				{
					echo $follow->users->display_name." hasn't followed anyone yet!";
				}?>
				</div>
            
         </div>
	  	</section>
				
		</div>
		
	
		</div>
		</div>
	</span>	 
	
	
	<div class="span4 thumbnails bgcolor-white">
			
	<div class="span12" style="border-left:solid #999999; border-width:2px; border-height:50%;">
				
						
				<div class="span11">
				
					<div class="row-fluid">
						<span class="span4">
								<img src="<?php echo (!$model->image=='')? ImageFly::Instance()->get($model, 'image', 250, 250): $baseUrl.'/img/profile-placeholder.jpg';?>" class="img-polaroid10 mg5" />
								<?php if(Yii::app()->user->id==$model->users->id){?><a href="#profile" class="mgleft10" data-toggle="modal"> Change Photo</a><?php }?>
						</span>
						<span class="span8">
						<?php if(Yii::app()->user->id==$model->users->id){ ?><a href="#editbasic" class=" mgtop5 pull-right" data-toggle="modal">Edit Info</a><?php }?>
						
							<h4 class="mgleft30"> <?php echo $model->users->display_name; ?></h4>
							<span class="span12"><p class=" mgleft20 mgtop-5"><img src="<?php echo $baseUrl; ?>/img/male.png" class="small-icon mgright5"/><?php echo $model->gender;?>,
			<?php $Oyear = explode("-",$model->date_of_birth); 
				 $Nyear=explode("-",date('Y-m-d'));
				  echo $Nyear[0]-$Oyear[0];?></p></span>
							<span class="span12"><p class=" mgleft20 mgtop-10"><img src="<?php echo $baseUrl; ?>/img/place.png" /> <small> <?php echo (!$model->cities_id=='')? $model->cities->name.','. $model->countries->name:'Location, Country';?></small></p></span>
							<span class="span12"><p class=" mgleft20 mgtop-15"><img src="<?php echo $baseUrl; ?>/img/email.png" class="small-icon mgright5"/><?php echo $model->users->email;?></p></span>
						
						</span>
					</div>
					<hr width="100%" height="2px" class="mgtop-10 bgcolor-black" />
					<?php if(Yii::app()->user->id==$model->users->id){?>
					<div class="row-fluid" id="list-suggest">
						<span class="span12 mgtop-20">
						<h4 class="span8 padding10">
						<script type="text/javascript">
						  function Suggestions_Refresh()
						  {
						  
						  }
						</script>
							<img src="<?php echo $baseUrl;?>/img/suggesstion.png" class="mgright5"/>Nusik Suggestion</h4>
							<span class="span4  pull-right mgtop15"><p class="mgtop5  pull-right"><img src="<?php echo $baseUrl;?>/img/refresh.png" class="mgright5 small-icon" id="refresh_sugg" onclick="Suggestions_Refresh()"/> </p></span>
						</span>
						
						 <?php 
						$suggesstion = ArtistsProfile::model()->findAll(array('select'=>'*, rand() as rand','limit'=>'5','order'=>'rand'));
						// CVarDumper::dump($suggesstion,10,1);die;
						 //$suggesstion= ArtistsProfile::model()->findAll();
						 $count=0;
						  if(!count($suggesstion)==0)
						    	foreach($suggesstion as $suggest)
								{
									$count++;
									if($count>5)
									break;
									
									$userId=(isset($suggest->followers[0]->users_id))?$suggest->followers[0]->users_id:'';
									$userFollow=(isset($suggest->followers[0]->is_followed))?$suggest->followers[0]->is_followed:'';
									
									if(($userId==Yii::app()->user->id)&&($userFollow=='1'))
										continue;
									
																
								?>
								<div class="row-fluid sides"> 
						
									<span class="span2" id="suggest-list">
									
							<img src="<?php echo (!$suggest->profile->image=='') ?  ImageFly::Instance()->get($suggest->profile, 'image', 200, 150) : $baseUrl.'/img/profile-placeholder.jpg';?>" class="small-img mgleft5 "/>
						</span>
									<span class="span9 mgtop-10"><h5  class=" mgleft5"><a href="<?php echo $this->createUrl('site/profile',array('id'=>$suggest->profile->users_id));?>" style="z-index:1"><?php echo $suggest->profile->users->display_name;?></a></h5></span>
									<span class="span9 mgtop-5">
						<img src="<?php echo $baseUrl;?>/img/suggesstion.png" class="small-icon mgleft5 " title="Followers"/><h7 class="mgleft5" title="Followers" >
						<?php echo ($suggest->total_followers)?$suggest->total_followers:'0';?></h7><span class="mgleft10"> |  </span> <img src="<?php echo $baseUrl;?>/img/note.png" class="small-icon mgleft5 " title="Songs"/><h7 class="mgleft5"title="Songs"><?php echo ($suggest->total_songs)?$suggest->total_songs:'0';?></h7>
						<?php echo CHtml::ajaxLink( $label = 'Follow', $url =$this->createUrl("site/like",array('uid'=>$suggest->profile->id,'type'=>'follow')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ showlight("Now you are following , '.$suggest->profile->users->display_name.'"); }' ), $htmlOptions=array('class'=>'btn pull-right mgtop-10'));?>
						</span>
								 </div>					
						<?php }?>	
							
					<hr width="100%" height="2px" class="mgtop5 bgcolor-black" />
						 
				<?php  }?>	
					<div class="row-fluid ">

						<span class="span12 mgtop-20">
						<h4 class="span8 padding10">	<img src="<?php echo $baseUrl;?>/img/mymusic.png" class="mgright5"/>My Liked</h4>
							<span class="span4  pull-right mgtop15"><a href="" class="mgtop5  pull-right">View All</a></span>
						</span>
						<?php $follower=Follower::model()->findAllByAttributes(array('users_id'=>Yii::app()->user->id,'is_liked'=>1));
						  if(count($follower)==0)
						   {
						   ?>
						   <h5><i>Recently you haven't liked anyone</i></h5>
						   <?php }
						   else
						   {
						   	foreach($follower as $liked)
							 {
							   
								
							   
						   ?>
						   
						<div class="row-fluid sides"> 
						<a href="<?php echo $this->createUrl('site/profile',array('id'=>$liked->artistsProfile->profile->users->id));?>"><span class="span2">
							<img src="<?php echo (!$liked->artistsProfile->profile->image=='')? ImageFly::Instance()->get($liked->artistsProfile->profile, 'image', 200, 150): $baseUrl.'/img/profile-placeholder.jpg';?>" class="small-img mgleft5 "/>
						</span>
						<span class="span6 mgtop-10"><h5  class=" mgleft5"><?php echo $liked->artistsProfile->profile->users->display_name;?></h5></span></a> 
						<span class="span9 mgtop-5">
							<img src="<?php echo $baseUrl;?>/img/mlike.png" class="small-icon mgleft5 " title="Followers"/>
							<h7 class="mgleft5"title="Followers" ><?php echo $liked->artistsProfile->total_followers;?> </h7>
							<span class="mgleft10"> |  </span>
							 <img src="<?php echo $baseUrl;?>/img/mshare.png" class="small-icon mgleft5 " title="Songs"/>
							 <h7 class="mgleft5"title="Songs" > <?php echo $liked->artistsProfile->total_share;?></h7>
							 <span class="mgleft10">|  </span>
							  <img src="<?php echo $baseUrl;?>/img/mcomment.png" class="small-icon mgleft5 " title="Songs"/><h7 class="mgleft5" title="Songs" ><?php echo $liked->artistsProfile->total_comments;?></h7>
						</span>
						
						
					</div>
						<?php }
						}?>
					</div>
				</div>	
				
	
			</div>
	</div>	

	</section>
				
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
									</tr>
									<tr>
										<td><h4>Zip Code:</h4></td>
										<td><?php echo $form->textField($model,'zip_code',array('size'=>45,'maxlength'=>7)); ?></td>
									</tr>
									<tr>
										<td><h4>Contact:</h4></td>
										<td><?php echo $form->textField($model,'contact_no',array('size'=>45,'maxlength'=>16)); ?></td>
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
<!-- Modal for LightBox-->
<section id="lightmessage" class="modal hide fade">
    <div class="modal-body">
	  <button class=" pull-right btn btn-danger btn-small" onclick="hidelight()">X</button>
	         <h5><span id="lightbody"> </span></h5>
    	
	</div>
</section>

<script>
function showlight(type)
{

document.getElementById('lightbody').innerHTML=type;

$("#lightmessage").removeClass("hide fade");
$("#lightmessage").addClass("show in");
	autolightout();
}
function hidelight()
{

$("#lightmessage").removeClass("show in");
$("#lightmessage").addClass("hide fade");

}
function autolightout()
{
	setTimeout(function() {
			$("#lightmessage").removeClass("show in");
	$("#lightmessage").addClass("hide fade");

	}, 2500); 
}

</script>