<?php
/* @var $this LogEventController */
/* @var $model LogEvent */

$this->breadcrumbs=array(
	'Log Events'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LogEvent', 'url'=>array('index')),
	array('label'=>'Create LogEvent', 'url'=>array('create')),
	array('label'=>'View LogEvent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LogEvent', 'url'=>array('admin')),
);
?>

<h1>Update LogEvent <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>