<?php
	  $baseUrl = Yii::app()->theme->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
?>
<!--<style>

/* SEARCHRESULTS */
#searchresults { border-width:1px; border-color:#919191; border-style:solid; width:320px; background-color:#a0a0a0; font-size:10px; line-height:14px; }
#searchresults a { display:block; background-color:#e4e4e4; clear:left; height:56px; text-decoration:none; }
#searchresults a:hover { background-color:#b7b7b7; color:#ffffff; }
#searchresults a img { float:left; padding:5px 10px; }
#searchresults a span.searchheading { display:block; font-weight:bold; padding-top:5px; color:#191919; }
#searchresults a:hover span.searchheading { color:#ffffff; }
#searchresults a span { color:#555555; }
#searchresults a:hover span { color:#f1f1f1; }
#searchresults span.category { font-size:11px; margin:5px; display:block; color:#ffffff; }
#searchresults span.seperator { float:right; padding-right:15px; margin-right:5px;
			background-image:url(../images/shortcuts_arrow.gif); background-repeat:no-repeat; background-position:right; }
#searchresults span.seperator a { background-color:transparent; display:block; margin:5px; height:auto; color:#ffffff; }

</style><script type="text/javascript" src="http://www.google.com/jsapi"></script>-->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


<div class="row-fluid" style="position:fixed;">

	<span class="span12 nav-bar nav-collapse height12" id="header">
        <span class=" span2"  ><a href="<?php echo $this->createUrl('site/index');?>"><img src="<?php echo $baseUrl;?>/img/logoN.png" class="mgtop-20pixel" width="130px"  /></a></span>
        <span class="span6">
             	<div id="search" class=" span6 mgtop15">
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
					 echo CHtml::textField('search','',array('class'=>'span9','placeholder'=>'Search by Location, Genres'));
					 
					 $src=$baseUrl.'/img/search2.png';
					echo CHtml::imageButton($src, array('class'=>'img-polaroid border-radius10 mgtop-10 mgleft5 bgcolor-white'));
				//	 echo CHtml::imageButton('',);
					 //SubmitButton('<img src="'.$baseUrl.'/img/search2.png"  style="margin-top:-6px;"  title="" />', $this->createUrl("site/search"),$ajaxOptions=array('dataType'=>'json', 'success'=>'function(html){ window.location.href=}' ), $htmlOptions=array());									
					?>
					
					<?php $this->endWidget(); ?>
<!--<input type="text" class=" span9" placeholder="Search by Location, Genres" />
					<a href="" onclick="submit"><img src="<?php echo $baseUrl;?>/img/search2.png" style="margin-top:-6px;" class="img-polaroid border-radius10 bgcolor-white"/></a></form>-->
					<!--<form id="searchform">
				<div>
		<input type="text" class="span9" placeholder="Search by Location, Genres" value="" id="inputString" onkeyup="lookup(this.value);" />
		</div>
		<div id="suggestions"></div>
	</form>-->
				</div>
	<span class="span6 mgtop20">
	 	<div id="player">
		<script type="text/javascript">
AC_FL_RunContent( 'type','application/x-shockwave-flash','data','<?php echo $baseUrl;?>/swf/dewplayer-vol.swf?mp3=<?php // echo Yii::app()->baseUrl.'/'.$song;?>','width','240','height','40','id','dewplayer-vol','wmode','transparent','movie','dewplayer-vol?mp3=<?php // echo $song;?>' ); //end AC code
</script><noscript><object type="application/x-shockwave-flash" data="<?php echo $baseUrl;?>/swf/dewplayer-vol.swf?mp3=<?php // echo Yii::app()->baseUrl.'/'.$song;?>" width="240" height="40" id="dewplayer-vol"><param name="wmode" value="transparent" /> <param name="movie" value="dewplayer-vol.swf?mp3=<?php // echo $song;?>" /></object></noscript>
</div>
		</span>
    
        </span>
		 
	<span class="span4">
       <ul class="nav nav-tabs span12 pull-right">
		    <li><a href="<?php 
			if(Yii::app()->user->role=='1')
			{ 	
				echo $this->createUrl('site/ajaxprofile',array('id'=>Yii::app()->user->id));
				
			}
			else
			{
				echo $this->createUrl('site/ajaxlistener',array('id'=>Yii::app()->user->id));
			}?>" class="color-white font-14 navlink">My Nusik</a></li>
            	
            <li><a href="<?php echo $this->createUrl('site/soundline',array('uid'=>Yii::app()->user->id));?>" class="font-14 color-white navlink">Soundline</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle font-14 color-white" data-toggle="dropdown"><?php echo Yii::app()->user->dname;?><span class="caret"></span></a>
                <ul class="dropdown-menu">
		  			<li><a href="#ChangePass" data-toggle="modal" class="color-white font-14">Change Password</a></li>
                    <li><a href="<?php echo $this->createUrl('site/logout');?>" class="color-white font-14" >logout</a></li>
                </ul>
                </li>
        </ul>
        </span>
	    <!-- <span class="span4">
       <ul class="nav nav-tabs span10 pull-right">
		    <li><a href="<?php 
			if(Yii::app()->user->role=='1')
			{ 	
				echo $this->createUrl('site/profile',array('id'=>Yii::app()->user->id));
				
			}
			else
			{
				echo $this->createUrl('site/listener',array('id'=>Yii::app()->user->id));
			}?>" class="color-white font-14">My Nusik</a></li>
            	
            <li>
			<a href="<?php echo $this->createUrl('site/soundline',array('uid'=>Yii::app()->user->id));?>" class="font-14 color-white">Soundline</a>
			</li>
                <li class="dropdown">
                    <a class="dropdown-toggle font-14 color-white" data-toggle="dropdown"><?php echo Yii::app()->user->dname;?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#ChangePass" data-toggle="modal" class="color-white font-14">Change Password</a></li>
						<li><a href="<?php echo $this->createUrl('site/logout');?>" class="color-white font-14">logout</a></li>
					</ul>
                </li>
        </ul>
        </span>-->
	</span>
    <span class="span12">
    	<span class="icon-arrow-up icon-white" id="minimize" style="cursor:pointer; position:fixed; top:10px; right:10px;"></span>
    	<span class="icon-arrow-down icon-white" id="maximize" style="cursor:pointer; position:fixed; top:10px; right:30px;"></span>

    </span>
	
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#minimize").click(function(){
			$("#header").fadeOut(500);
		});
		$("#maximize").click(function(){
			$("#header").fadeIn(500);
		});
		
	});

