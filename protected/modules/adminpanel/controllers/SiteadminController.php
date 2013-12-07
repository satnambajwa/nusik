<?php

class SiteadminController extends Controller
{
 public $layout='//layouts/main';

	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
			if(Yii::app()->user->role=="Admin");
				$this->redirect($this->createUrl('index'));		
		}}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionCreateuser()
	{
	    $model=new Users;
	    if(isset($_POST['Users']))
	    {
			$model->attributes=$_POST['Users'];
			date_default_timezone_set('Asia/Kolkata');
			$model->created_date=date('Y-m-d H:i:s');
			if($model->validate() && $model->save())
			{
			echo "<script>alert('Record Save Successfully')</script>";
			}
	     }
	    $this->render('createuser',array('model'=>$model));
	}
	public function actionUsermgt()
	{
	  $model=new Users;

    
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];
    $this->render('usermgt',array('model'=>$model));
	}
	public function actionUserdetails()
	 {
	 $id=Yii::app()->request->getQuery('id');
	$model=Users::model()->findByPk($id);
	$profilemodel=Profile::model()->findByAttributes(array('users_id'=>$id));
	$this->render('userdetails',array('model'=>$model,'profilemodel'=>$profilemodel));
	}

		public function actionProfileview()
	{
	$model=new Profile;
	$this->render('profileview',array('model'=>$model));
	}
public function actionUserupdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('userdetails','id'=>$model->id));
		}

		$this->render('createuser',array(
			'model'=>$model,
		));
	}
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionDeleteuser($id)
	{
		$model=Users::model()->findByPk($id);
		$profilemodel=Profile::model()->findByAttributes(array('users_id'=>$id));
		if($profilemodel===null)
		{
		$model->delete();
		}
		else
		{
		$model->delete();
		$profilemodel->delete();
		}
		if(!isset($_GET['ajax']))
		{
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('siteadmin'));
		}
	}
		public function profileloadModel($id)
	{
		$model=Profile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
		public function actionDeleteprofile($id)
	{
		$this->profileloadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('profileview'));
	}
	public function actionAjaxupdate()
	{
	    $act = $_GET['act'];
	    $autoIdAll = $_POST['autoId'];
	        if(count($autoIdAll)>0)
		{
			foreach($autoIdAll as $autoId)
			{
			
			$model=Users::model()->findByPk($autoId);
			
				if($act=='doActive')
				{
				$model->status = '1';
				}
			        if($act=='doInactive')
				{
				$model->status = '0';
				}
				if($model->save())
				{
				echo 'ok';
				}
				else
				{
				throw new Exception("Sorry",500);
				}
		       }
		}
	}
	
	public function actionCountry()
	{
	$model=new Countries;
	$this->render('country',array('model'=>$model));
	}
	
	public function actionAddgenre()
	{
	      $gname=$_POST['a'];
	      $model=new Genres;
	      $model->name=$gname;
	      date_default_timezone_set('Asia/Kolkata');
	      $model->date_time=date('Y-m-d H:i:s');
		    
		    if($model->save())
		   {
		   echo "Record Added Success Fully";
		   }
	}
	public function actionDynamicgenre()
	{
	

    $countryId    =    $_POST['ArtistProfile']['genres_id'];

        $cityList    = profile::model()->findAllByAttributes(array('cities_id'=>$countryId));
        //echo CHtml::tag('option',array('value'=>'-1'),CHtml::encode('Select City Name'),true);
        foreach($cityList as $cities)
        {
            echo CHtml::tag('option',array('value'=>$cities->id),CHtml::encode($cities->name),true);
        }
        die;
    }

	
		public function deleteloadModel($id)
	{
		$model=Genres::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionDeletegenre($id)
	{
		$model=Genres::model()->findByPk($id)->delete();
		if(!isset($_GET['ajax']))
		{
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('siteadmin'));
		}
	}
	public function actionAddcountry()
       {
	       $model=new Countries;
	       if(isset($_POST['Countries']))
	      {
		$model->attributes=$_POST['Countries'];
			if($model->validate() && $model->save())
			{
            
            
			}
	      }
	    $this->render('addcountry',array('model'=>$model));
	}
	public function actionAutosearch()
	{
	$model=new ArtistsProfile;
	
	     $this->render('autosearch',array(
            'model'=>$model,
        ));
	}
	public function actionAutosuggest()
	{
	$s=mysql_real_escape_string($_POST['abhilash']);
	//$filter=$_POST['f'];
	//echo $filter;
	$criteria=new CDbCriteria();
	$criteria->addSearchCondition('name', $s);
	$criteria->limit=20;
	$country=Countries::model()->findAll($criteria);

	echo '<ul class="list">';
		foreach($country as $s)
		{
		echo "<li><a href='#'>".$s->name."</a></li>";
		}
	echo "</ul>";
	}
public function deletecityloadModel($id)
	{
		$model=Cities::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	public function actionDeletecity($id)
	{
	$model=Cities::model()->findByPk($id)->delete();
	if(!isset($_GET['ajax']))
	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('siteadmin'));
	}
	
		public function actionArtiststrack()
	{
	$model=new ArtistTrack;
	CVarDumper::dump($model,10,1);die;
	$this->render('artiststrack',array('model'=>$model));
	}
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			
			array('allow',
				'actions'=>array('login','signup','login1','signin','dynamicGenre','username'),
				'users'=>array('@'),
			),
			
		
		);
	}

	
	}
