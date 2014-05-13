<?php
/* @var $this InfoTypeController */
/* @var $model InfoType */

$this->breadcrumbs=array(
	'Info Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InfoType', 'url'=>array('index')),
	array('label'=>'Create InfoType', 'url'=>array('create')),
	array('label'=>'View InfoType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage InfoType', 'url'=>array('admin')),
);
?>

<h1>Update InfoType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>