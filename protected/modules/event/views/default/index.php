<?php
/* @var $this EventController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Events',
);

$this->menu=array(
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
?>

<h1>Events</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('event/default/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}"
)); ?>
