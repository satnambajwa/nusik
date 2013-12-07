<?php
class UserController extends Controller
{
 public $layout='//layouts/column2';
	 public function actionIndex()
	 {
	 $this->renderPartial('index');
	 }

	 public function actionProfile($id)
	{
	//$id=Yii::app()->user->id;
	$user=Users::model()->findByPk($id);
	$model=Profile::model()->findByAttributes(array('users_id'=>$id));
	$artistmodel=ArtistsProfile::model()->findByAttributes(array('profile_id'=>$model->id));
	$this->render('profile',array('user'=>$user,'model'=>$model,'$artistmodel'=>$artistmodel));
	}
	public function actionAjaxprofile($id)
	{
	$user=Users::model()->findByPk($id);
	$model=Profile::model()->findByAttributes(array('users_id'=>$id));
	$artistmodel=ArtistsProfile::model()->findByAttributes(array('profile_id'=>$model->id));
	$this->renderPartial('_ajaxprofile',array('user'=>$user,'model'=>$model,'$artistmodel'=>$artistmodel));
	}
	public function actionListener()
	{
	$id=Yii::app()->user->id;
	$model=Profile::model()->findByAttributes(array('users_id'=>$id));
	$this->render('_ajaxlistener',array('model'=>$model));
	}
	public function actionAjaxlistener()
	{
	$id=Yii::app()->user->id;
	$model=Profile::model()->findByAttributes(array('users_id'=>$id));
	$this->renderPartial('listener',array('model'=>$model));
	}
	public function actionUploadsong()
	{
	$model=new ArtistTrack;
	$id=Yii::app()->user->id;
	$sname=$_POST['sname'];
	$sdescription=$_POST['sdescription'];
	$fname=$_FILES['track']['name'];
	$ext=substr($fname,strrpos($fname,'.')+1);
		if($ext != 'mp3' && $ext != 'MP3' )
		{
			echo "Only mp3 File is Supported";
		}
		else
		{
			$folder="user/".$id;
			if (!file_exists($folder)) 
			{
		        mkdir($folder);
			}
			$path=$folder."/".$fname;
			move_uploaded_file(($_FILES["track"]["tmp_name"]) ,$path);
			$model->users_id=$id;
			$model->song_name=$sname;
			$model->song_url=$path;
			$model->song_discription=$sdescription;
			date_default_timezone_set('Asia/Kolkata');
			$model->uploaded_date=date('Y-m-d H:i:s');
			$model->date_time=date('Y-m-d H:i:s');
				if($model->save())
				{
					echo "Song Uploaded Successfully !! Thanks";
				}
		}
	}
	public function actionPlaysongs()
	{
	$id=$_POST['id'];
	$song=ArtistTrack::model()->findByPk($id);
	echo htmlspecialchars($song->song_url);
	}
	public function actionLikeprofile()
	{
	echo "4";
	}
	public function actionCreateplaylist()
	{
	$pname=$_POST['pname'];
	$model=new UsersPlaylist;
	$model->users_id=Yii::app()->user->id;
	date_default_timezone_set('Asia/Kolkata');
	$model->created_date=date('Y-m-d H:i:s');
	$model->playlist_name=$pname;
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
			echo '<a href="javascript:void(0)" onclick="playsongs('.$slink->id.',&#39;'.$surl.'&#39;,&#39;'.$baseUrl.'&#39;);">'.$slink->song_name.'</a>';
			echo "</li>";
			
		
		}
	echo "</ol>";
	echo "</td></tr>";
	echo "</table>";
	}
	public function actionUpdateBasicInfo()
	{
	$id=Yii::app()->user->id;
		 if(isset($_POST["Profile"]))
			{
				$model= Profile::model()->findByAttributes(array('users_id'=>$id));	
				$model->attributes= $_POST["Profile"];
				$model->last_updated=date('Y-m-d H:i');
				if($model->save())
				  {
							if(Yii::app()->user->role==2)
							$this->redirect(Yii::app()->createUrl('user/listener'));
							else
							$this->redirect(Yii::app()->createUrl('user/profile'));
						
				  }
		    }
	}
	public function actionUpdatePhoto()
	{
		$id=Yii::app()->user->id;
			if(isset( $_FILES["image"]))
			{
				$model= Profile::model()->findByAttributes(array('users_id'=>$id));	
				
				$model->last_updated=date('Y-m-d H:i');
				$userfile_extn = substr(strtolower($_FILES['image']['name']),strrpos(strtolower($_FILES['image']['name']),'.')+1);
				$newNamw	=	time().'.'.$userfile_extn;
				$fileTmpLoc = $_FILES["image"]["tmp_name"];
				$folder="user/".$id;
				if (!file_exists($folder)) 
				{
				mkdir($folder);
				}
				$pathAndName = $folder."/".$newNamw;
				$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
				$model->image=$pathAndName;
				if($model->save())
				{ 
							if(Yii::app()->user->role==2)
							$this->redirect(Yii::app()->createUrl('user/listener',array('id'=>$id)));
							else
							$this->redirect(Yii::app()->createUrl('user/profile',array('id'=>$id)));
				}
			}
	}
	public function actionUpdateCover()
	{
		
			$id=Yii::app()->user->id;
			if(isset( $_FILES["image"]))
			{
				$model= Profile::model()->findByAttributes(array('users_id'=>$id));	
				
				$model->last_updated=date('Y-m-d H:i');
				$userfile_extn = substr(strtolower($_FILES['image']['name']),strrpos(strtolower($_FILES['image']['name']),'.')+1);
				$newNamw	=	time().'.'.$userfile_extn;
				$fileTmpLoc = $_FILES["image"]["tmp_name"];
				$pathAndName = "images/cover/".$newNamw;
				$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
				$model->cover_photo	=	"cover/".$newNamw;
				if($model->save())
				{ 
					if(Yii::app()->user->role==2)
					$this->redirect(Yii::app()->createUrl('user/listener'));
					else
					$this->redirect(Yii::app()->createUrl('user/profile'));	
				}
			}
	}
	public function actionChangePass()
	{
		$id=Yii::app()->user->id;
		$user=Users::model()->findByPk($id);
		$result=array();
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
	public function actionBioInfo()
	{
		 
		 if(isset($_POST["ArtistsProfile"]))
			{
			$id=Yii::app()->user->id;
				$model= Profile::model()->findByAttributes(array('users_id'=>$id));
				
				$pmodel= ArtistsProfile::model()->findByAttributes(array('profile_id'=>$model->id));	
				$pmodel->attributes=$_POST["ArtistsProfile"];
				if($pmodel->save())
				  {
					$this->redirect(Yii::app()->createUrl('user/profile'));				  
				 }
			}
	}
	public function actionLogout()
	{
		Yii::app()->user->logout();
			$this->redirect(array('adminpanel/siteadmin/index'));
	}

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
	
}