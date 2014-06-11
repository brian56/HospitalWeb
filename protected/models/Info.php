<?php

/**
 * This is the model class for table "info".
 *
 * The followings are the available columns in table 'info':
 * @property integer $id
 * @property integer $info_type_id
 * @property integer $user_id
 * @property integer $hospital_id
 * @property integer $appointment_status
 * @property string $title
 * @property string $content
 * @property string $appointment_date
 * @property string $date_create
 * @property string $date_update
 * @property integer $access_level_id
 *
 * The followings are the available model relations:
 * @property AccessLevel $accessLevel
 * @property Hospital $hospital
 * @property InfoType $infoType
 * @property User $user
 * @property InfoComment[] $infoComments
 */
class Info extends CActiveRecord {
	//add new attributes to model
	public function getInfoUserName() {
		return $this->user->email;
	}
	public function getInfoTypeName() {
		return $this->infoType->name;
	}
	public function getInfoCommentsCount() {
		return count($this->infoComments);
	}
	public function getInfoAccessLevelName() {
		return $this->accessLevel->name;
	}
	
	public function getAttributes($names = true) {
		$attrs = parent::getAttributes($names);
		$attrs['infoUserName'] = $this->getInfoUserName();
		$attrs['infoTypeName'] = $this->getInfoTypeName();
		$attrs['infoCommentsCount'] = $this->getInfoCommentsCount();
		$attrs['infoAccessLevelName'] = $this->getInfoAccessLevelName();
	
		return $attrs;
	}
	
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'info';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				/* array (
						'hospital_id',
						'required' 
				), */
				array (
						'info_type_id, user_id, hospital_id, appointment_status, access_level_id',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'title, content, date_create, date_update, userName',
						'safe' 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, info_type_id, user_id, hospital_id, appointment_status, title, content, appointment_date, date_create, date_update, access_level_id',
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
				'accessLevel' => array (
						self::BELONGS_TO,
						'AccessLevel',
						'access_level_id' 
				),
				'hospital' => array (
						self::BELONGS_TO,
						'Hospital',
						'hospital_id' 
				),
				'infoType' => array (
						self::BELONGS_TO,
						'InfoType',
						'info_type_id' 
				),
				'user' => array (
						self::BELONGS_TO,
						'User',
						'user_id' 
				),
				'infoComments' => array (
						self::HAS_MANY,
						'InfoComment',
						'info_id' 
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
				'info_type_id' => 'Info Type',
				'user_id' => 'Author',
				'hospital_id' => 'Hospital',
				'appointment_status' => 'Appointment Status',
				'title' => 'Title',
				'content' => 'Content',
				'appointment_date' => 'Appointment Date',
				'date_create' => 'Date Create',
				'date_update' => 'Date Update',
				'access_level_id' => 'Access Level' 
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
		$criteria->compare ( 'info_type_id', $this->info_type_id );
		$criteria->compare ( 'user_id', $this->user_id );
		$criteria->compare ( 'hospital_id', $this->hospital_id );
		$criteria->compare ( 'appointment_status', $this->appointment_status );
		$criteria->compare ( 'title', $this->title, true );
		$criteria->compare ( 'content', $this->content, true );
		$criteria->compare ( 'appointment_date', $this->appointment_date, true );
		$criteria->compare ( 'date_create', $this->date_create, true );
		$criteria->compare ( 'date_update', $this->date_update, true );
		$criteria->compare ( 'access_level_id', $this->access_level_id );
		$criteria->order = 'date_create DESC';
		$criteria->with = array('hospital', 'user', 'infoType', 'accessLevel', 'infoComments');
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	
	public function searchQuestion() {
		$criteria =new CDbCriteria();
		$criteria->order = 'date_create DESC';
		$criteria->condition = 't.info_type_id=:info_type_id';
		$criteria->params = array(':info_type_id'=>3);
		$criteria->with = array('hospital', 'user', 'infoType', 'accessLevel', 'infoComments');
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
	 * @return Info the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->date_create= date('Y-m-d H:i:s');
			if(Yii::app()->user->getState('isManager')) {
				$this->hospital_id = Yii::app()->user->getState('hospitalId');
			}
		}else{
			$this->date_update = date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}
	
	public function afterSave(){
		//send notification to all user in hospital
		if($this->infoType->name_en!='Question' && $this->accessLevel->name_en!='Admin only') {
			$users = User::model()->getHospitalUserDeviceIds($this->hospital_id);
			if(!is_null($users)) {
				$userDeviceIds = array();
				foreach ($users as $user) {
					if(!is_null($user->device_id) && $user->device_id!='')
						$userDeviceIds[] = $user->device_id;
				}
				SendNotification::actionPushMultiDevice($userDeviceIds, $this->title, $this->content, $this->info_type_id, $this->id);
			}
		}
	}
}
