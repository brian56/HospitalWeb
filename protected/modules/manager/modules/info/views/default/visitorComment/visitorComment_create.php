<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Visitor Comment'=>array('visitorComment'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Visitor Comments', 'url'=>array('visitorComment')),
	array('label'=>'Tracking New Visitor Comment', 'url'=>array('trackingVisitorComment')),
);
?>

<center><h3>Create Visitor Comment</h3></center>

<?php $this->renderPartial('\visitorComment\visitorComment_form', array('model'=>$model)); ?>