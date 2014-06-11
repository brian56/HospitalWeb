<?php
/* @var $this AccessLevelController */
/* @var $model AccessLevel */

$this->breadcrumbs=array(
	'Access Levels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccessLevel', 'url'=>array('index')),
	array('label'=>'Manage AccessLevel', 'url'=>array('admin')),
);
?>

<h1>Create AccessLevel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>