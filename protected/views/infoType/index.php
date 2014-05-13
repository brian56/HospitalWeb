<?php
/* @var $this InfoTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Info Types',
);

$this->menu=array(
	array('label'=>'Create InfoType', 'url'=>array('create')),
	array('label'=>'Manage InfoType', 'url'=>array('admin')),
);
?>

<h1>Info Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
