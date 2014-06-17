<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Question')=>array('question'),
	Yii::t('strings','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','Manage Question'), 'url'=>array('question')),
	array('label'=>Yii::t('strings','Tracking new Question'), 'url'=>array('trackingQuestion')),
);
?>

<center><h3><?php echo Yii::t('strings','Create Question');?></h3></center>

<?php $this->renderPartial('question_form', array('model'=>$model)); ?>