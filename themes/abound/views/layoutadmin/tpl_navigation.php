<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="">Nusik<small></small></a>
          
          <div class="nav-collapse"
	  >
		<?php $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass'	=> 'active',
						
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/adminpanel/siteadmin/index'),'visible'=>!Yii::app()->user->isGuest),
							//view='usermgt' show the this file....
						//array('label'=>'User Management', 'url'=>array('/adminpanel/siteadmin/usermgt', 'view'=>'usermgt'),'visible'=>!Yii::app()->user->isGuest?((Yii::app()->user->role=='Admin')?1:0):0),

							array('label'=>'User Management', 'url'=>array('/adminpanel/siteadmin/usermgt', 'view'=>'usermgt'),'visible'=>!Yii::app()->user->isGuest?((Yii::app()->user->role=='Admin')?1:0):0),
							
							array('label'=>'Report Management', 'url'=>array('/adminpanel/report/commentreports'),'visible'=>!Yii::app()->user->isGuest?((Yii::app()->user->role=='Admin')?1:0):0),
							
							array('label'=>'Location & Genre Management', 'url'=>array('/adminpanel/siteadmin/country'),'visible'=>!Yii::app()->user->isGuest?((Yii::app()->user->role=='Admin')?1:0):0),
							
							
							array('label'=>'Login', 'url'=>array('/adminpanel/siteadmin/index'), 'visible'=>Yii::app()->user->isGuest),
							
							array('label'=>'Logout', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); ?>
    	</div>
    </div>
	</div>
</div>

