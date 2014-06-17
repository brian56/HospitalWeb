<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Visitor Comment')=>array('visitorComment'),
	Yii::t('strings','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','Manage Visitor Comment'), 'url'=>array('visitorComment')),
	array('label'=>Yii::t('strings','Tracking new Visitor Comment'), 'url'=>array('trackingVisitorComment')),
);
?>

<center><h3><?php echo Yii::t('strings','Create Visitor Comment');?></h3></center>

<?php $this->renderPartial('visitorComment_form', array('model'=>$model)); ?>