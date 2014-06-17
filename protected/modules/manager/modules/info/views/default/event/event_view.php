<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Events')=>array('event'),
	$model->title,
);

	$this->menu=array(
			array('label'=>Yii::t('strings','Create Event'), 'url'=>array('eventcreate')),
			array('label'=>Yii::t('strings','Update Event'), 'url'=>array('eventupdate', 'id'=>$model->id)),
			array('label'=>Yii::t('strings','Delete Event'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'event'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>Yii::t('strings','Manage Event'), 'url'=>array('event')),
	);

?>

<center><h3><?php echo Yii::t('strings','View Event').' #'; echo $model->id; ?></h3></center>

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