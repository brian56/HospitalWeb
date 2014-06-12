<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
	array('label'=>'Tracking User', 'url'=>array('trackingUser')),
);
?>

<h4>Create User</h4>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>