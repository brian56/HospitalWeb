<?php
/* @var $this ChangeLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Change Logs',
);

$this->menu=array(
	array('label'=>'Create ChangeLog', 'url'=>array('create')),
	array('label'=>'Manage ChangeLog', 'url'=>array('admin')),
);
?>

<h1>Change Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
)); ?>
