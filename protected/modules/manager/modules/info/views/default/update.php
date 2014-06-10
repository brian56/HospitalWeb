<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Infos'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Info', 'url'=>array('index')),
	array('label'=>'Create Info', 'url'=>array('create')),
	array('label'=>'View Info', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<center><h4>Update Info <?php echo $model->id; ?></h4></center>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>