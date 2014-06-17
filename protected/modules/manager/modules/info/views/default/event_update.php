<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Event')=>array('event'),
	$model->title=>array('eventView','id'=>$model->id),
	Yii::t('strings','Update'),
);

	$this->menu=array(
			array('label'=>Yii::t('strings','Create Event'), 'url'=>array('eventcreate')),
			array('label'=>Yii::t('strings','View Event'), 'url'=>array('eventview', 'id'=>$model->id)),
			array('label'=>Yii::t('strings','Delete Event'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'event'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>Yii::t('strings','Manage Event'), 'url'=>array('event')),
	);
?>

<center><h3><?php echo Yii::t('strings','Update Event').' #'; echo $model->id; ?></h3></center>

<?php $this->renderPartial('event_formUpdate', array('model'=>$model)); ?>