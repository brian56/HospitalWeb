<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Advance Manage'=> array('/manager/info/default/advancemanage'),
	'List Users',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
	array('label'=>'Tracking New User', 'url'=>array('trackingUser')),
);
?>

<center><h3>Users</h3></center>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		array(
			'name' => 'user_level_id',
			'value' => '$data->userLevelName',
		),
		array(
			'name' => 'is_actived',
			'value' => '$data->isActived',
		),
		array(
			'name' => 'notify',
			'value' => '$data->notifyName',
		),
		'email',
		'user_name',
		'register_date',
		/*'contact_phone',
		'password',
		'device_os_id',
		'device_id',
		'token',
		'token_expired_date',
		*/
		array(
				'class'=>'CButtonColumn',
		),
	),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
		'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>

