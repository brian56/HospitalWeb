<?php
/* @var $this UserLevelController */
/* @var $model UserLevel */

$this->breadcrumbs=array(
	'User Levels'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserLevel', 'url'=>array('index')),
	array('label'=>'Create UserLevel', 'url'=>array('create')),
	array('label'=>'View UserLevel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserLevel', 'url'=>array('admin')),
);
?>

<h1>Update UserLevel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>