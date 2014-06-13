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
		<div class="span-10">
		<?php echo $form->labelEx($model,'is_actived'); ?>
		<?php echo $form->dropDownList($model, 'is_actived', array('1'=>'Actived', '0'=>'Inactived')); ?>
		<?php echo $form->error($model,'is_actived'); ?>
		</div>
	
		<div class="span-10">
		<?php echo $form->labelEx($model,'user_level_id'); ?>
		<?php echo $form->dropDownList($model, 'user_level_id', array('1'=>'User')); ?>
		<?php echo $form->error($model,'user_level_id'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="span-10">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>
	
		<div class="span-10">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="span-10">
		<?php echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'user_name'); ?>
		</div>

		<div class="span-10">
		<?php echo $form->labelEx($model,'contact_phone'); ?>
		<?php echo $form->textField($model,'contact_phone',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'contact_phone'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-10">
		<?php echo $form->labelEx($model,'device_os_id'); ?>
		<?php echo $form->dropDownList($model, 'device_os_id', DeviceOS::getFullDeviceOS()); ?>
		<?php echo $form->error($model,'device_os_id'); ?>
		</div>
		
		<div class="span-10">
		<?php echo $form->labelEx($model,'device_id'); ?>
		<?php echo $form->textField($model,'device_id',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'device_id'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notify'); ?>
		<?php echo $form->dropDownList($model, 'notify', array('1'=>'Yes', '0'=>'No')); ?>
		<?php echo $form->error($model,'notify'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->