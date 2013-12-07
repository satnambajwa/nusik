<?php

/**
 * This is the model class for table "artists_profile".
 *
 * The followings are the available columns in table 'artists_profile':
 * @property integer $id
 * @property integer $profile_id
 * @property integer $geners_id
 * @property string $biography
 * @property string $achivement
 * @property string $fb_link
 * @property string $tw_link
 * @property string $created_date
 * @property integer $status
 * @property integer $total_comments
 * @property integer $total_likes
 * @property integer $total_songs
 * @property integer $total_share
 * @property integer $total_followers
 *
 * The followings are the available model relations:
 * @property Genres $geners
 * @property Profile $profile
 * @property Users[] $users
 * @property Follower[] $followers
 */
class ArtistsProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'artists_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profile_id, biography, achivement, created_date', 'required'),
			array('profile_id, geners_id, status, total_comments, total_likes, total_songs, total_share, total_followers', 'numerical', 'integerOnly'=>true),
			array('fb_link, tw_link', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, profile_id, geners_id, biography, achivement, fb_link, tw_link, created_date, status, total_comments, total_likes, total_songs, total_share, total_followers', 'safe', 'on'=>'search'),
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
			'geners' => array(self::BELONGS_TO, 'Genres', 'geners_id'),
			'profile' => array(self::BELONGS_TO, 'Profile', 'profile_id'),
			'users' => array(self::MANY_MANY, 'Users', 'artists_profile_has_users(artists_profile_id, users_id)'),
			'followers' => array(self::HAS_MANY, 'Follower', 'artists_profile_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'profile_id' => 'Profile',
			'geners_id' => 'Geners',
			'biography' => 'Biography',
			'achivement' => 'Achivement',
			'fb_link' => 'Fb Link',
			'tw_link' => 'Tw Link',
			'created_date' => 'Created Date',
			'status' => 'Status',
			'total_comments' => 'Total Comments',
			'total_likes' => 'Total Likes',
			'total_songs' => 'Total Songs',
			'total_share' => 'Total Share',
			'total_followers' => 'Total Followers',
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
		$criteria->compare('profile_id',$this->profile_id);
		$criteria->compare('geners_id',$this->geners_id);
		$criteria->compare('biography',$this->biography,true);
		$criteria->compare('achivement',$this->achivement,true);
		$criteria->compare('fb_link',$this->fb_link,true);
		$criteria->compare('tw_link',$this->tw_link,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('total_comments',$this->total_comments);
		$criteria->compare('total_likes',$this->total_likes);
		$criteria->compare('total_songs',$this->total_songs);
		$criteria->compare('total_share',$this->total_share);
		$criteria->compare('total_followers',$this->total_followers);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArtistsProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
