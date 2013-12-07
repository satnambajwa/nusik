<?php

/**
 * This is the model class for table "artist_track".
 *
 * The followings are the available columns in table 'artist_track':
 * @property integer $id
 * @property integer $users_id
 * @property string $song_name
 * @property string $song_url
 * @property string $uploaded_date
 * @property string $song_discription
 * @property integer $total_likes
 * @property integer $total_comments
 * @property integer $total_shares
 * @property integer $status
 * @property string $date_time
 *
 * The followings are the available model relations:
 * @property Users $users
 * @property Comments[] $comments
 * @property ReportHasArtistTrack[] $reportHasArtistTracks
 * @property Sharing[] $sharings
 * @property SongsLike[] $songsLikes
 * @property UsersPlaylistHasArtistTrack[] $usersPlaylistHasArtistTracks
 */
class ArtistTrack extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'artist_track';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id, song_name, song_url, uploaded_date, song_discription, date_time', 'required'),
			array('users_id, total_likes, total_comments, total_shares, status', 'numerical', 'integerOnly'=>true),
			array('song_name, song_url', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_id, song_name, song_url, uploaded_date, song_discription, total_likes, total_comments, total_shares, status, date_time', 'safe', 'on'=>'search'),
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
			'comments' => array(self::MANY_MANY, 'Comments', 'artist_track_has_comments(artist_track_id, comments_id)'),
			'reportHasArtistTracks' => array(self::HAS_MANY, 'ReportHasArtistTrack', 'artist_track_id'),
			'sharings' => array(self::HAS_MANY, 'Sharing', 'artist_track_id'),
			'songsLikes' => array(self::HAS_MANY, 'SongsLike', 'artist_track_id'),
			'usersPlaylistHasArtistTracks' => array(self::HAS_MANY, 'UsersPlaylistHasArtistTrack', 'artist_track_id'),
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
			'song_name' => 'Song Name',
			'song_url' => 'Song Url',
			'uploaded_date' => 'Uploaded Date',
			'song_discription' => 'Song Discription',
			'total_likes' => 'Total Likes',
			'total_comments' => 'Total Comments',
			'total_shares' => 'Total Shares',
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
		$criteria->compare('song_name',$this->song_name,true);
		$criteria->compare('song_url',$this->song_url,true);
		$criteria->compare('uploaded_date',$this->uploaded_date,true);
		$criteria->compare('song_discription',$this->song_discription,true);
		$criteria->compare('total_likes',$this->total_likes);
		$criteria->compare('total_comments',$this->total_comments);
		$criteria->compare('total_shares',$this->total_shares);
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
	 * @return ArtistTrack the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
