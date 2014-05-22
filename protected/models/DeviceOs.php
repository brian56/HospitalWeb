<?php

/**
 * This is the model class for table "device_os".
 *
 * The followings are the available columns in table 'device_os':
 * @property integer $id
 * @property string $name
 * @property string $version
 * @property string $device_type
 *
 * The followings are the available model relations:
 * @property User[] $users
 */
class DeviceOs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'device_os';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, version, device_type', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, version, device_type', 'safe', 'on'=>'search'),
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
			'users' => array(self::HAS_MANY, 'User', 'device_os_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'version' => 'Version',
			'device_type' => 'Device Type',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('device_type',$this->device_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Get the OS name and device type (phone/tablet)
	 * @return string
	 */
	public function getNameAndOs()
	{
		return $this->name.' - '.$this->device_type;
	}
	
	/**
	 * Get all the nameOS_deviceType
	 * @return list DeviceOS's nameOS_deviceType
	 */
	public static function getFullDeviceOS()
	{
		$Devices = DeviceOs::model()->findAll();
		$list    = CHtml::listData($Devices , 'id', 'nameandos');
		return $list;
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DeviceOs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
