<?php
/* @var $this DeviceOsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Device Oses',
);

$this->menu=array(
	array('label'=>'Create DeviceOs', 'url'=>array('create')),
	array('label'=>'Manage DeviceOs', 'url'=>array('admin')),
);
?>

<h1>Device Oses</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
)); ?>
