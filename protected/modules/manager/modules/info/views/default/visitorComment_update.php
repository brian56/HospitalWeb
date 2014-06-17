<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Visitor Comment')=>array('visitorComment'),
	$model->title=>array('visitorCommentView','id'=>$model->id),
	Yii::t('strings','Update'),
);

	$this->menu=array(
			array('label'=>Yii::t('strings','Create Visitor Comment'), 'url'=>array('visitorCommentCreate')),
			array('label'=>Yii::t('strings','View Visitor Comment'), 'url'=>array('visitorCommentView', 'id'=>$model->id)),
			array('label'=>Yii::t('strings','Delete Visitor Comment'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'visitorComment'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>Yii::t('strings','Manage Visitor Comment'), 'url'=>array('visitorComment')),
			array('label'=>Yii::t('strings','Tracking new Visitor Comment'), 'url'=>array('trackingVisitorComment')),
	);
?>

<center><h3><?php echo Yii::t('strings','Update Visitor Comment').' #'; echo $model->id; ?></h3></center>

<?php $this->renderPartial('visitorComment_formUpdate', array('model'=>$model)); ?>