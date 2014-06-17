<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('strings','Advance Manage')=> array('/manager/info/default/advancemanage'),
	$model->user_name,
);

$this->menu=array(
	array('label'=>Yii::t('strings','List User'), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Create User'), 'url'=>array('create')),
	array('label'=>Yii::t('strings','Update User'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('strings','Delete User'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('strings','Manage User'), 'url'=>array('admin')),
	array('label'=>Yii::t('strings','Tracking new User'), 'url'=>array('trackingUser')),
);
?>

<center><h3><?php echo Yii::t('strings','View User').' #'; echo $model->id; ?></h3></center>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name' => 'user_level_id',
			'value' => $model->getUserLevelName(),
		),
		array(
			'name' => 'is_actived',
			'value' => $model->getIsActived(),
		),
		'email',
		'password',
		'user_name',
		'contact_phone',
		'register_date',
		array(
			'name' => 'device_os_id',
			'value' => $model->getDeviceOsName(),
		),
		'device_id',
		array(
			'name' => 'notify',
			'value' => $model->getNotifyName(),
		),
		'token',
		'token_expired_date',
	),
)); ?>
