<?php
	  $baseUrl = Yii::app()->theme->baseUrl; 
	?> 
<script>
jQuery(function($){
	$.supersized({
		// Functionality
		slideshow               :   1,			// Slideshow on/off
		autoplay				:	1,			// Slideshow starts playing automatically
		start_slide             :   1,			// Start slide (0 is random)
		stop_loop				:	0,			// Pauses slideshow on last slide
		random					: 	0,			// Randomize slide order (Ignores start slide)
		slide_interval          :   4000,		// Length between transitions
		transition              :   6, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed		:	1000,		// Speed of transition
		new_window				:	1,			// Image links open in new window/tab
		pause_hover             :   0,			// Pause slideshow on hover
		keyboard_nav            :   1,			// Keyboard navigation on/off
		performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
		image_protect			:	1,			// Disables image dragging and right click with Javascript
												   
		// Size & Position						   
		min_width		        :   0,			// Min width allowed (in pixels)
		min_height		        :   0,			// Min height allowed (in pixels)
		vertical_center         :   1,			// Vertically center background
		horizontal_center       :   1,			// Horizontally center background
		fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
		fit_portrait         	:   1,			// Portrait images will not exceed browser height
		fit_landscape			:   0,			// Landscape images will not exceed browser width
												   
		// Components							
		slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
		thumb_links				:	1,			// Individual thumb links for each slide
		thumbnail_navigation    :   0,			// Thumbnail navigation
		slides 					:  	[			// Slideshow Images
									{image : '<?php echo  Yii::app()->theme->baseUrl;?>/img/slider/1.jpg', title : '', thumb : '', url : ''},
									{image : '<?php echo  Yii::app()->theme->baseUrl;?>/img/slider/2.jpg', title : '', thumb : '', url : ''},  
									{image : '<?php echo  Yii::app()->theme->baseUrl;?>/img/slider/3.jpg', title : '', thumb : '', url : ''},
									{image : '<?php echo  Yii::app()->theme->baseUrl;?>/img/slider/4.jpg', title : '', thumb : '', url : ''},
									
									],  
								
		// Theme Options			   
		progress_bar			:	1,			// Timer for each slide							
		mouse_scrub				:	0
		
	});
		   		
});

function forgetPass()
{
			var emailid=document.getElementById("emailid").value;
			var atpos=emailid.indexOf("@");
			var dotpos=emailid.lastIndexOf(".");
		
			 if(emailid=="")
				{
				alert("Please enter your Emai Id");
				emailid.focus();
				return 0;
				}
				else if(atpos<1 || dotpos<atpos+2)
					{
						alert("Please enter valid e mail addresss");
						emailid.focus();
						return 0;
					}
				

	$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("site/forgetpass"); ?>',
			data:$("#forgetpass").serialize(),
			beforeSend:function()
			{
			
			},
			success:function(response)
			{
				if(response==1)
				{
					alert("Sorry Email doesn't Exist");
					return 0;
				}
				else
				{
				
					alert(response);
					return 1;
				}
			}
		});
}
</script>
<script language="javascript" type="text/javascript">
function signup()
{
   var pass = document.getElementById("password").value; 
		var cpass=document.getElementById("cpassword").value;
		 
		var email=document.getElementById("email").value;
		var atpos=email.indexOf("@");
		var dotpos=email.lastIndexOf(".");
		var	name=document.getElementById("dname").value;
		var space=name.indexOf(" ");
			if (name=="")
			{
			alert("Display Name field cannot be empty.");
			name.focus();
			return 0;
			}
			else if (name.length>8)
			{
			alert("Display name can't have more then 8 characters.");
			name.focus();
			return 0;
			}
			else if(space>0)
						{
						alert("Spaces are not allowed in display name");
						name.focus();
						return 0;
						}
					
			else  if(email=="")
				{
				alert("Please enter your Emai Id");
				email.focus();
				return 0;
				}
					else if(atpos<1 || dotpos<atpos+2)
						{
						alert("Please enter valid e mail addresss");
						email.focus();
						return 0;
						}
							else if(pass=="")
							{
							alert(" empty password");
							}
							
								else if( pass.length<=6)
								{
								alert( 'password is too short');
								document.getElementById("password").value="";
								document.getElementById("cpassword").value="";
								pass.focus();
								}
									else if (pass!=cpass)
									{
									
									alert('Conform password is wrong');
									document.getElementById("password").value="";
									document.getElementById("cpassword").value="";
									pass.focus();
									return 0;
									}
	else
		{
		$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("site/signup"); ?>',
			data:$("#signupfrm").serialize(),
			beforeSend:function()
			{	
				$("#output").html("<img src='<?php echo $baseUrl;?>/img/loading.gif'>");
			},
			success:function(response)
			{
				if(response==1)
				{
				alert("Sorry Email already Exist");
				}
				
				else 
				{
				alert(response);
				//$('.modal').modal('hide');
				window.location.href='<?php echo Yii::app()->createUrl("site/index"); ?>';
				}
				
			}
		});
}
}
</script>
<script>
function login()
{

	$.ajax({
			type:'POST',
			url:'<?php echo Yii::app()->createUrl("site/login"); ?>',
			data:$("#login-form").serialize(),
			beforeSend:function()
			{
			
			},
			success:function(response)
			{
				var result = $.parseJSON(response);
				if (result.status === 'success') 
				{
					window.location.href=result.url;
				}
				else if(result.status === 'failed') 
				{
					if(result.errormessage.password != null)
					{
					alert(result.errormessage.password);
					}
					else
					{
					alert(result.errormessage.username);
					}
				}
			}
		});
}




