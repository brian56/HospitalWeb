<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Notices'=>array('notice'),
	$model->title,
);

	$this->menu=array(
			array('label'=>'Create Notice', 'url'=>array('noticecreate')),
			array('label'=>'Update Notice', 'url'=>array('noticeupdate', 'id'=>$model->id)),
			array('label'=>'Delete Notice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Notice', 'url'=>array('notice')),
	);

?>

<center><h3>View Notice #<?php echo $model->id; ?></h3></center>

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
		'date_update',
		array(
				'name' => 'access_level_id',
				'value' => $model->getInfoAccessLevelName(),
		),
	),
)); 
?>