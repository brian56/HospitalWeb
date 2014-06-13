<?php
/* @var $this InfoController */
/* @var $model Info */
$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Questions'=>array('question'),
	$model->title,
);

	$this->menu=array(
			array('label'=>'Create Question', 'url'=>array('questioncreate')),
			array('label'=>'Update Question', 'url'=>array('questionupdate', 'id'=>$model->id)),
			array('label'=>'Delete Question', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Question', 'url'=>array('question')),
			array('label'=>'Tracking new Question', 'url'=>array('trackingQuestion')),
	);

?>

<center><h3>View Question #<?php echo $model->id; ?></h3></center>

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
	<h3>Create Answer for this question</h3>
	<h6><i>Fields with <span class="required">*</span> are required.</i></h6>

	<?php echo $form->errorSummary($infoComment); ?>

	<div class="row">
		<?php echo $form->hiddenField($infoComment, 'user_id', array('value'=>Yii::app()->user->getState('userId'))); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($infoComment, 'info_id', array('value'=>$model->id)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($infoComment,'content'); ?>
		<?php echo $form->textArea($infoComment,'content',array('rows'=>4, 'cols'=>100)); ?>
		<?php echo $form->error($infoComment,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($infoComment->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>



</div><!-- form -->
<center><h3>Answers</h3></center>
<?php 
//==================list cac cau tra loi cua cau hoi=================//
	$this->widget('zii.widgets.grid.CGridView', array(
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
					'class'=>'CButtonColumn',
				),
			),
	));
?>