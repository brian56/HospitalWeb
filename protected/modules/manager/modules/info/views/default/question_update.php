<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Question'=>array('question'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
			array('label'=>'Create Question', 'url'=>array('questioncreate')),
			array('label'=>'View Question', 'url'=>array('questionview', 'id'=>$model->id)),
			array('label'=>'Delete Question', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Question', 'url'=>array('question')),
	);
?>

<center><h4>Update Question <?php echo $model->id; ?></h4></center>

<?php $this->renderPartial('question_form', array('model'=>$model)); ?>