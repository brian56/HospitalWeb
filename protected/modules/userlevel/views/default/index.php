<?php
/* @var $this UserLevelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Levels',
);

$this->menu=array(
	array('label'=>'Create UserLevel', 'url'=>array('create')),
	array('label'=>'Manage UserLevel', 'url'=>array('admin')),
);
?>

<h1>User Levels</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('userlevel/default/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}"
)); ?>