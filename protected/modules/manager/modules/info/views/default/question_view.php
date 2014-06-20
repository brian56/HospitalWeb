<?php
/* @var $this InfoController */
/* @var $model Info */
$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Question')=>array('question'),
	$model->title,
);

	$this->menu=array(
			array('label'=>Yii::t('strings','Create Question'), 'url'=>array('questioncreate')),
			array('label'=>Yii::t('strings','Update Question'), 'url'=>array('questionupdate', 'id'=>$model->id)),
			array('label'=>Yii::t('strings','Delete Question'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'question'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>Yii::t('strings','Manage Question'), 'url'=>array('question')),
			array('label'=>Yii::t('strings','Tracking new Question'), 'url'=>array('trackingQuestion')),
	);

?>

<center><h3><?php echo Yii::t('strings','View Question').' #'; echo $model->id; ?></h3></center>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
				'name' => 'user_id',
				'value' => $model->getInfoUserName(),
		),
		'title',
		'content',
		'date_create',
		'date_update',
		array(
				'name' => 'access_level_id',
				'value' => $model->getInfoAccessLevelName(),
		),
	),
)); 

?>
<?php
/* @var $this InfoCommentController */
/* @var $model InfoComment */
/* @var $form CActiveForm */
?>


<div class="form">

<?php 
//=================form cau tra loi====================//
$infoComment = new InfoComment();		//cau tra loi
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-comment-form',
	'action' => array( '/manager/info/default/answerCreate' ),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<br>
	<h3><?php echo Yii::t('strings','Create answer for this question');?></h3>
	<h6><i><?php echo Yii::t('strings','Fields with * are required');?></i></h6>

	<?php echo $form->errorSummary($infoComment); ?>

	<div class="row">
		<?php echo $form->hiddenField($infoComment, 'user_id', array('value'=>Yii::app()->user->getState('userId'))); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($infoComment, 'info_id', array('value'=>$model->id)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($infoComment,'content'); ?>
		<?php 
// 		$this->widget(
// 				'booster.widgets.TbRedactorJs',
// 				[
// 				'model' => $infoComment,
// 				'id' => 'Post_content',
// 				'attribute' => 'content',
// 				'value' => '<b>Here is the text which will be put into editor view upon opening.</b>',
// 				]
// 		); ?>
		<?php echo $form->textArea($infoComment,'content',array('rows'=>3, 'cols'=>100)); ?>
		<?php echo $form->error($infoComment,'content'); ?>
	</div>

	<div class="row buttons">
		<?php 
		$this->widget(
				'booster.widgets.TbButton',
				array(
						'label' => $infoComment->isNewRecord ? Yii::t('strings','Create') : Yii::t('strings','Save'),
						'context' => 'primary',
						'buttonType' => 'submit',
				)
		);?>
	</div>

<?php $this->endWidget(); ?>



</div><!-- form -->
<center><h3><?php  echo Yii::t('strings','Answers');?></h3></center>
<?php 
//==================list cac cau tra loi cua cau hoi=================//
$this->widget('booster.widgets.TbGridView', array(
			'type'=>'bordered condensed',
			'id' => 'gridComments',
			'dataProvider' => new CActiveDataProvider('InfoComment', array(
					'data'=>$model->infoComments,
			)),
			'columns'=>array(
				'id',
				array(
						'name' => 'user_id',
						'value' => '$data->userName',
				),
				'content',
				'date_create',
				'date_update',
				array(
					'class'=>'booster.widgets.TbButtonColumn',
					'template'=>'{view}{update}{delete}',
					'buttons'=>array
					(
							'view' => array
							(
								'label' => Yii::t('strings','View'),
									'url'=> 'Yii::app()->createUrl("manager/infocomment/default/view", array("id"=>$data->id))',
							),
							'update' => array
							(
								'label' => Yii::t('strings','Update'),
									'url'=> 'Yii::app()->createUrl("manager/infocomment/default/update", array("id"=>$data->id))',
							),
							'delete' => array
							(
								'label' => Yii::t('strings','Delete'),
									'url'=> 'Yii::app()->createUrl("manager/infocomment/default/delete", array("id"=>$data->id))',
							),
					),
				),
			),
	));
?>