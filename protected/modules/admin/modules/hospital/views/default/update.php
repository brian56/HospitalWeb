<?php
/* @var $this HospitalController */
/* @var $model Hospital */

$this->breadcrumbs=array(
	 Yii::t('strings','Hospitals')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	 Yii::t('strings','Update'),
);

$this->menu=array(
	array('label'=> Yii::t('strings','List Hospital'), 'url'=>array('index')),
	array('label'=> Yii::t('strings','Create Hospital'), 'url'=>array('create')),
	array('label'=> Yii::t('strings','View Hospital'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=> Yii::t('strings','Manage Hospital'), 'url'=>array('admin')),
);
?>

<h3><?php echo  Yii::t('strings','Update Hospital').' #'; echo $model->id; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>