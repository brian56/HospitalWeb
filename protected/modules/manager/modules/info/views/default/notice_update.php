<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Notice')=>array('notice'),
	$model->title=>array('noticeView','id'=>$model->id),
	Yii::t('strings','Update'),
);

	$this->menu=array(
			array('label'=>Yii::t('strings','Create Notice'), 'url'=>array('noticecreate')),
			array('label'=>Yii::t('strings','View Notice'), 'url'=>array('noticeview', 'id'=>$model->id)),
			array('label'=>Yii::t('strings','Delete Notice'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'notice'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>Yii::t('strings','Manage Notice'), 'url'=>array('notice')),
	);
?>

<center><h3><?php echo Yii::t('strings','Update Notice').' #'; echo $model->id; ?></h3></center>

<?php $this->renderPartial('notice_formUpdate', array('model'=>$model)); ?>