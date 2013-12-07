<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="/nusik/index.php?r=site&view=index">Nusik<small> Admin Panel</small></a>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
							   array('label'=>'User Mgmt<span class="caret"></span>', 'url'=>'#','visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 			'items'=>array(
		                                array('label'=>'Roles', 'url'=>array('/admin/roles', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
   										array('label'=>'Users Registration', 'url'=>array('/admin/users', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),					
   										array('label'=>'User Details ', 'url'=>array('/admin/profile', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'City', 'url'=>array('/admin/Cities', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Country', 'url'=>array('/admin/countries', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest), 
										 
										
							)),
		
 							  array('label'=>'Music Mgmt<span class="caret"></span>', 'url'=>'#','visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
													'items'=>array(
													 array('label'=>'Genres', 'url'=>array('/admin/genres', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
												 	array('label'=>'Tracks', 'url'=>array('/admin/artisttrack', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
													array('label'=>'PlayLists', 'url'=>array('/admin/playlisttrack', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),								 
													
													)),
							 array('label'=>'Follow & Like Mgmt<span class="caret"></span>', 'url'=>'#','visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
													'items'=>array(
													 array('label'=>'Followers', 'url'=>array('/admin/followers', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
													array('label'=>'Likes', 'url'=>array('/admin/artistlike', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
													)),
													
							 array('label'=>'Artist Details<span class="caret"></span>', 'url'=>'#','visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
													'items'=>array(
													 array('label'=>'Artist Info', 'url'=>array('/admin/artistsProfile', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
													 array('label'=>'News', 'url'=>array('/admin/events', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
													 array('label'=>'Followers', 'url'=>array('#', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
													 
													 array('label'=>'Likes', 'url'=>array('#', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
													)),
							    
							     
								array('label'=>'CMS', 'url'=>array('/admin/cms'),'visible'=>!Yii::app()->user->isGuest),
								
								array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
								array('label'=>'Logout ('.Yii::app()->user->getState('dname').')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
							    ),
                )); 
				//CVarDumper::dump(Yii::app()->user->getState('dname'),10,1);die;?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           <form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Search">
           
           </form>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->