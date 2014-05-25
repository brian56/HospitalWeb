<?php
/* @var $this LogEventController */
/* @var $model LogEvent */

$this->breadcrumbs=array(
	'Log Events'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LogEvent', 'url'=>array('index')),
	array('label'=>'Manage LogEvent', 'url'=>array('admin')),
);
?>

<h1>Create LogEvent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>