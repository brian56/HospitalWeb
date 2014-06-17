<?php
/* @var $this InfoController */
/* @var $model Info */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($info,$user); ?>

	<div class="row">
		<div class="span-10">
		<?php echo $form->labelEx($info,'user_id'); ?>
		<?php echo $form->dropDownList($info, 'user_id', array(Yii::app()->user->getState('userId')=>Yii::app()->user->getState('userName'))); ?>
		<?php echo $form->error($info,'user_id'); ?>
		</div>
	
		<div class="span-10">
		<?php echo $form->labelEx($info,'title'); ?>
		<?php echo $form->textField($info,'title',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($info,'title'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-10">
		<?php echo $form->labelEx($info,'content'); ?>
		<?php echo $form->textArea($info,'content',array('rows'=>3, 'cols'=>57)); ?>
		<?php echo $form->error($info,'content'); ?>
		</div>
	
		<div class="span-10">
		<?php echo $form->labelEx($info,'appointment_date'); ?>
		<?php echo $form->textField($info,'appointment_date',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($info,'appointment_date'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="span-10">
		<?php echo $form->labelEx($info,'appointment_status'); ?>
		<?php echo $form->dropDownList($info,'appointment_status',array('0'=>'Pending', '1'=>'Confirmed', '-1'=>'Reject')); ?>
		<?php echo $form->error($info,'appointment_status'); ?>
		</div>

		<div class="span-10">
		<?php echo $form->labelEx($info,'access_level_id'); ?>
		<?php echo $form->dropDownList($info, 'access_level_id', CHtml::listData(AccessLevel::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($info,'access_level_id'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="span-10">
		<?php echo $form->labelEx($user,'contact_phone'); ?>
		<?php echo $form->telField($user, 'contact_phone',array('size'=>60,'maxlength'=>60)) ?>
		<?php echo $form->error($user,'contact_phone'); ?>
		</div>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($info->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->