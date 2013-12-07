<?php

/**
 * This is the model class for table "sharing".
 *
 * The followings are the available columns in table 'sharing':
 * @property integer $id
 * @property integer $users_id
 * @property integer $artist_track_id
 * @property integer $status
 * @property string $date_time
 *
 * The followings are the available model relations:
 * @property Users $users
 * @property ArtistTrack $artistTrack
 */
class Sharing extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sharing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id, artist_track_id, date_time', 'required'),
			array('users_id, artist_track_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_id, artist_track_id, status, date_time', 'safe', 'on'=>'search'),
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
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'artistTrack' => array(self::BELONGS_TO, 'ArtistTrack', 'artist_track_id'),
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
			'artist_track_id' => 'Artist Track',
			'status' => 'Status',
			'date_time' => 'Date Time',
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
		$criteria->compare('artist_track_id',$this->artist_track_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_time',$this->date_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sharing the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
