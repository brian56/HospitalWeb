<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Event')=>array('event'),
	Yii::t('strings','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','Manage Event'), 'url'=>array('event')),
);
?>

<center><h3><?php echo Yii::t('strings','Create Event');?></h3></center>

<?php $this->renderPartial('event_form', array('model'=>$model)); ?>