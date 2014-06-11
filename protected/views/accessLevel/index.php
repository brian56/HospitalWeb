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

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
