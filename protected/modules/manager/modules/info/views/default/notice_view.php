<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Notice')=>array('notice'),
	$model->title,
);

	$this->menu=array(
			array('label'=>Yii::t('strings','Create Notice'), 'url'=>array('noticecreate')),
			array('label'=>Yii::t('strings','Update Notice'), 'url'=>array('noticeupdate', 'id'=>$model->id)),
			array('label'=>Yii::t('strings','Delete Notice'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'notice'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>Yii::t('strings','Manage Notice'), 'url'=>array('notice')),
	);

?>

<center><h3><?php echo Yii::t('strings','View Notice').' #'; echo $model->id; ?></h3></center>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
				'name' => 'user_id',
				'value' => $model->getInfoUserName(),
		),
		'title',
		array('name'=>'content', 'type' => 'raw'),
		'date_create',
		'date_update',
		array(
				'name' => 'access_level_id',
				'value' => $model->getInfoAccessLevelName(),
		),
	),
)); 
?>