<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	/*public function authenticate()
	{
	$login=Users::model()->findByAttributes(array('email'=>$this->username));
	   if(!$login)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($login->password!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
		$this->setState('id',$login->id);
		$this->setState('dname', $login->display_name);
 
			$this->errorCode=self::ERROR_NONE;
			 
		
		}
		return !$this->errorCode;
				 
 	       
	}*/
	private $id;
	public $username;
	public $email;
	public $role;
	public function authenticate()
	{
		$record=Users::model()->findByAttributes(array('email'=>$this->username));
	 	if($record==null)
		{
		$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else if($record->password!=$this->password)
		{
		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else
		{
		$this->email=$record->email;
		$this->role= $record->roles_id;
		$this->setState('dname',$record->display_name);		
		$this->setState('role', $record->roles_id);
		$this->setState('id', $record->id);
		if($profile=Profile::model()->findByAttributes(array('users_id'=>$record->id)))
		$this->setState('cover',$profile->cover_photo);
		$this->errorCode=self::ERROR_NONE;
		
		}
	 return !$this->errorCode;
	}
	
}