</script>
<section id="ChangePass" class="modal hide fade">
           <div class="modal-body">
             <h4><span id="password"> </span>Change Password</h4>
             <p>
             <div id="span8">
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'change-pass',
				'action'=>'#',
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				'enableAjaxValidation'=>false,
			 )); 
			 
			 ?>
                 <table cellspacing="5" cellpadding="" style="margin:auto;">
              
                    <tr><td>Old Password:</td></tr>
                    <tr><td><?php echo  CHtml::passwordField('oldPass','',array('placeholder'=>'Old Password')); ?></td></tr>
					<tr><td>New Password:</td></tr>
				    <tr><td><?php echo  CHtml::passwordField('newPass','',array('placeholder'=>'New Password')); ?></td></tr>
					<tr><td>Retype-New Password:</td></tr>
				    <tr><td><?php echo  CHtml::passwordField('newPassC','',array('placeholder'=>'Confirm Password')); ?></td></tr>
					
					<tr><td><center><?php echo CHtml::link('Change Password','javascript:void(0)',array('class'=>'btn btn-info','onclick'=>'change()')); ?> <?php //echo CHtml::submitButton('Change Password',array('class'=>'btn btn-info')); ?></center></td></tr>
                </table>
			
				 
				
               
<?php $this->endWidget(); ?>
               </div>
           </p>  
         </div>
        <footer class="modal-footer">
	       <button class="btn btn-info" data-dismiss="modal">Close</button>
       </footer>
</section>
<script>
function change()
{
	var newPass=document.getElementById('newPass').value;
	var newPassC=document.getElementById('newPassC').value;
	var oldPass=document.getElementById('oldPass').value;
	if(newPass!=newPassC)
			{
				alert("Password didn't match!!");
				document.getElementById('newPass').value="";
				document.getElementById('newPassC').value="";
				
			}
	else if(oldPass=="")
			{
				alert("Password field can't be empty!");
				document.getElementById('newPass').value="";
				document.getElementById('newPassC').value="";
			}
	else if(newPass.length<6)
			{
				alert("Password must have atleast 6 characters.");
				document.getElementById('newPass').value="";
				document.getElementById('newPassC').value="";
						
			}
	else
	{
		$.ajax({
				type:'POST',
				url:'<?php echo $this->createUrl("site/changepass",array('id'=>Yii::app()->user->id)); ?>',
				data:$("#change-pass").serialize(),
				beforeSend:function()
				{
					
				},
				success:function(response)
				{
					var result = $.parseJSON(response);
					if (result.status === 'success') 
					{
						alert("Password Changed Successfully!! Please Log In again !");
						window.location.href=result.url;
					}
					else if(result.status === 'failed') 
					{
						if(result.errormessage.password != null)
						{
							alert('Invalid Old Password!!');
							document.getElementById('newPass').value="";
							document.getElementById('newPassC').value="";
							document.getElementById('oldPass').value="";
						}
						else
						{
							alert('Invalid Old Password!!');
							document.getElementById('newPass').value="";
							document.getElementById('newPassC').value="";
							document.getElementById('oldPass').value="";
							
						}
					}
				}
			});
	}
}
</script>