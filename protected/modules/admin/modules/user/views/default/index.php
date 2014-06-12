<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Users</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		array(
			'name' =>'user_level_id',
			'value' => '$data->userLevel->name'
		),
		array(
			'name' =>'is_actived',
			'value' => '$data->isActived'
		),
		array(
			'name' =>'hospital_id',
			'value' => '$data->hospitalName'
		),
		'email',
		'user_name',
		'register_date',
		array(
			'name' =>'notify',
			'value' => '$data->notifyName'
		),
		/*
		'device_os_id',
		'device_id',
		'token',
		'token_expired_date',
		*/
		),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>
