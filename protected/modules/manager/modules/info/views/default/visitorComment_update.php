<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Visitor Comment'=>array('visitorComment'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
			array('label'=>'Create Visitor Comment', 'url'=>array('visitorCommentCreate')),
			array('label'=>'View Visitor Comment', 'url'=>array('visitorCommentView', 'id'=>$model->id)),
			array('label'=>'Delete Visitor Comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Visitor Comment', 'url'=>array('visitorComment')),
			array('label'=>'Tracking New Visitor Comment', 'url'=>array('trackingVisitorComment')),
	);
?>

<center><h3>Update Visitor Comment <?php echo $model->id; ?></h3></center>

<?php $this->renderPartial('visitorComment_formUpdate', array('model'=>$model)); ?>