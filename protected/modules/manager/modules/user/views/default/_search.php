<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<div class="span-10">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		</div>

		<div class="span-10">
		<?php echo $form->label($model,'is_actived'); ?>
		<?php echo $form->dropDownList($model, 'is_actived', array('1'=>'Actived', '0'=>'Inactived'), array('empty'=>'- Select user active status -')); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-10">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		</div>
	
		<div class="span-10">
		<?php echo $form->label($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="span-10">
		<?php echo $form->label($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name'); ?>
		</div>

		<div class="span-10">
		<?php echo $form->label($model,'contact_phone'); ?>
		<?php echo $form->textField($model,'contact_phone'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-10">
		<?php echo $form->label($model,'device_os_id'); ?>
		<?php echo $form->dropDownList($model, 'device_os_id', DeviceOS::getFullDeviceOS(),array('empty'=>'- Select device OS -')); ?>
		</div>

		<div class="span-10">
		<?php echo $form->label($model,'device_id'); ?>
		<?php echo $form->textField($model,'device_id'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-10">
		<?php echo $form->label($model,'notify'); ?>
		<?php echo $form->dropDownList($model, 'notify', array('1'=>'Yes', '0'=>'No'), array('empty'=>'- Select notify status -')); ?>
		</div>
	
		<div class="span-10">
		<?php echo $form->label($model,'token'); ?>
		<?php echo $form->textField($model,'token'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->