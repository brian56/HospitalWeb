<?php
/* @var $this AccessLevelController */
/* @var $model AccessLevel */

$this->breadcrumbs=array(
	'Access Levels'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccessLevel', 'url'=>array('index')),
	array('label'=>'Create AccessLevel', 'url'=>array('create')),
	array('label'=>'View AccessLevel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccessLevel', 'url'=>array('admin')),
);
?>

<h1>Update AccessLevel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>