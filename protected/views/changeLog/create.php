<?php
/* @var $this ChangeLogController */
/* @var $model ChangeLog */

$this->breadcrumbs=array(
	'Change Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ChangeLog', 'url'=>array('index')),
	array('label'=>'Manage ChangeLog', 'url'=>array('admin')),
);
?>

<h1>Create ChangeLog</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>