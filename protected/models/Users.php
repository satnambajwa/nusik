<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $display_name
 * @property integer $roles_id
 * @property string $email
 * @property string $password
 * @property string $created_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ArtistTrack[] $artistTracks
 * @property ArtistsProfile[] $artistsProfiles
 * @property Events[] $events
 * @property Follower[] $followers
 * @property Profile[] $profiles
 * @property ReportHasArtistTrack[] $reportHasArtistTracks
 * @property ReportHasComments[] $reportHasComments
 * @property ReportHasProfile[] $reportHasProfiles
 * @property Sharing[] $sharings
 * @property SongsLike[] $songsLikes
 * @property Roles $roles
 * @property UsersPlaylist[] $usersPlaylists
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('display_name, roles_id, email, password, created_date', 'required'),
			array('roles_id, status', 'numerical', 'integerOnly'=>true),
			array('display_name, email, password', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, display_name, roles_id, email, password, created_date, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'artistTracks' => array(self::HAS_MANY, 'ArtistTrack', 'users_id'),
			'artistsProfiles' => array(self::MANY_MANY, 'ArtistsProfile', 'artists_profile_has_users(users_id, artists_profile_id)'),
			'events' => array(self::HAS_MANY, 'Events', 'users_id'),
			'followers' => array(self::HAS_MANY, 'Follower', 'users_id'),
			'profiles' => array(self::HAS_MANY, 'Profile', 'users_id'),
			'reportHasArtistTracks' => array(self::HAS_MANY, 'ReportHasArtistTrack', 'users_id'),
			'reportHasComments' => array(self::HAS_MANY, 'ReportHasComments', 'users_id'),
			'reportHasProfiles' => array(self::HAS_MANY, 'ReportHasProfile', 'users_id'),
			'sharings' => array(self::HAS_MANY, 'Sharing', 'users_id'),
			'songsLikes' => array(self::HAS_MANY, 'SongsLike', 'users_id'),
			'roles' => array(self::BELONGS_TO, 'Roles', 'roles_id'),
			'usersPlaylists' => array(self::HAS_MANY, 'UsersPlaylist', 'users_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'display_name' => 'Display Name',
			'roles_id' => 'Roles',
			'email' => 'Email',
			'password' => 'Password',
			'created_date' => 'Created Date',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('roles_id',$this->roles_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
