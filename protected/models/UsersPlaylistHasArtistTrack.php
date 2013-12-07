<?php

/**
 * This is the model class for table "users_playlist_has_artist_track".
 *
 * The followings are the available columns in table 'users_playlist_has_artist_track':
 * @property integer $id
 * @property integer $users_playlist_id
 * @property integer $artist_track_id
 * @property integer $status
 * @property string $add_datetime
 *
 * The followings are the available model relations:
 * @property ArtistTrack $artistTrack
 * @property UsersPlaylist $usersPlaylist
 */
class UsersPlaylistHasArtistTrack extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users_playlist_has_artist_track';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_playlist_id, artist_track_id, add_datetime', 'required'),
			array('users_playlist_id, artist_track_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_playlist_id, artist_track_id, status, add_datetime', 'safe', 'on'=>'search'),
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
			'artistTrack' => array(self::BELONGS_TO, 'ArtistTrack', 'artist_track_id'),
			'usersPlaylist' => array(self::BELONGS_TO, 'UsersPlaylist', 'users_playlist_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'users_playlist_id' => 'Users Playlist',
			'artist_track_id' => 'Artist Track',
			'status' => 'Status',
			'add_datetime' => 'Add Datetime',
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
		$criteria->compare('users_playlist_id',$this->users_playlist_id);
		$criteria->compare('artist_track_id',$this->artist_track_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_datetime',$this->add_datetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsersPlaylistHasArtistTrack the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
