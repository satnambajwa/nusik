<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#"><small></small></a>

		<span class="span1 mgrleft-10 offset-1"><img src="<?php echo $baseUrl;?>/img/logoN.png" /></span>
 

          <div class="nav-collapse span-16">
<ol class="nav nav-tabs">
		<?php $this->widget('zii.widgets.CMenu',array(
						'activeCssClass'	=> 'active',
						  'htmlOptions'=>array('class'=>'pull-right  span-1 nav '),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
		    
						'items'=>array( 
							array('label'=>'Home', 'url'=>array('/adminpanel/siteadmin/index'),'visible'=>!Yii::app()->user->isGuest),
							//view='usermgt' show the this file....
						//array('label'=>'User Management', 'url'=>array('/adminpanel/siteadmin/usermgt', 'view'=>'usermgt'),'visible'=>!Yii::app()->user->isGuest?((Yii::app()->user->role=='Admin')?1:0):0),

							array('label'=>'User Management','url'=>array('/adminpanel/siteadmin/usermgt', 'view'=>'usermgt'),'visible'=>!Yii::app()->user->isGuest?((Yii::app()->user->role=='Admin')?1:0):0),
                          array('label'=>'Artist Details <span class="caret"></span>', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
			                        array('label'=>'Track Has Comments', 'url'=>array('/adminpanel/genre/artisthas', 'view'=>'artisthastrack'),'visible'=>!Yii::app()->user->isGuest?((Yii::app()->user->role=='Admin')?1:0):0),
							array('label'=>'Track Management', 'url'=>array('/adminpanel/genre/trackmgt', 'view'=>'trackmgt'),'visible'=>!Yii::app()->user->isGuest?((Yii::app()->user->role=='Admin')?1:0):0),

                        )),
                  
		

							array('label'=>'Report Management', 'url'=>array('/adminpanel/report/commentreports'),'visible'=>!Yii::app()->user->isGuest?((Yii::app()->user->role=='Admin')?1:0):0),
							
							array('label'=>'Location & Genre Management', 'url'=>array('/adminpanel/siteadmin/country'),'visible'=>!Yii::app()->user->isGuest?((Yii::app()->user->role=='Admin')?1:0):0),
							
							
							array('label'=>'Login', 'url'=>array('/adminpanel/siteadmin/login'), 'visible'=>Yii::app()->user->isGuest),
							
							array('label'=>'Logout', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); ?>
   </div></div> </ol>
	</div>
</div>

