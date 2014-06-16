<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Notice'=>array('notice'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Notice', 'url'=>array('notice')),
);
?>

<center><h3>Create Notice</h3></center>

<?php $this->renderPartial('\notice\notice_form', array('model'=>$model)); ?>