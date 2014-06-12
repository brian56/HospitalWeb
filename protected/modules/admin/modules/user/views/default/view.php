<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_name,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h3>View User #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name' =>'hospital_id',
			'value' => $model->hospital->name
		),
		array(
			'name' =>'user_level_id',
			'value' => $model->userLevel->name
		),
		array(
			'name' =>'is_actived',
			'value' => $model->getIsActived()
		),
		'email',
		'password',
		'user_name',
		'contact_phone',
		'register_date',
		array(
			'name' =>'device_os_id',
			'value' => $model->deviceOs->name
		),
		'device_id',
		array(
			'name' =>'notify',
			'value' => '$data->notifyName'
		),
		'token',
		'token_expired_date',
	),
)); ?>
