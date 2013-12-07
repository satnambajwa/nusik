<?php $baseUrl=Yii::app()->theme->baseUrl;?>
<?php //CVarDumper::dump($modelSong,10,1);die;?>
<style>
textarea
{
 width:100%;
 min-width:10%; !important
}
</style>



	<section class=" mgtop50 offset1 span11 mgtop50">
	
		<section class="span11 border-radius10 padding-bottom10 bgcolor-white">
		
		<div class="row-fluid mgtop20">
           <span class="span3">
				<img src="<?php echo (!$modelSong->users->profiles[0]->image=='')? ImageFly::Instance()->get($modelSong->users->profiles[0], 'image', 400, 445):$baseUrl.'/img/profile-placeholder.jpg';?>" class="img-polaroid10 img-small50 offset1 " />
			</span>
          
			<span class="span8">
			
				<span class="row-fluid">
                <span class="span12">
					<span class="span1 mgtop20 "><img src="<?php echo $baseUrl;?>/img/note.png" class="mgleft50"/></span>
					<span class="span10"><h3 class="mgleft30"><?php echo $modelSong->song_name;?></h3></span>
				</span>
                </span>
                
				<span class="row-fluid mgtop-5">
                <span class="span9">
					<span class="span1 offset1"><img src="<?php echo $baseUrl;?>/img/artist.png" class="mgleft-10 mgtop-10 offset1" /></span>
					<span class="span8 mgtop-15"><a href=""><h4 class="mgleft3"> <?php echo $modelSong->users->display_name;?></h4></a></span>
				</span>
                </span>
                
				<span class="row-fluid mgtop-5">
                <span class="span9">
					<span class="span1 offset1"><img src="<?php echo $baseUrl;?>/img/genre.png" class="mgleft-10 mgtop-5 offset1" /></span>
					<span class="span8 mgtop-15"><a href=""><h5 class="mgleft3"> <?php echo $modelSong->users->profiles[0]->artistsProfiles[0]->geners->name;?></h5></a></span>
				</span>
                </span>
                
			 	<span class="row-fluid mgtop-5">
                <span class="span9">
					<span class="span1 offset1"><img src="<?php echo $baseUrl;?>/img/update.png" class="mgleft-10 offset1" /></span>
					<span class="span8 mgtop-10"><a href=""><h5 class="mgleft300"><?php $DateTimeStr = $modelSong->date_time;
echo date('jS F Y', strtotime($DateTimeStr));?></h5></a></span>
				</span>
                </span>
			 
			</span>
            
            
			<div class="span4 offset4 mgtop-10">
						
						<span class="span3">
						<?php echo  CHtml::ajaxLink('<img src="'.$baseUrl.'/img/likes.png" title="'.$modelSong->total_likes.' Likes" />', $this->createUrl("site/songOption",array('uid'=>Yii::app()->user->id,'sid'=>$modelSong->id,'type'=>'like')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#").html(html); }' ), $htmlOptions=array() ) ?>
						     <p class="mgleft20"><?php echo $modelSong->total_likes;?></p><p class="mgleft10">Likes</p></span>
                           
				            <span class="span3">
							<?php echo  CHtml::ajaxLink('<img src="'.$baseUrl.'/img/shared.png" title="'.$modelSong->total_shares.' Likes" />', $this->createUrl("site/songOption",array('uid'=>Yii::app()->user->id,'sid'=>$modelSong->id,'type'=>'share')), $ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ jQuery("#").html(html); }' ), $htmlOptions=array() ) ?>
                             <p class="mgleft20"><?php echo $modelSong->total_shares;?></p><p class="mgleft5">Shares</p></span>
                           
		                    <span class="span3"><img src="<?php echo $baseUrl;?>/img/comment.png"   />
                             <p class="mgleft20" id='commentCount'><?php echo $modelSong->total_comments;?></p><p class="mgleft1">Comments</p></span>
			</div>
          
        
		</div>
		<div class="span11 mgtop10">
			
				<h4> About Song:</h4>
				<p class="span10"><?php echo $modelSong->song_discription;?></p>			
			
		</div>
		<div id="Comment-Section">
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
                
		<div class="row-fluid  mgtop20">
			<h3 class="mgleft30">Comments:</h3>
			<span class="span11">
				<span class="span9"><?php echo $form->textArea($comment,'comment_text',array('rows'=>5,'placeholder'=>'Your Comment......','class'=>'offset1 span12')); ?>
				</span>
				<span class="span1 offset8"> <?php
									echo CHtml::ajaxButton( $label = 'Post', $url =$this->createUrl("site/songoption",array('uid'=>Yii::app()->user->id,'sid'=>$modelSong->id,'type'=>'comment')), $ajaxOptions=array ( 'type'=>'POST', 'dataType'=>'json', 'success'=>'function(html){$("#Comment-Section").load();jQuery("#commentCount").html(html); }' ), $htmlOptions=array ('class'=>'pull-right btn btn-danger') );?></span>
			</span>
		</div>
	<?php $this->endWidget(); ?>
		<div class="row-fluid mgtop5 color-sapient">
        
		<?php $modelComment=ArtistTrackHasComments::model()->findAllByAttributes(array('artist_track_id'=>$modelSong->id));
			  	foreach($modelComment as $comment)
				{
			
		?>
		<div class="row-fluid" id="comment-view">
			<div class="span10 border-bottom-white offset1 bgcolor-lightgrey mgtop5">
				<span class="thumbnails span1">
							<span class="bgcolor-white thumbnail">
								<img src="<?php echo (!$comment->users->profiles[0]->image=='')?ImageFly::Instance()->get($comment->users->profiles[0], 'image', 150, 150):$baseUrl.'/img/profile-placeholder.jpg';?>"/>
								<p align="" class="span12"><?php echo $comment->users->display_name;?></p>
							</span>
				</span>
				<span class="span9 border-radius10"><span class="span12"><p class="texty"><?php echo $comment->comments->comment_text;?>    
               </p></span></span>             
				<span class="span3 offset9 pull-right"><small><?php echo $comment->comments->add_date;?>|Report Abuse</small></span>
			</div>
		    </div>
			<?php }?>
        
            
        
		</div>
		</div>
	</section>
	
	</section>
