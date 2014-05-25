<?php
/* @var $this HospitalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hospitals',
);

$this->menu=array(
	array('label'=>'Create Hospital', 'url'=>array('create')),
	array('label'=>'Manage Hospital', 'url'=>array('admin')),
);
?>

<h1>Hospitals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
)); ?>
