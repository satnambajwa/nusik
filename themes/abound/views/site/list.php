<?php
$baseUrl= Yii::app()->theme->baseUrl;
?>
<script src="<?php echo $baseUrl;?>/js/common.js" type="text/javascript"></script>



	<section class="span11  border-radius10 padding-bottom10 bgcolor-white">
		
		
	
				
				<?php 
				//CVarDumper::dump($modelData[0]->artistsProfile->profile->users_id,10,1);die;
				
				if($type=='follower')
				{
				?>	
			<section class="thumbnails">
					<span class="row-fluid">
					<h3 class="span9"><?php echo strtoupper($type).'S';?></h3>
					<a href="<?php echo $this->createUrl('site/ajaxprofile',array('id'=>$modelData[0]->artistsProfile->profile->users_id));?>" class="navlink pull-right mgtop20 btn badge btn-danger">Back To Profile</a>
					</span>
					<div class="thumbnails">
							<?php 
							foreach($modelData as $result)
								{
								?>		
										
							
							<span class="span2 thumbnail mgtop10">
															<a href="<?php echo ($result->users->roles->roles_name=='Artist')?$this->createUrl('site/ajaxprofile',array('id'=>$result->users->id)):$this->createUrl('site/ajaxlistener',array('id'=>$result->users->id));?>" class="navlink"><img src="<?php echo (!$result->users->profiles[0]->image=='')? ImageFly::Instance()->get($result->users->profiles[0], 'image', 150, 150): $baseUrl.'/img/profile-placeholder.jpg';?>"/>
															<p align="center"><?php echo $result->users->display_name;?></p></a>
							</span>
						
							
							
							<?php }?>
						</div>
				</section>
				<?php
					
					}
					
					else if($type=="following")
					{
				
				//		
				?>
			<section class="thumbnails">
					<span class="row-fluid">
					<h3 class="span8"><?php echo $modelData[0]->users->display_name.' is '.strtoupper($type);?></h3>
					<a href="<?php echo $this->createUrl('site/ajaxprofile',array('id'=>$modelData[0]->users_id));?>" class="navlink pull-right mgtop20 btn badge btn-danger">Back To Profile</a>
				</span>
					<div class="thumbnails">
					<?php 
					foreach($modelData as $result)
						{
						//CVarDumper::dump($result->artistsProfile->profile,10,1);die;
						?>		
								
					
					<span class="span2 thumbnail">
													<a href="<?php echo ($result->artistsProfile->profile->users->roles->roles_name=='Artist')?$this->createUrl('site/ajaxprofile',array('id'=>$result->artistsProfile->profile->users_id)):$this->createUrl('site/ajaxlistener',array('id'=>$result->artistsProfile->profile->users_id));?>" class="navlink"><img src="<?php echo (!$result->artistsProfile->profile->image=='')? ImageFly::Instance()->get($result->artistsProfile->profile, 'image', 150, 150): $baseUrl.'/img/profile-placeholder.jpg';?>"/>
													<p align="center">
													<?php echo $result->artistsProfile->profile->users->display_name;?></p></a>
					</span>
				
					
					
					<?php }
					?>
				</div>
				
				</section>
					<?php		//CVarDumper::dump($modelData[0]->artistsProfile->profile->users->display_name,10,1);die;
					}		
					else if($type=="liked")
					{
				
				//		
				?>
					<h3 class="span8"><?php echo $modelData[0]->users->display_name.' is '.strtoupper($type);?></h3>
					<a href="<?php echo $this->createUrl('site/ajaxprofile',array('id'=>$modelData[0]->users_id));?>" class="navlink pull-right mgtop20 btn badge btn-danger">Back To Profile</a>
					<div class="span12 thumbnails">
					<?php 
					foreach($modelData as $result)
						{
						//CVarDumper::dump($result->artistsProfile->profile,10,1);die;
						?>		
								
					
					<span class="span2 thumbnail">
													<a href="<?php echo ($result->artistsProfile->profile->users->roles->roles_name=='Artist')?$this->createUrl('site/ajaxprofile',array('id'=>$result->artistsProfile->profile->users_id)):$this->createUrl('site/ajaxlistener',array('id'=>$result->artistsProfile->profile->users_id));?>" class="navlink"><img src="<?php echo (!$result->artistsProfile->profile->image=='')? ImageFly::Instance()->get($result->artistsProfile->profile, 'image', 150, 150): $baseUrl.'/img/profile-placeholder.jpg';?>"/>
													<p align="center">
													<?php echo $result->artistsProfile->profile->users->display_name;?></p></a>
					</span>
				
					
					
					<?php }
						//CVarDumper::dump($modelData[0]->artistsProfile->profile->users->display_name,10,1);die;
			?>	
			</div>
			<?php
					}
			
					?>
					
			
	</section>	
</section>