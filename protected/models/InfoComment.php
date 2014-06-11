<?php

/**
 * This is the model class for table "info_comment".
 *
 * The followings are the available columns in table 'info_comment':
 * @property integer $id
 * @property integer $user_id
 * @property integer $info_id
 * @property string $content
 * @property string $date_create
 * @property string $date_update
 *
 * The followings are the available model relations:
 * @property Info $info
 * @property User $user
 */
class InfoComment extends CActiveRecord {
	//add new attributes to model
	public function getUserName() {
		return $this->user->email;
	}
	
	public function getAttributes($names = true) {
		$attrs = parent::getAttributes($names);
		$attrs['userName'] = $this->getUserName();
	
		return $attrs;
	}
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'info_comment';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'user_id, info_id',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'content, date_create, date_update',
						'safe' 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, user_id, info_id, content, date_create, date_update',
						'safe',
						'on' => 'search' 
				) 
		);
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array (
				'info' => array (
						self::BELONGS_TO,
						'Info',
						'info_id' 
				),
				'user' => array (
						self::BELONGS_TO,
						'User',
						'user_id' 
				) 
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'id' => 'ID',
				'user_id' => 'Author',
				'info_id' => 'Info',
				'content' => 'Content',
				'date_create' => 'Date Create',
				'date_update' => 'Date Update' 
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
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'id', $this->id );
		$criteria->compare ( 'user_id', $this->user_id );
		$criteria->compare ( 'info_id', $this->info_id );
		$criteria->compare ( 'content', $this->content, true );
		$criteria->compare ( 'date_create', $this->date_create, true );
		$criteria->compare ( 'date_update', $this->date_update, true );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * 
	 * @param string $className
	 *        	active record class name.
	 * @return InfoComment the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->date_create= date('Y-m-d H:i:s');
		}else{
			$this->date_update = date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}
	
	public function afterSave(){
		//send notification to author only
// 		$criteria = new CDbCriteria();
// 		$criteria->select = array('device_id');
// 		$criteria->condition = 't.id=:id AND t.is_actived=1';
// 		$criteria->params = array(':id'=>$this->info->user_id);
// 		$user = User::model()->find($criteria);
		$userDeviceId = $this->info->user->device_id;
		if(!is_null($userDeviceId) && $userDeviceId!='') {
			$message = "You have new reply.";
			SendNotification::actionPushOneDevice($userDeviceId, $message, $this->content);
		}
	}
}
