<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Question')=>array('question'),
	$model->title=>array('questionView','id'=>$model->id),
	Yii::t('strings','Update'),
);

	$this->menu=array(
			array('label'=>Yii::t('strings','Create Question'), 'url'=>array('questioncreate')),
			array('label'=>Yii::t('strings','View Question'), 'url'=>array('questionview', 'id'=>$model->id)),
			array('label'=>Yii::t('strings','Delete Question'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'question'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>Yii::t('strings','Manage Question'), 'url'=>array('question')),
			array('label'=>Yii::t('strings','Tracking new Question'), 'url'=>array('trackingQuestion')),
	);
?>

<center><h3><?php echo Yii::t('strings','Update Question').' #'; echo $model->id; ?></h3></center>

<?php $this->renderPartial('question_formUpdate', array('model'=>$model)); ?>