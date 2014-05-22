<?php
/* @var $this InfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Infos',
);

$this->menu=array(
	array('label'=>'Create Info', 'url'=>array('create')),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>Infos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
)); ?>

