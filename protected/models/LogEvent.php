<?php

/**
 * This is the model class for table "log_event".
 *
 * The followings are the available columns in table 'log_event':
 * @property integer $id
 * @property integer $user_id
 * @property integer $event_id
 * @property integer $hospital_id
 * @property string $date_create
 *
 * The followings are the available model relations:
 * @property Hospital $hospital
 * @property Event $event
 * @property User $user
 */
class LogEvent extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'log_event';
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
						'date_create',
						'default',
						'value' => new CDbExpression ( 'NOW()' ), // automatically add the current date in register_date
						'setOnEmpty' => false,
						'on' => 'insert' 
				),
				array (
						'hospital_id',
						'required' 
				),
				array (
						'user_id, event_id, hospital_id',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'date_create',
						'safe' 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, user_id, event_id, hospital_id, date_create',
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
				'hospital' => array (
						self::BELONGS_TO,
						'Hospital',
						'hospital_id' 
				),
				'event' => array (
						self::BELONGS_TO,
						'Event',
						'event_id' 
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
				'user_id' => 'User',
				'event_id' => 'Event',
				'hospital_id' => 'Hospital',
				'date_create' => 'Date Create' 
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
		$criteria->compare ( 'event_id', $this->event_id );
		$criteria->compare ( 'hospital_id', $this->hospital_id );
		$criteria->compare ( 'date_create', $this->date_create, true );
		
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
	 * @return LogEvent the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
