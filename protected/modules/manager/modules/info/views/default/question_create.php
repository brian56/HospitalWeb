<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Question'=>array('question'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Question', 'url'=>array('question')),
);
?>

<center><h4>Create Question</h4></center>

<?php $this->renderPartial('question_form', array('model'=>$model)); ?>