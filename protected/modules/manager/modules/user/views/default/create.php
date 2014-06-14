<?php
/* @var $this UserController */
/* @var $model User */
$this->breadcrumbs=array(
		'Advance Manage'=> array('/manager/info/default/advancemanage'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
	array('label'=>'Tracking New User', 'url'=>array('trackingUser')),
);
?>

<center><h3>Create User</h3></center>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>