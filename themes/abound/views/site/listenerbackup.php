<?php
$baseUrl= Yii::app()->theme->baseUrl;
?>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script>
		$(function(){
			$("#grid").mason({
				itemSelector: ".box",
				ratio: 1.5,
				sizes: [
					[1,1],
					[1,2],
					[2,2]
				],
				columns: [
					[0,480,1],
					[480,780,2],
					[780,1080,3],
					[1080,1320,4],
					[1320,1680,5]
				],
				filler: {
					itemSelector: '.fillerBox',
					filler_class: 'custom_filler'
				},
				layout: 'fluid',
			});
		});
		</script>
		<script type="text/javascript">
	
	$(function(){
		
		$('li a').click(function(e)
		 { 
					  $('#content').hide().load( $(this).attr('href') , function(){
					 $('#content').show()
			  })
			  return false
		})
	})
	</script>
<section class="container-fluid1">
<div class="profile-back">
  	<img src="<?php echo $baseUrl;?>/img/bac.jpg" class="img-polaroids"/>
  </div>
<section class="profile-container">
	<!-- Name of the Profile Holder-->
			<section class="row-fluid">
				<div class="span12">
						<div class="span6">	
							<span class="span11 color-black"><h3 class="name-font mgleft padding10">Sonu Nigam</h3>	</span>
						</div>
				</div>
			</section>
	
	<section class="row-fluid">
	<span class="span8  bgcolor-white">
		<div class="mgleft20">
		<div class="span12 border-radius10 padding20">	
		<span class="span12">
			<ul id="#nav" class="nav nav-tabs span12 mgtop-20">
				<li class="active"><a href="#content"><b>My Nusik</b></a></li>
				<li class=""><a href="<?php echo $this->createUrl('site/search');?>"target="#content" data-toggle="tab"><b>My Playlists</b></a></li>
				<li class=""><a href="<?php echo $this->createUrl('site/search');?>" data-toggle="tab"><b>Following</b></a></li>
			</ul>
		</span>
		<div id="content" class="row-fluid">
		<section class="span12">
				<div class="row-fluid">
				<div class="padding-soundline20">
						
								<!--shared a song-->
								<div class="span4 img-polaroid20">	
											<span class="span12 thumbnail">
												<img src="<?php echo $baseUrl;?>/img/3.jpg" />
												<p align="center">Shreya Ghosal</p>
											</span>
											<span class="span12"><h5 class="span10">Posted a song</h5></span>
											<span class="span12 mgtop-20"><a href=""><img src="<?php echo $baseUrl; ?>/img/play.png"/>Tumko Bhul Na Payege</a>
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href=""> Genre Type</a></span>
											</span>
											<span class="span5 pull-right offset7">
													<img src="<?php echo $baseUrl;?>/img/likes.png" class="small-icon" title="Like" />
													<img src="<?php echo $baseUrl;?>/img/share.png" title="span2" class="small-icon"/>
												
													<img src="<?php echo $baseUrl;?>/img/down.png" title="span2" class="small-icon"/>
											</span>
											<span class="span12 mgtop-10"><sub class="offset8">10 mins ago</sub></span>
								</div>
								<!--Following-->
								<div class="span4 img-polaroid20">	
											<span class="span12 thumbnail">
												<img src="<?php echo $baseUrl;?>/img/2.jpg" />
												<p align="center">Shaan</p>
											</span>
											<span class="span12 mgtop10"><h6 class="span6">is followed by</h6><span class="span6 thumbnail">
												<img src="<?php echo $baseUrl;?>/img/3.jpg" class="img-small" />
												<p align="center">Shreya Ghosal</p>
											</span> </span>
											
											<span class="span12"><small class="offset7">40 mins ago</small></span>
								</div>
								<!--Shared a song-->
								<div class="span4 img-polaroid20">	
											<span class="span12 thumbnail">
												<img src="<?php echo $baseUrl;?>/img/5.jpg" />
												<p align="center">Sonu</p>
											</span>
												<span class="span12"><h5 class="span6">Shared</h5></span>
											<span class="span12 mgtop-20"><a href=""><img src="<?php echo $baseUrl; ?>/img/play.png"/>Tum Hi Ho</a>
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/mic.png" /><a href="" class="mgleft5">Atif Aslam</a></span>
											
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href=""> Genre Type</a></span>
											</span>
											<span class="span12"><small class="offset7 mgtop10">10 mins ago</small></span>
								</div>
								<!--Liked an artist-->
								<div class="span4 img-polaroid20">	
											<span class="span12 thumbnail">
												<img src="<?php echo $baseUrl;?>/img/2.jpg" />
												<p align="center">Shaan</p>
											</span>
											<span class="span12 mgtop10"><h5 class="span6">has Liked</h5><span class="span6 thumbnail">
												<img src="<?php echo $baseUrl;?>/img/3.jpg" class="img-small" />
												<p align="center">Shreya Ghosal</p>
											</span> </span>
											
											<span class="span12"><small class="offset7 mgtop10">40 mins ago</small></span>
								</div>	
								<!--Made a comment-->	
								<div class="span4 img-polaroid20">	
											<span class="span12 thumbnail">
												<img src="<?php echo $baseUrl;?>/img/4.jpg" />
												<p align="center">Shaan</p>
											</span>
											<span class="span12 mgtop10"><p class="span12">Commented on Shreya's song</p>
												<span class="span12 thumbnail"><p align="center"> Great Share!!</p></span>
											</span>			
											<span class="span6 offset5">
												<span class="span12 offset10">
													<img src="<?php echo $baseUrl;?>/img/share.png" class="small-icon" title="Like" />
												</span>	
											</span>							
											<span class="span12"><small class="offset7">40 mins ago</small></span>
								</div>	
								<!--Liked a song-->
								<div class="span4 img-polaroid20">	
											<span class="span12 thumbnail">
												<img src="<?php echo $baseUrl;?>/img/5.jpg" />
												<p align="center">Sonu</p>
											</span>
												<span class="span12"><h5 class="span6">Liked</h5></span>
											<span class="span12 mgtop-20"><a href=""><img src="<?php echo $baseUrl; ?>/img/play.png"/>Tum Hi Ho</a>
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/mic.png" /><a href="" class="mgleft5">Atif Aslam</a></span>
											
											<span class="span12"><img src="<?php echo $baseUrl; ?>/img/genre.png" /><a href=""> Genre Type</a></span>
											</span>
											<span class="span12"><small class="offset7 mgtop10">10 mins ago</small></span>
								</div>
								
												
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
								<img src="<?php echo $baseUrl;?>/img/2.jpg" class="img-polaroid10 mg5" />
					
						</span>
						<span class="span8">
						<a href="" class=" mgtop5 pull-right"> Edit Profile</a>
							<h4 class="mgleft30"> Shaan</h4>
							<span class="span12"><p class=" mgleft20 mgtop-5"><img src="<?php echo $baseUrl; ?>/img/male.png" class="small-icon mgright5"/> Male, 22</p></span>
							<span class="span12"><p class=" mgleft20 mgtop-10"><img src="<?php echo $baseUrl; ?>/img/place.png" class="small-icon mgright5"/> City, Country</p></span>
							<span class="span12"><p class=" mgleft20 mgtop-15"><img src="<?php echo $baseUrl; ?>/img/email.png" class="small-icon mgright5"/> E-Mail address</p></span>
						
						</span>
					</div>
					<hr width="100%" height="2px" class="mgtop-10 bgcolor-black" />
					<div class="row-fluid">
						<span class="span12 mgtop-20">
						<h4 class="span8 padding10">	<img src="<?php echo $baseUrl;?>/img/suggesstion.png" class="mgright5"/>Nusik Suggestion</h4>
							<span class="span4  pull-right mgtop15"><a href="" class="mgtop5  pull-right"><img src="<?php echo $baseUrl;?>/img/refresh.png" class="mgright5 small-icon"/> </a></span>
						</span>
						
						<div class="row-fluid sides"> 
						<span class="span2">
							<img src="<?php echo $baseUrl;?>/img/4.jpg" class="small-img mgleft5 "/>
						</span>
							<span class="span9 mgtop-10"><h5  class=" mgleft5">Shreya Ghosal</h5></span>
							
						<span class="span9 mgtop-5">
						<img src="<?php echo $baseUrl;?>/img/suggesstion.png" class="small-icon mgleft5 " title="Followers"/><h7 class="mgleft5"title="Followers" >1,045 </h7><span class="mgleft10"> |  </span> <img src="<?php echo $baseUrl;?>/img/note.png" class="small-icon mgleft5 " title="Songs"/><h7 class="mgleft5"title="Songs" > 85</h7>
						<a href="" class="btn pull-right mgtop-10"> Follow</a> 
						</span>
						
					</div>
						<div class="row-fluid sides"> 
						<span class="span2">
							<img src="<?php echo $baseUrl;?>/img/3.jpg" class="small-img mgleft5 "/>
						</span>
							<span class="span9 mgtop-10"><h5  class=" mgleft5">Shreya Ghosal</h5></span>
							
						<span class="span9 mgtop-5">
						<img src="<?php echo $baseUrl;?>/img/suggesstion.png" class="small-icon mgleft5 " title="Followers"/><h7 class="mgleft5"title="Followers" >1,045 </h7><span class="mgleft10"> |  </span> <img src="<?php echo $baseUrl;?>/img/note.png" class="small-icon mgleft5 " title="Songs"/><h7 class="mgleft5"title="Songs" > 85</h7>
						<a href="" class="btn pull-right mgtop-10"> Follow</a> 
						</span>
						
					</div>
						<div class="row-fluid"> 
						<span class="span2">
							<img src="<?php echo $baseUrl;?>/img/1.jpg" class="small-img mgleft5 "/>
						</span>
							<span class="span9 mgtop-10"><h5  class=" mgleft5">Shreya Ghosal</h5></span>
							
						<span class="span9 mgtop-5">
						<img src="<?php echo $baseUrl;?>/img/suggesstion.png" class="small-icon mgleft5 " title="Followers"/><h7 class="mgleft5"title="Followers" >1,045 </h7><span class="mgleft10"> |  </span> <img src="<?php echo $baseUrl;?>/img/note.png" class="small-icon mgleft5 " title="Songs"/><h7 class="mgleft5"title="Songs" > 85</h7>
						<a href="" class="btn pull-right mgtop-10"> Follow</a> 
						</span>
						
					</div>		
					
					</div>
					<hr width="100%" height="2px" class="mgtop5 bgcolor-black" />
					<div class="row-fluid ">
						<span class="span12 mgtop-20">
						<h4 class="span8 padding10">	<img src="<?php echo $baseUrl;?>/img/mymusic.png" class="mgright5"/>My Liked</h4>
							<span class="span4  pull-right mgtop15"><a href="" class="mgtop5  pull-right">View All</a></span>
						</span>
						<div class="row-fluid sides"> 
						<span class="span2">
							<img src="<?php echo $baseUrl;?>/img/3.jpg" class="small-img mgleft5 "/>
						</span>
						<span class="span6 mgtop-10"><h5  class=" mgleft5">Shreya Ghosal</h5></span>
						<div class="pull-right span3"><a href=""><img src="<?php echo $baseUrl;?>/img/play.png" class="" title="Songs"/></a> <a href=""><img src="<?php echo $baseUrl;?>/img/add.png" class=" " title="Songs"/></a> 
						</div>	
						<span class="span9 mgtop-5">
							<img src="<?php echo $baseUrl;?>/img/mlike.png" class="small-icon mgleft5 " title="Followers"/>
							<h7 class="mgleft5"title="Followers" >1,045 </h7>
							<span class="mgleft10"> |  </span>
							 <img src="<?php echo $baseUrl;?>/img/mshare.png" class="small-icon mgleft5 " title="Songs"/>
							 <h7 class="mgleft5"title="Songs" > 85</h7>
							 <span class="mgleft10">|  </span>
							  <img src="<?php echo $baseUrl;?>/img/mcomment.png" class="small-icon mgleft5 " title="Songs"/><h7 class="mgleft5" title="Songs" > 85</h7>
						</span>
						
						
					</div>
						<div class="row-fluid sides"> 
						<span class="span2">
							<img src="<?php echo $baseUrl;?>/img/2.jpg" class="small-img mgleft5 "/>
						</span>
						<span class="span6 mgtop-10"><h5  class=" mgleft5">Shreya Ghosal</h5></span>
						<div class="pull-right span3"><a href=""><img src="<?php echo $baseUrl;?>/img/play.png" class="" title="Songs"/></a> <a href=""><img src="<?php echo $baseUrl;?>/img/add.png" class=" " title="Songs"/></a> 
						</div>	
						<span class="span9 mgtop-5">
							<img src="<?php echo $baseUrl;?>/img/mlike.png" class="small-icon mgleft5 " title="Followers"/>
							<h7 class="mgleft5"title="Followers" >1,045 </h7>
							<span class="mgleft10"> |  </span>
							 <img src="<?php echo $baseUrl;?>/img/mshare.png" class="small-icon mgleft5 " title="Songs"/>
							 <h7 class="mgleft5"title="Songs" > 85</h7>
							 <span class="mgleft10">|  </span>
							  <img src="<?php echo $baseUrl;?>/img/mcomment.png" class="small-icon mgleft5 " title="Songs"/><h7 class="mgleft5" title="Songs" > 85</h7>
						</span>
						
						
					</div>
						<div class="row-fluid sides"> 
						<span class="span2">
							<img src="<?php echo $baseUrl;?>/img/5.jpg" class="small-img mgleft5 "/>
						</span>
						<span class="span6 mgtop-10"><h5  class=" mgleft5">Shaan</h5></span>
						<div class="pull-right span3"><a href=""><img src="<?php echo $baseUrl;?>/img/play.png" class="" title="Songs"/></a> <a href=""><img src="<?php echo $baseUrl;?>/img/add.png" class=" " title="Songs"/></a> 
						</div>	
						<span class="span9 mgtop-5">
							<img src="<?php echo $baseUrl;?>/img/mlike.png" class="small-icon mgleft5 " title="Followers"/>
							<h7 class="mgleft5"title="Followers" >1,045 </h7>
							<span class="mgleft10"> |  </span>
							 <img src="<?php echo $baseUrl;?>/img/mshare.png" class="small-icon mgleft5 " title="Songs"/>
							 <h7 class="mgleft5"title="Songs" > 85</h7>
							 <span class="mgleft10">|  </span>
							  <img src="<?php echo $baseUrl;?>/img/mcomment.png" class="small-icon mgleft5 " title="Songs"/><h7 class="mgleft5" title="Songs" > 85</h7>
						</span>
						
						
					</div>
					</div>
				</div>	
	
			</div>
	</div>		
	

	</section>
				
</section>
</section>