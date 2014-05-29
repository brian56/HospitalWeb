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
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_level_id'); ?>
		<?php echo $form->textField($model,'user_level_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_actived'); ?>
		<?php echo $form->textField($model,'is_actived'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_phone'); ?>
		<?php echo $form->textField($model,'contact_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'register_date'); ?>
		<?php echo $form->textField($model,'register_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'device_os_id'); ?>
		<?php echo $form->textField($model,'device_os_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'device_id'); ?>
		<?php echo $form->textField($model,'device_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notify'); ?>
		<?php echo $form->textField($model,'notify'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'token'); ?>
		<?php echo $form->textField($model,'token'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'token_expired_date'); ?>
		<?php echo $form->textField($model,'token_expired_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->