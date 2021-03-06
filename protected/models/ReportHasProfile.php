<?php

/**
 * This is the model class for table "report_has_profile".
 *
 * The followings are the available columns in table 'report_has_profile':
 * @property integer $id
 * @property integer $report_id
 * @property integer $artists_profile_id
 * @property integer $users_id
 * @property string $comment
 * @property string $add_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ArtistsProfile $artistsProfile
 * @property Report $report
 * @property Users $users
 */
class ReportHasProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'report_has_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('report_id, artists_profile_id, users_id', 'required'),
			array('report_id, artists_profile_id, users_id, status', 'numerical', 'integerOnly'=>true),
			array('comment, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, report_id, artists_profile_id, users_id, comment, add_date, status', 'safe', 'on'=>'search'),
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
			'artistsProfile' => array(self::BELONGS_TO, 'ArtistsProfile', 'artists_profile_id'),
			'report' => array(self::BELONGS_TO, 'Report', 'report_id'),
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'report_id' => 'Report',
			'artists_profile_id' => 'Artists Profile',
			'users_id' => 'Users',
			'comment' => 'Comment',
			'add_date' => 'Add Date',
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
		$criteria->compare('report_id',$this->report_id);
		$criteria->compare('artists_profile_id',$this->artists_profile_id);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReportHasProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
