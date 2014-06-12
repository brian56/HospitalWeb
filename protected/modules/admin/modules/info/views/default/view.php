<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Infos'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Info', 'url'=>array('index')),
	array('label'=>'Create Info', 'url'=>array('create')),
	array('label'=>'Update Info', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Info', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>View Info #<?php echo $model->id; ?></h1>

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
