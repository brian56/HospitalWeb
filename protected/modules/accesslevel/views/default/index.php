<?php
/* @var $this AccessLevelController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
	'Access Levels',
);

$this->menu=array(
	array('label'=>'Create AccessLevel', 'url'=>array('create')),
	array('label'=>'Manage AccessLevel', 'url'=>array('admin')),
);
?>

<h1>Access Levels</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('accesslevel/default/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}"
)); ?>
