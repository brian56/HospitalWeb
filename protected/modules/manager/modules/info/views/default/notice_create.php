<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Notice')=>array('notice'),
	Yii::t('strings','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','Manage Notice'), 'url'=>array('notice')),
);
?>

<center><h3><?php echo Yii::t('strings','Create Notice');?></h3></center>

<?php $this->renderPartial('notice_form', array('model'=>$model)); ?>