<?php
/* @var $this InfoCommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Info Comments',
);

$this->menu=array(
	array('label'=>'Create InfoComment', 'url'=>array('create')),
	array('label'=>'Manage InfoComment', 'url'=>array('admin')),
);
?>

<h1>Info Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
