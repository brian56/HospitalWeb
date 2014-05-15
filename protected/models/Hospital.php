<?php

/**
 * This is the model class for table "hospital".
 *
 * The followings are the available columns in table 'hospital':
 * @property integer $id
 * @property integer $is_actived
 * @property string $name
 * @property string $name_en
 * @property string $introduction
 * @property string $photos
 * @property string $location
 *
 * The followings are the available model relations:
 * @property ChangeLog[] $changeLogs
 * @property Info[] $infos
 * @property LogEvent[] $logEvents
 * @property User[] $users
 */
class Hospital extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hospital';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_actived, name, name_en, introduction, photos, location', 'required'),
			array('is_actived', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, is_actived, name, name_en, introduction, photos, location', 'safe', 'on'=>'search'),
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
			'changeLogs' => array(self::HAS_MANY, 'ChangeLog', 'hospital_id'),
			'infos' => array(self::HAS_MANY, 'Info', 'hospital_id'),
			'logEvents' => array(self::HAS_MANY, 'LogEvent', 'hospital_id'),
			'users' => array(self::HAS_MANY, 'User', 'hospital_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'is_actived' => 'Is Actived',
			'name' => 'Name',
			'name_en' => 'Name En',
			'introduction' => 'Introduction',
			'photos' => 'Photos',
			'location' => 'Location',
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
		$criteria->compare('is_actived',$this->is_actived);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('introduction',$this->introduction,true);
		$criteria->compare('photos',$this->photos,true);
		$criteria->compare('location',$this->location,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hospital the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
