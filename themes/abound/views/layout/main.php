<?php
	Yii::app()->clientscript->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
		// use it when you need it!
		/*
		->registerCoreScript( 'jquery' )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )
		 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Nusik</title>
<meta name="description" content="">
<meta name="author" content="">

<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}

	@media (max-width: 980px) {
		body{
			padding-top: 0px;
		}
	}
</style>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>

<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">NUSIK</a>
				<div class="nav-collapse">
					<?php $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass'	=> 'active',
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/site/index'),'visible'=>!Yii::app()->user->isGuest),
						
							array('label'=>'User Management', 'url'=>array('/adminpanel/siteadmin/usermgt', 'view'=>'usermgt'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Report Management', 'url'=>array('/adminpanel/report/commentreports'),'visible'=>!Yii::app()->user->isGuest),
							//array('label'=>'Track Management', 'url'=>array('/adminpanel/siteadmin/trackmgt'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Location & Genre Management', 'url'=>array('/adminpanel/siteadmin/country'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Search', 'url'=>array('/adminpanel/siteadmin/autosearch'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); ?>

					<p class="navbar-text pull-right">Logged in as <a href="#"><?php echo Yii::app()->user->name; ?></a></p>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div class="container">
		<?php echo $content ?>
	</div> <!-- /container -->
</body>
</html>
