<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Question'=>array('question'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Question', 'url'=>array('question')),
	array('label'=>'Tracking new Question', 'url'=>array('trackingQuestion')),
);
?>

<center><h4>Create Question</h4></center>

<?php $this->renderPartial('question_form', array('model'=>$model)); ?>