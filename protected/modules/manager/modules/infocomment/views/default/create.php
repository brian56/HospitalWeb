<?php
/* @var $this InfoCommentController */
/* @var $model InfoComment */

$this->breadcrumbs=array(
	'Info Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InfoComment', 'url'=>array('index')),
	array('label'=>'Manage InfoComment', 'url'=>array('admin')),
);
?>

<h1>Create InfoComment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>