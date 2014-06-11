<?php
/* @var $this ChangeLogController */
/* @var $model ChangeLog */

$this->breadcrumbs=array(
	'Change Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ChangeLog', 'url'=>array('index')),
	array('label'=>'Create ChangeLog', 'url'=>array('create')),
	array('label'=>'View ChangeLog', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ChangeLog', 'url'=>array('admin')),
);
?>

<h1>Update ChangeLog <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>