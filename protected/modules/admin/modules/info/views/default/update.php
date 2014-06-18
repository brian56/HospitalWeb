<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	Yii::t('strings','Infos')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('strings','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','List Info'), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Create Info'), 'url'=>array('create')),
	array('label'=>Yii::t('strings','View Info'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('strings','Manage Info'), 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('strings','Update Info').' #'; echo $model->id; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>