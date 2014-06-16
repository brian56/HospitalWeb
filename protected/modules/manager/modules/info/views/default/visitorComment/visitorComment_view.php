<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Visitor Comments'=>array('visitorComment'),
	$model->title,
);

	$this->menu=array(
			array('label'=>'Create Visitor Comment', 'url'=>array('visitorCommentCreate')),
			array('label'=>'Update Visitor Comment', 'url'=>array('visitorCommentUpdate', 'id'=>$model->id)),
			array('label'=>'Delete Visitor Comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'visitorComment'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Visitor Comment', 'url'=>array('visitorComment')),
			array('label'=>'Tracking New Visitor Comment', 'url'=>array('trackingVisitorComment')),
	);

?>

<center><h3>View Visitor Comment #<?php echo $model->id; ?></h3></center>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
				'name' => 'user_id',
				'value' => $model->getInfoUserName(),
		),
		'title',
		'content',
		'date_create',
// 		'date_update',
		array(
				'name' => 'access_level_id',
				'value' => $model->getInfoAccessLevelName(),
		),
	),
)); 
?>