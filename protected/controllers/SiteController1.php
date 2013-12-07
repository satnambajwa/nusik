<?php


class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	 
	
	public $layout='//sitelayouts/main';
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->isGuest)
			$this->render('index');
		else if(Yii::app()->user->role==1)
			$this->redirect($this->createUrl('site/profile',array('id'=>Yii::app()->user->id)));
		else
			$this->redirect($this->createUrl('site/listener',array('id'=>Yii::app()->user->id)));
		
	}
	public function actionSignup()
	{
		$dispname=$_POST['dname'];
		$emailid=$_POST['email'];
		$password=$_POST['password'];
		$model=new Users;
		$datamodel=Users::model()->findByAttributes(array('email'=>$emailid));
		$total=count($datamodel);
		if($total>0)
		{
		echo "1";
		}
		else
		{
		
		$model->roles_id=$_POST['roles_id'];
		$model->display_name=$dispname;
		$model->email=$emailid;
		$model->password=$password;
		date_default_timezone_set('Asia/Kolkata');
		$model->created_date=date('Y-m-d H:i:s');
		$model->status='0';
			if($model->save())
			{
							
				$emailid=$model->email;
				$id=base64_encode($model->roles_id);
				$link=  CHtml::link(' Activate your account',$this->createAbsoluteUrl('site/activate',array('uid'=>$model->id))); 
				$to=$emailid;
				$from="no-reply@nusik.com";
				$subject="Account Activation";
				$Message="Hello ".$emailid."<br> <br>To activate your account click the below given link<br>". $link;
				$headers = "From:".$from."\r\n";
				$headers .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				//CVarDumper::dump($model->attributes,10,1);die;
					if(mail($to,$subject,$Message,$headers))
					{
					echo "alert('A Conformation mail has been sent to you. Check in your Inbox or Spam folder.')";
					}
				

			}
		}
	}
	
	public function actionDynamicCity(){
		$countryId	=	$_POST['Profile']['countries_id'];
		$cityList	= Cities::model()->findAllByAttributes(array('country_id'=>$countryId));
		//CVarDumper::dump($cityList,10,1);die;
		//echo CHtml::tag('option',array('value'=>'-1'),CHtml::encode('Select City Name'),true);
		foreach($cityList as $city)
		{
			echo CHtml::tag('option',array('value'=>$city->id),CHtml::encode($city->name),true);
		}
		die;
	}
	public function actionUpdatePhoto($id)
	{
		
			if(isset( $_FILES["Profile"]))
			{
				$model= Profile::model()->findByAttributes(array('id'=>$id));	
				
			/*	$model->last_updated=date('Y-m-d H:i');
				$userfile_extn = explode("/", strtolower($_FILES['Profile']['type']['image']));
				$newNamw	=	time().'.'.$userfile_extn[1];
				$fileTmpLoc = $_FILES["Profile"]["tmp_name"]['image'];
				// Path and file name
				$pathAndName = "images/profile/".$newNamw;
				// Run the move_uploaded_file() function here
				$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
				$model->image	=	"profile/".$newNamw;
				*/
				 $model->image = CUploadedFile::getInstance($model, 'image');
					 if($model->validate())
          				{	
              				$model->image->saveAs(ImageFly::Instance()->getPath($model, 'image'));
 							if($model->save())
								{ 
									if(Yii::app()->user->role=='1')
										$this->render('profile',array('model'=>$model));
									else
										$this->render('listener',array('model'=>$model));			
								}
			
	
						}
	
			}
		}
	public function actionUpdateCover($id)
	{
		
			if(isset( $_FILES["Profile"]))
			{
				$model= Profile::model()->findByAttributes(array('id'=>$id));	
				
				$model->last_updated=date('Y-m-d H:i');
				$userfile_extn = explode("/", strtolower($_FILES['Profile']['type']['image']));
				$newNamw	=	time().'.'.$userfile_extn[1];
				$fileTmpLoc = $_FILES["Profile"]["tmp_name"]['image'];
				// Path and file name
				$pathAndName = "images/cover/".$newNamw;
				// Run the move_uploaded_file() function here
				$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
				$model->cover_photo	=	"cover/".$newNamw;
				if($model->save())
				{ 
					if(Yii::app()->user->role=='1')
						$this->render('profile',array('model'=>$model));
					else
						$this->render('listener',array('model'=>$model));		
				}
			
	
			}
	
	}
	
	public function actionUpdateBasicInfo($id)
	{
		 if(isset($_POST["Profile"]))
			{
				$model= Profile::model()->findByAttributes(array('id'=>$id));	
				$model->attributes= $_POST["Profile"];
				$model->last_updated=date('Y-m-d H:i');
				if($model->save())
				  {
				  //CVarDumper::dump(Yii::app()->user->role,10,1);die;
				  	if(Yii::app()->user->role=='1')
						$this->render('profile',array('model'=>$model));
					else
						$this->render('listener',array('model'=>$model));
						
				  }
		    }
	
	}
	
	public function actionSongOption($uid,$sid,$type)
	{
		if($type=='like')
		{
			$checkLike=SongsLike::model()->findByAttributes(array('artist_track_id'=>$sid,'users_id'=>$uid));
			$modelSong=ArtistTrack::model()->findByAttributes(array('id'=>$sid));
				
				if($checkLike==''||$checkLike->status==0)
				{
					if($checkLike=='')
						$modelSongLike=new SongsLike;
					else
					    $modelSongLike=$checkLike;
						
					$modelSongLike->users_id=$uid;
					$modelSongLike->artist_track_id=$sid;
					$modelSongLike->status=1;
					$modelSong->total_likes+=1;
					$modelSongLike->date_time=date('Y-m-d H:i');
					if($modelSongLike->save()&&$modelSong->save())
					 {
					 	$modelFeed=new SoundLine;
						$modelFeed->activity_id=$modelSongLike->id;
						$modelFeed->user_id=$uid;
						$modelFeed->type='slike';
						$modelFeed->add_date=date('Y-m-d H:i');
						 if($modelFeed->save())
						  {
						  	echo $modelSong->total_likes;
				
						  	
						  }	
					 
					 }
				}
				else
				{
					$checkLike->status=0;
					$modelSong->total_likes-=1;
					
					if($checkLike->save()&&$modelSong->save())
					{
						echo $modelSong->total_likes;
					
					}
				
				}
		}
		elseif($type=='share')
		{
			
			$checkShare=Sharing::model()->findByAttributes(array('artist_track_id'=>$sid,'users_id'=>$uid));
					if($checkShare=='')
						$modelSongShare=new Sharing;
					else
					    $modelSongShare=$checkShare;
						
					$modelSongShare->users_id=$uid;
					$modelSongShare->artist_track_id=$sid;
					$modelSongShare->status=1;
					$modelProfile=Users::model()->findByPk($uid);
					$modelSongShare->profile_id=$modelProfile->profiles[0]->id;
					$modelSong=ArtistTrack::model()->findByAttributes(array('id'=>$sid));
					$modelSong->total_shares+=1;
					$modelSongShare->date_time=date('Y-m-d H:i');
					//CVarDumper::dump($modelSong,10,1);die;
					if($modelSongShare->save() && $modelSong->save())
					 {
					 	$modelFeed=new SoundLine;
						$modelFeed->activity_id=$modelSongShare->id;
						$modelFeed->user_id=$uid;
						$modelFeed->type='sshare';
						$modelFeed->add_date=date('Y-m-d H:i');
						 if($modelFeed->save())
						  {
						  	echo $modelSong->total_shares;
						  	
						  }	
					 
					 }
				
			}
			elseif($type=='comment')
			{
			
				$modelComment=new Comments;
				$modelHasComment=new ArtistTrackHasComments;
				if(isset($_POST['Comments']))
				{
					$modelComment->attributes=$_POST['Comments'];
					$modelComment->comment_date_time=date('Y-m-d H:i');
					$modelComment->add_date=date('Y-m-d H:i');
					$modelSong=ArtistTrack::model()->findByAttributes(array('id'=>$sid));
					$modelSong->total_comments+=1;
					
					 if($modelComment->save()&& $modelSong->save())
					  {
					  	$modelHasComment->artist_track_id=$sid;
						$modelHasComment->comments_id=$modelComment->id;
						$modelHasComment->users_id=$uid;
						
						if($modelHasComment->save())
						{
							$modelFeed=new SoundLine;
							$modelFeed->activity_id=$modelComment->id;
							$modelFeed->user_id=$uid;
							$modelFeed->type='scomment';
							$modelFeed->add_date=date('Y-m-d H:i');
							//CVarDumper::dump($modelFeed->save(),10,1);die;
							 if($modelFeed->save())
							  {
								echo $modelSong->total_comments;
								
							  }
							  else
							  {
							  CVarDumper::dump($modelFeed,10,1);die;	
					 			}	
						}
					  }
							
				}
			
			}
	
	}
	
	public function actionRegistration()
	{	
 		$model= new Profile;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Profile']))
		{
			$model->attributes=$_POST['Profile'];
			$model->users_id=Yii::app()->user->id;
			$model->last_updated=date('Y-m-d H:i');
			$model->date_time=date('Y-m-d H:i');
			if($model->save())
			 {
			  	
				$role_name=Roles::model()->findByAttributes(array('id'=>Yii::app()->user->role));
			 	if($role_name->roles_name=='Artist')
				{
							$artist_profile= new ArtistsProfile;
							$artist_profile->profile_id= $model->id;
							$artist_profile->biography='write something about you';
							$artist_profile->achivement='Your awards sperated by (dot).';
							$artist_profile->fb_link='#';
							$artist_profile->tw_link='#';
							$artist_profile->created_date=date('Y-m-d H:i');
							$artist_profile->save();
							$this->redirect($this->createUrl('site/profile',array('id'=>Yii::app()->user->id)));
				
				}
				else
					$this->redirect($this->createUrl('site/listener',array('id'=>Yii::app()->user->id)));
			  }	
			  else
			  {
			  	CVarDumper::dump($model,10,1);die;
			  }
		}
		
		$this->render('registration',array('model'=>$model));
	}
		
	public function actionBioInfo($id)
	{
		 
		 if(isset($_POST["ArtistsProfile"]))
			{
				$model= Profile::model()->findByAttributes(array('id'=>$id));
				$pmodel= ArtistsProfile::model()->findByAttributes(array('profile_id'=>$id));	
				$pmodel->attributes=$_POST["ArtistsProfile"];
				if($pmodel->save())
				  {
				  	$this->render('profile',array('model'=>$model));
				  }
		    }
	
	}
	
	public function actionComment($uid)
	{
       $modelComment= new Comments;
	   $modelProfileComment= new ProfileHasComments;
	   if(isset($_POST["Comments"]))
	   {
	    // CVarDumper::dump($_POST["Comments"],10,1);die;
		   $modelComment->attributes= $_POST["Comments"];
	   	   $modelComment->add_date=date('Y-m-d  H:i');
		   $modelComment->comment_date_time=date('Y-m-d H:i');
	   	   $artistProfile=ArtistsProfile::model()->findByAttributes(array('profile_id'=>$uid));
		   if($modelComment->save())
		   {	
		      	 $modelProfileComment->users_id=Yii::app()->user->id;
		   		 $modelProfileComment->profile_id=$uid;
		  		 $modelProfileComment->comments_id=$modelComment->id;
				 $artistProfile->total_comments+=1;
				 $artistProfile->save();
				 if($modelProfileComment->save())
				  {
				  		$feed=new SoundLine;
						$feed->activity_id=$modelComment->id;
						$feed->type='comment';
						$feed->user_id=Yii::app()->user->id;
						$feed->profile_id=$uid;
						$feed->add_date=$modelComment->add_date;
						if($feed->save())
				 		echo $artistProfile->total_comments;
						die;
				  }
			}			     
		 
	   }
	}
	//Likes
	public function actionLike($uid,$type)
	{
		   $artistProfile=ArtistsProfile::model()->findByAttributes(array('profile_id'=>$uid));
		   $validate=Follower::model()->findBYAttributes(array('users_id'=>Yii::app()->user->id,'artists_profile_id'=>$artistProfile->id));
		   if(!$validate)
		   $modelFeature= new Follower;
	       else
		   $modelFeature=Follower::model()->findBYAttributes(array('artists_profile_id'=>$artistProfile->id));
		   $artistProfile=ArtistsProfile::model()->findByAttributes(array('profile_id'=>$uid));
		   $modelFeature->users_id=Yii::app()->user->id;
		   $modelFeature->artists_profile_id=$artistProfile->id;
		   $modelFeature->date_time=date('Y-m-d  H:i');
		   if($type=='like')
		   	{
		    	if($modelFeature->is_liked=='')
				{
					$modelFeature->is_liked=1;
					$artistProfile->total_likes+=1;
				}
				else
				{
					$modelFeature->is_liked='';
					$artistProfile->total_likes-=1;
				}				
			}	 
			 if($type=='share')
		   	{
		    		$modelFeature->is_shared=1;
					$artistProfile->total_share+=1;
				
			}	 
			 elseif($type=='follow')
		   	{
				if($modelFeature->is_followed=='')
				{
					$modelFeature->is_followed=1;
					$artistProfile->total_followers+=1;
				}
				else
				{
					$modelFeature->is_followed='';
					$artistProfile->total_followers-=1;
				}	
			}	 
			
		   if($modelFeature->save())
		   {	
		      	 if($artistProfile->save())
				 {
				 		$feed=new SoundLine;
						$feed->activity_id=$modelFeature->id;
						$feed->type=$type;
						$feed->user_id=Yii::app()->user->id;
						$feed->profile_id=$uid;
						$feed->add_date=$modelFeature->date_time;
						if($feed->save())
						{
				 			if($type=='like')
							echo $artistProfile->total_likes;
							elseif($type=='follow')
							echo $artistProfile->total_followers;
							elseif($type=='share')
							echo $artistProfile->total_share;
						}
						
				  }
			}			     
		 
	 }
	
	public function actionProfile($id)
	{
		
 		$model=Profile::model()->findByAttributes(array('users_id'=>$id));
		$this->render('profile',array('model'=>$model));
	}

	public function actionSearch()
	{
 		
		if(isset($_POST['search']))
		{
			$finalResult=array();
			$str=$_POST['search'];
			$n=count($str);
			$result= Genres::model()->findAll(array(
			'condition' => 'name LIKE :fuga OR name LIKE :fug',
			'params' => array(':fuga' => '%'.$_POST['search'].'%',':fug' => '%'.$str[$n/2].'%'),));
			$result2= Cities::model()->findAll(array(
			'condition' => 'name LIKE :fuga OR name LIKE :fug',
			'params' => array(':fuga' => '%'.$_POST['search'].'%',':fug' => '%'.$str[$n/2].'%'),));
			//CVarDumper::dump($result2,10,1);die;	
			$locResult=array();
			foreach($result2 as $resultLoc)
			{
				$artist=Profile::model()->findAllByAttributes(array('cities_id'=>$resultLoc->id));
				if(count($artist)==0)
				{
					continue ;	
				}
				else
				{
				  $locReuslt=array_merge($locResult,$artist[0]->artistsProfiles);
				}
			
			}
		
			 $finalResult=array_merge($finalResult, $locResult);
			 $genResult=array();	
			 foreach($result as $resultGenre)
			 {
				$artists= ArtistsProfile::model()->findAllByAttributes(array('geners_id'=>$resultGenre->id));
			 	$genResult=array_merge($genResult, $artists);
			 }
				$finalResult=array_merge($finalResult, $genResult);
			
		}
	$this->render('search',array('model'=>$finalResult,'search'=>$_POST['search'],'genResult'=>$genResult,'locResult'=>$locResult));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	public function actionChangePass($id)
	{
		$user=Users::model()->findByPk($id);
		$result=array();
		//CVarDumper::dump($_POST);die;
		$newPass=$_POST['newPass'];
		$oldPass=$_POST['oldPass'];
		if($user->password==$oldPass)
		 {
		 	$user->password=$newPass;
		if($user->save())
		{
			$result['status'] = 'success';
			$result['url'] = Yii::app()->createUrl('site/logout');
			
		}
		}
		else
		{
			$result['status'] = 'failed';
			$errors = $user->getErrors();
			$result['errormessage'] = $errors;
		}
		echo json_encode($result);
		
	}
	/**
	 * Displays the login page
	 */
	public function actionActivate($uid)
	{
		$user=Users::model()->findByPk($uid);
		$user->status=1;
		if($user->save())
		 {
		 	echo '<script> alert("Your Account Has Been Activated");</script>';
		 	$this->redirect(array('site/index'));
		 }
		
	}
	
	public function actionLogin()
	{
		
				
		$model=new LoginForm;
		
		$result = array();
		$model->username=$_POST['email'];
		$model->password=$_POST['password'];
		if($model->validate() && $model->login())
		{
			$umodel=Users::model()->findByAttributes(array('id'=>Yii::app()->user->id));
			//CVarDumper::dump(,10,1);die;
			if(count($umodel->profiles)==0)
			{
				$profileModel=new Profile;
				$profileModel->first_name='Edit Your Name';
				$profileModel->date_of_birth='1999-09-9';
				$profileModel->gender='Gender';
				$profileModel->date_time=date('Y-m-d H:i');
				$profileModel->status=1;
				$profileModel->users_id=$umodel->id;
				//CVarDumper::dump($profileModel->save(),10,1);die;
				if($profileModel->save())
					{
						$role_name=Roles::model()->findByAttributes(array('id'=>Yii::app()->user->role));
						if($role_name->roles_name=='Artist')
						{
							$artist_profile= new ArtistsProfile;
							$artist_profile->profile_id= $profileModel->id;
							$artist_profile->biography='write something about you';
							$artist_profile->achivement='Your awards sperated by (dot).';
							$artist_profile->fb_link='#';
							$artist_profile->tw_link='#';
							$artist_profile->created_date=date('Y-m-d H:i');
							$artist_profile->save();
						}				
					}
			}
			$result['status'] = 'success';
			if(Yii::app()->user->role==1)
			$result['url'] = Yii::app()->createUrl('site/profile',array('id'=>Yii::app()->user->id));
			else
			$result['url'] = Yii::app()->createUrl('site/listener',array('id'=>Yii::app()->user->id));
			
		}
		else
		{
		 $result['status'] = 'failed';
		$errors = $model->getErrors();
		$result['errormessage'] = $errors;
		}
		echo json_encode($result);
		
		}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	public function actionSoundline($uid)
	{
		$modelProfile=Profile::model()->findByAttributes(array('users_id'=>$uid));
		$model=new ArtistTrack;
		$this->renderPartial('soundline',array('modelProfile'=>$modelProfile,'model'=>$model));
	}
	public function actionListener($id)
	{
			$model=Profile::model()->findByAttributes(array('users_id'=>$id));
				$this->render('listener',array('model'=>$model));
		}
	public function actionSong($sid)
	{
		$modelSong=ArtistTrack::model()->findByPk($sid);
		$this->render('song',array('modelSong'=>$modelSong));
	}
	public function actionUpload()
{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 
        $folder=Yii::app()->baseUrl.'/songs/';// folder for uploaded files
		//CVarDumper::dump($folder,10,1);die;
        $allowedExtensions = array("mp3");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 		CVarDumper::dump($result,10,1);die;	
         $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME
 
        echo $return;// it's array
}
	
	public function actionSongUpload()
	{
		$model=new ArtistTrack;
		if(isset($_POST['ArtistTrack']))
			{
				$model->attributes=$_POST['ArtistTrack'];
				$model->date_time=date('Y-m-d H:i');
				$model->uploaded_date=date('Y-m-d H:i');
				$userfile_extn = explode("/", strtolower($_FILES['ArtistTrack']['type']['song_url']));
				$newNamw	=	$model->song_name.'.'.$userfile_extn[1];
				$fileTmpLoc = $_FILES["ArtistTrack"]["tmp_name"]['song_url'];
				// Path and file name
				$pathAndName = "songs/".$newNamw;
				// Run the move_uploaded_file() function here
				$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
				$model->song_url	=	$newNamw;
				$model->users_id=Yii::app()->user->id;
//				CVarDumper::dump($model,10,1);die;
				$user=Profile::model()->findByAttributes(array('users_id'=>Yii::app()->user->id));
				if($model->save())
				{
						$feed=new SoundLine;
						$feed->activity_id=$model->id;
						$feed->type='post';
						$feed->user_id=Yii::app()->user->id;
						$feed->profile_id=$user->id;
						$feed->add_date=$model->date_time;
						
						if($feed->save())
						{
							$artistModel=ArtistsProfile::model()->findByAttributes(array('profile_id'=>$user->id));
							$artistModel->total_songs+=1;
							if($artistModel->save())
							{
								$this->redirect(array('site/index'));		
							}
						}
			
					
				}
			}
	
			
	}
	
	public function actionForgetpass()
	{
				$emailid=$_POST['Text'];
				$model=Users::model()->findByAttributes(array('email'=>$emailid));
				//CVarDumper::dump($model->attributes,10,1);die;
				
				$to = $model->email;
				$subject = "Password Recovery";
				$message = "\n\nYour Email Id :".$model->email."<br><br>Password:".$model->password;
				$from = "no-reply@discovernusik.com";
				$headers = "From:".$from."\r\n";
				$headers .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				mail($to,$subject,$message,$headers);
				echo "Mail Sent.";
				$this->redirect(array('site/index'));
				$this->render('forget',array('model'=>$model));
		
	}
	
		 public function updateTrack($model, $myfile ) 
		 {
		   if (is_object($myfile) && get_class($myfile)==='CUploadedFile') {
				$ext = $model->url->getExtensionName();
				 if ($model->filename=='' or is_null($model->filename)) {
					$model->filename = time();
				$model->filename=$filename;
				}
				$model->save();
				$model->url->saveAs($model->getPath());  //model->getPath see below
				$image = Yii::app()->url->load($model->getPath());
			return true;
			}
			else 
			return false;	
		
		}
		
		//chandan's code
		public function actionPlaysongs()
			{
				$id=$_POST['id'];
				$song=ArtistTrack::model()->findByPk($id);
				echo htmlspecialchars('songs/'.$song->song_url);
			}
			public function actionCreateplaylist()
			{
				$pname=$_POST['pname'];
				$model=new UsersPlaylist;
				$model->users_id=Yii::app()->user->id;
				date_default_timezone_set('Asia/Kolkata');
				$model->created_date=date('Y-m-d H:i:s');
				$model->playlist_name=$pname;
				$model->status=1;
				$model->date_time=date('Y-m-d H:i:s');
					if($model->save())
					{
						echo "Play List Created Succeefully";
					}
			}
			public function actionAddsong()
			{
				$sid=$_POST['sid'];
				$pid=$_POST['pid'];
				$model=new UsersPlaylistHasArtistTrack;
				$model->users_playlist_id=$pid;
				$model->artist_track_id=$sid;
				date_default_timezone_set('Asia/Kolkata');
				$model->add_datetime=date('Y-m-d H:i:s');
					if($model->save())
					{
						echo "Song Save sccessfully in your Play List";
					}
					else
					{
						echo "Some error encounted !! Please Try again later!!";
					}
					
			}
			public function actionAjaxprofile($id)
			{
				$user=Users::model()->findByPk($id);
				$model=Profile::model()->findByAttributes(array('users_id'=>$id));
				$artistmodel=ArtistsProfile::model()->findByAttributes(array('profile_id'=>$model->id));
				$this->renderPartial('ajaxprofile',array('user'=>$user,'model'=>$model,'$artistmodel'=>$artistmodel));
			}
			public function actionAjaxlistener()
			{
				$id=Yii::app()->user->id;
				$model=Profile::model()->findByAttributes(array('users_id'=>$id));
				$this->renderPartial('listener',array('model'=>$model));
			}
			

			public function actionUpdatesongs()
			{
				$id=$_POST['id'];
				$surl=htmlspecialchars(Yii::app()->createUrl("user/playsongs"));
				$baseUrl= Yii::app()->baseUrl;
				$criteria=new CDbCriteria();
				$criteria->condition='users_playlist_id='.$id;	
				$songs=UsersPlaylistHasArtistTrack::model()->findAll($criteria);
				
				echo "<table cellspacing='2' cellpadding='2' border='0'>";
				echo "<tr><td colspan='2'>&nbsp;</td></tr>";
				echo "<tr><td colspan='2'>";
				echo '<ol class="list" >';
					foreach($songs as $al)
					{
						$slink=ArtistTrack::model()->findByPk($al->artist_track_id);
						echo "<li>";
						echo '<a href="javascript:void(0)" onclick="playsongs(';
						echo $slink->id.',&#39;'.$surl.'&#39;,&#39;'.$baseUrl.'&#39;);">'.$slink->song_name.'</a>';
						echo "</li>";
						
					
					}
				echo "</ol>";
				echo "</td></tr>";
				echo "</table>";
			}
	//chandan's code ends
}