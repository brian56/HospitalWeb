<?php
/* @var $this UserController */
/* @var $model User */
$this->breadcrumbs=array(
		Yii::t('strings','Advance Manage')=> array('/manager/info/default/advancemanage'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('strings','List User'), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Manage User'), 'url'=>array('admin')),
	array('label'=>Yii::t('strings','Tracking new User'), 'url'=>array('trackingUser')),
);
?>

<center><h3><?php echo Yii::t('strings','Create User');?></h3></center>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>