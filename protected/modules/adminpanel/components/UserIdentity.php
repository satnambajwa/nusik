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
	private $id;
	public $name;
	public $role;
	public $display_name;


    public function authenticate()
    {
		 $record=Users::model()->findByAttributes(array('email'=>$this->username));


        if($record===null )
            $this->errorCode=self::ERROR_USERNAME_INVALID;
else if($this->password!==($record->password))

//else if(md5($this->password)!==$record->password)

            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {

					$this->setState('ids',$record->id);
					$this->setState('role',$record->roles->roles_name);

	    //Yii::app()->Users->setState('roles_id', $record->id);

            $this->id=$record->id;
			$this->name= $record->email;
			$this->display_name= $record->display_name;

			//$this->display_name= $record->display_name;
			//$this->date_time=$record->date_time;
          //  $this->setState('date_time', $record->date_time);
			//$this->setState('display_name', $this->name);
			
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->id;
    }
	
	
	
}