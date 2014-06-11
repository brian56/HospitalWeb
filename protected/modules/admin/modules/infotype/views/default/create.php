<?php
/* @var $this InfoTypeController */
/* @var $model InfoType */

$this->breadcrumbs=array(
	'Info Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InfoType', 'url'=>array('index')),
	array('label'=>'Manage InfoType', 'url'=>array('admin')),
);
?>

<h1>Create InfoType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>