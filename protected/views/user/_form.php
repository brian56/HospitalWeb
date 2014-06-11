<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_level_id'); ?>
		<?php echo $form->textField($model,'user_level_id'); ?>
		<?php echo $form->error($model,'user_level_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_actived'); ?>
		<?php echo $form->textField($model,'is_actived'); ?>
		<?php echo $form->error($model,'is_actived'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_phone'); ?>
		<?php echo $form->textArea($model,'contact_phone',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'contact_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'register_date'); ?>
		<?php echo $form->textField($model,'register_date'); ?>
		<?php echo $form->error($model,'register_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'device_os_id'); ?>
		<?php echo $form->textField($model,'device_os_id'); ?>
		<?php echo $form->error($model,'device_os_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'device_id'); ?>
		<?php echo $form->textArea($model,'device_id',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'device_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'token'); ?>
		<?php echo $form->textArea($model,'token',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'token'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'token_expired_date'); ?>
		<?php echo $form->textField($model,'token_expired_date'); ?>
		<?php echo $form->error($model,'token_expired_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->