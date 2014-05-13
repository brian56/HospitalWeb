<?php
/* @var $this InfoCommentController */
/* @var $model InfoComment */

$this->breadcrumbs=array(
	'Info Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InfoComment', 'url'=>array('index')),
	array('label'=>'Create InfoComment', 'url'=>array('create')),
	array('label'=>'View InfoComment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage InfoComment', 'url'=>array('admin')),
);
?>

<h1>Update InfoComment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>