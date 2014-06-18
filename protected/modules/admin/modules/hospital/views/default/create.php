<?php
/* @var $this HospitalController */
/* @var $model Hospital */

$this->breadcrumbs=array(
	 Yii::t('strings','Hospitals')=>array('index'),
	 Yii::t('strings','Create'),
);

$this->menu=array(
	array('label'=> Yii::t('strings','List Hospital'), 'url'=>array('index')),
	array('label'=> Yii::t('strings','Manage Hospital'), 'url'=>array('admin')),
);
?>

<h3><?php echo  Yii::t('strings','Create Hospital');?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>