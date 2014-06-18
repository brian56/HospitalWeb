<?php
/* @var $this HospitalController */
/* @var $model Hospital */

$this->breadcrumbs=array(
	 Yii::t('strings','Hospitals')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=> Yii::t('strings','List Hospital'), 'url'=>array('index')),
	array('label'=> Yii::t('strings','Create Hospital'), 'url'=>array('create')),
	array('label'=> Yii::t('strings','Update Hospital'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=> Yii::t('strings','Delete Hospital'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=> Yii::t('strings','Manage Hospital'), 'url'=>array('admin')),
);
?>

<h3><?php echo  Yii::t('strings','View Hospital').' #'; echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name' => 'is_actived',
			'value' => $model->getActivedName()
		),
		'name',
		'name_en',
		'introduction',
		'photos',
		'location',
	),
)); ?>
