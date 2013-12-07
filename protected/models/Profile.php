<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property integer $id
 * @property integer $users_id
 * @property integer $countries_id
 * @property integer $cities_id
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $date_of_birth
 * @property integer $zip_code
 * @property string $last_updated
 * @property string $image
 * @property string $contact_no
 * @property integer $status
 * @property string $date_time
 * @property string $cover_photo
 *
 * The followings are the available model relations:
 * @property ArtistsProfile[] $artistsProfiles
 * @property Users $users
 * @property Countries $countries
 * @property Cities $cities
 * @property ProfileHasComments[] $profileHasComments
 * @property ReportHasProfile[] $reportHasProfiles
 * @property Sharing[] $sharings
 */
class Profile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
		public $imagePath = 'profile/';
		public $imagePathThumb = 'profile/thumb/';
		
			public function tableName()
			{
				return 'profile';
			}
			protected function beforeSave() 
			{
			  if ($this->image instanceof CUploadedFile) {
				  $this->image = md5($this->image->getName()) . "." . $this->image->getExtensionName();
			  }
			  return parent::beforeSave();
			}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id, first_name, gender, date_of_birth, date_time', 'required'),
			array('users_id, countries_id, cities_id, zip_code, status', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, cover_photo', 'length', 'max'=>45),
			array('gender', 'length', 'max'=>7),
			array('image', 'length', 'max'=>50),
			array('contact_no', 'length', 'max'=>20),
			array('last_updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_id, countries_id, cities_id, first_name, last_name, gender, date_of_birth, zip_code, last_updated, image, contact_no, status, date_time, cover_photo', 'safe', 'on'=>'search'),
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
			'artistsProfiles' => array(self::HAS_MANY, 'ArtistsProfile', 'profile_id'),
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'countries' => array(self::BELONGS_TO, 'Countries', 'countries_id'),
			'cities' => array(self::BELONGS_TO, 'Cities', 'cities_id'),
			'profileHasComments' => array(self::HAS_MANY, 'ProfileHasComments', 'profile_id'),
			'reportHasProfiles' => array(self::HAS_MANY, 'ReportHasProfile', 'profile_id'),
			'sharings' => array(self::HAS_MANY, 'Sharing', 'profile_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'users_id' => 'Users',
			'countries_id' => 'Countries',
			'cities_id' => 'Cities',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'gender' => 'Gender',
			'date_of_birth' => 'Date Of Birth',
			'zip_code' => 'Zip Code',
			'last_updated' => 'Last Updated',
			'image' => 'Image',
			'contact_no' => 'Contact No',
			'status' => 'Status',
			'date_time' => 'Date Time',
			'cover_photo' => 'Cover Photo',
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
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('countries_id',$this->countries_id);
		$criteria->compare('cities_id',$this->cities_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('zip_code',$this->zip_code);
		$criteria->compare('last_updated',$this->last_updated,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('contact_no',$this->contact_no,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_time',$this->date_time,true);
		$criteria->compare('cover_photo',$this->cover_photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
