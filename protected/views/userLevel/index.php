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

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
