<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Advance Manage'=> array('/manager/info/default/advancemanage'),
	$model->user_name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
	array('label'=>'Tracking New User', 'url'=>array('trackingUser')),
);
?>

<center><h3>Update User <?php echo $model->id; ?></h3></center>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>