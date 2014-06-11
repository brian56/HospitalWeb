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

<h4>Log Events</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
)); ?>
