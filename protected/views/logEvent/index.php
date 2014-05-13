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

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
