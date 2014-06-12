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
	array('label'=>'Trackingc New User', 'url'=>array('trackingUser')),
);
?>

<center><h4>Create User</h4></center>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>