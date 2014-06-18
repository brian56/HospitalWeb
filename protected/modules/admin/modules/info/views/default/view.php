<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	Yii::t('strings','Infos')=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('strings','List Info'), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Create Info'), 'url'=>array('create')),
	array('label'=>Yii::t('strings','Update Info'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('strings','Delete Info'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('strings','Manage Info'), 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('strings','View Info').' #'; echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array (
				'name' => 'info_type_id',
				'value' => $model->getInfoTypeName () 
		),
		array (
				'name' => 'user_id',
				'value' => $model->getInfoUserName()
		),
		array (
				'name' => 'hospital_id',
				'value' => $model->getInfoHospital()
		),
		'appointment_status',
		'appointment_date',
		'title',
		'content',
		'date_create',
		'date_update',
		array (
				'name' => 'access_level_id',
				'value' => $model->getInfoAccessLevelName()
		),
	),
)); ?>
