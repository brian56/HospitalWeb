<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	Yii::t('strings','Infos')=>array('index'),
	Yii::t('strings','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','List Info'), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Manage Info'), 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('strings','Create Info');?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>