</script>
   
<section class="row-fluid">
 
  <section class="span12">
		<span class="span7 offset2 mgtop-7pixel"><img src="<?php echo $baseUrl;?>/img/logo.png"  /></span>
   </section>
  <section class="row-fluid">
      <section id="artist" class="modal hide fade">
         <header class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
		    <h1>NUSIK</h1>
         </header>
           <div class="modal-body">
             <h4><span id="role"> </span> Sign Up</h4>
             <p>
              
               <div id="span8">
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'signupfrm',
				'action'=>$this->createUrl('site/registration'),
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			 )); ?>
                 <table cellspacing="5" cellpadding="" style="margin:auto;">
              
                    <tr><td>Display Name</td></tr>
                    <tr><td><?php echo CHtml::textField('dname','',array('placeholder'=>'John/Alex'));?></td></tr>
                    <tr><td>Email</td></tr>
                    <tr><td><?php echo CHtml::textField('email','',array('placeholder'=>'xyz@example.com'));?></td></tr>
                    <tr><td>Password</td></tr>
                    <tr><td><?php echo CHtml::passwordField('password','',array('placeholder'=>'atleast 6 characters'));?></td></tr>
                    <tr><td>Confirm Password</td></tr>
                    <tr><td><?php echo CHtml::passwordField('cpassword','',array('placeholder'=>'Re-Enter Password'));?></td></tr>
                    <tr><td><center><?php echo CHtml::link('Signup','javascript:void(0)',array('class'=>'btn btn-info','onclick'=>'signup();')); ?></center></td></tr>
                </table>
				<?php echo CHtml::hiddenField('roles_id','',array('id'=>'roles')); ?>
				 
				
               
<?php $this->endWidget(); ?>
               </div>
           </p>  
         </div>
        <footer class="modal-footer">
		<div class="pull-left" id="output"></div>
	       <button class="btn btn-info" data-dismiss="modal">Close</button>
       </footer>
</section>
</section>
</section>
 
 
 	
      
       <aside class="span8  pull-left mgtop30 ">
	           <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
		
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
                <span class="span4"><?php echo CHtml::textField('email','',array('placeholder'=>'E-Mail','autofocus'=>true)); ?> </span>
                <span class="span4">  <?php echo CHtml::passwordField('password','',array('placeholder'=>'Password')); ?>
             <?php 
 echo CHtml::link('Login','javascript:void(0)',array('class'=>'btn btn-info mgtop-10','onclick'=>'login();')); 
?></span>
              <h8> <span class="span4 "> <a href="#forget" class="black" data-toggle="modal">Forgot Password?</a></span></h8>
                <span class="span4 mgleft30 black"></span>
                     
          
				<?php $this->endWidget(); ?>    
           </aside>
      
  
       <section class="pull-right span5  mgtop50">
          <script type="text/javascript" >
		  $(document).ready(function(){
 			$('#artists').click(function(){
			   document.getElementById('role').innerHTML="Artist";
			   document.getElementById('roles').value='1';
			});
			
			$('#listener').click(function(){
			   document.getElementById('role').innerHTML="Listener";
			   document.getElementById('roles').value='2';
			});
		  
		  });
		  </script>
                   
				   <span class="span2  "> <a href="#artist" id='artists' class="btn btn-info btn-block btn-large " data-toggle="modal">Artist Signup</a></span>
                   <span class="span2 "> <a href="#artist" id='listener' class="btn btn-info btn-block btn-large" data-toggle="modal">Listener Signup</a></span>
            </section>
      
         
<!-- Change Password-->
<section id="forget" class="modal hide fade">
         <header class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1>NUSIK</h1>
         </header>
           <div class="modal-body">
             <h4><span id="role"> </span> Recovery Password </h4>
              
               <div id="login">
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forgetpass',
	'enableAjaxValidation'=>false,
	    
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
<table>
<tr><td>Email Id:-</td><td><?php echo CHtml::textField('Text','',array('id'=>'emailid','placeholder'=>'Registered Mail Id')); ?></td></tr>
	<tr><td></td><td>
	<?php echo CHtml::link('Send','javascript:void(0)',array('class'=>'btn btn-primary large','onclick'=>'forgetPass();')); 
	//echo CHtml::submitButton("Submit",array('class'=>'btn btn-primary large','value'=>'Send')); ?></td></tr>
	</table>
<?php $this->endWidget(); ?>


           </p>  
         </div>
        <footer class="modal-footer">
               <button class="btn btn-info" data-dismiss="modal">Close</button>
       </footer>
</section>
           
           
       