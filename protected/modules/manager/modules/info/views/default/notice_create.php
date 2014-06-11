<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Notice'=>array('notice'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Notice', 'url'=>array('notice')),
);
?>

<center><h4>Create Notice</h4></center>

<?php $this->renderPartial('notice_form', array('model'=>$model)); ?>