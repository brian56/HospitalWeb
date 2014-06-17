<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('strings','Advance Manage')=> array('/manager/info/default/advancemanage'),
	$model->user_name=>array('view','id'=>$model->id),
	Yii::t('strings','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','List User'), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Create User'), 'url'=>array('create')),
	array('label'=>Yii::t('strings','View User'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('strings','Manage User'), 'url'=>array('admin')),
	array('label'=>Yii::t('strings','Tracking new User'), 'url'=>array('trackingUser')),
);
?>

<center><h3><?php echo Yii::t('strings','Update User').' #';  echo $model->id; ?></h3></center>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>