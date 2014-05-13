<?php
/* @var $this LogEventController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Log Events',
);

$this->menu=array(
	array('label'=>'Create LogEvent', 'url'=>array('create')),
	array('label'=>'Manage LogEvent', 'url'=>array('admin')),
);
?>

<h1>Log Events</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('logevent/default/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}"
)); ?>
