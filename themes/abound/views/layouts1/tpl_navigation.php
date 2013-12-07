<?php
	  $baseUrl = Yii::app()->theme->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
?>
<div class="row-fluid" style="position:fixed;">
	<span class="span12 nav-bar" id="header">
        <span class=" span2"><img src="<?php echo $baseUrl;?>/img/logo.png" class="span6" /></span>
        <span class="span6">
             	<div id="search" class=" span6 mgtop15">
					<input type="text" class=" span9" placeholder="Search by Location, Genres" />
					<a href=""><img src="<?php echo $baseUrl;?>/img/search2.png" style="margin-top:-6px;" class="img-polaroid border-radius10 bgcolor-white"/></a>
				</div>

        </span>
        <span class="span4">
       <ul class="nav nav-tabs span10 pull-right mgtop10">
		    <li><a href="<?php 
			if(Yii::app()->user->role=='1')
			{ 	
				echo $this->createUrl('site/profile',array('id'=>Yii::app()->user->id));
				
			}
			else
			{
				echo $this->createUrl('site/listener',array('id'=>Yii::app()->user->id));
			}?>" class="color-white font-14">My Nusik</a></li>
            	
            <li><a href="<?php echo $this->createUrl('site/soundline',array('uid'=>Yii::app()->user->id));?>" class="font-14 color-white">Soundline</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle font-14 color-white" data-toggle="dropdown"><?php echo Yii::app()->user->dname;?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->createUrl('site/logout');?>" class="color-white font-14">logout</a></li>
                </ul>
                </li>
        </ul>
        </span>
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