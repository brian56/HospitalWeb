<?php
/* @var $this InfoController */
/* @var $model Info */
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
	</div>

	<div class="row">
		<div class="span-10">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		</div>
		
		<div class="span-10">
		<?php echo $form->labelEx($model,'access_level_id'); ?>
		<?php 
			$listData = CHtml::listData(AccessLevel::model()->findAll(),'id','name');
			$t_listData = array();
			foreach($listData as $key => $item)
			{
				$t_listData[$key]=Yii::t('strings',$item);
			}
			echo $form->dropDownList($model, 'access_level_id', $t_listData,array('empty'=>Yii::t('strings','- Select access level -'))); 
		?>
		</div>
	</div>

	<div class="row">
		<div class="span-10">
		<?php echo $form->label($model,'appointment_date'); ?>
		<?php echo $form->textField($model,'appointment_date'); ?>
		</div>
	
		<div class="span-10">
		<?php echo $form->labelEx($model,'appointment_status'); ?>
		<?php echo $form->dropDownList($model,'appointment_status',array('0'=>Yii::t('strings','Pending'), '1'=>Yii::t('strings','Confirmed'), '-1'=>Yii::t('strings','Rejected')), array('empty'=>Yii::t('strings','- Select appointment status -'))); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-10">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		</div>

		<div class="span-10">
		<?php echo $form->label($model,'content'); ?>
		<?php echo $form->textField($model,'content'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-10">
		<?php echo $form->label($model,'date_create'); ?>
		<?php echo $form->textField($model,'date_create'); ?>
		</div>

		<div class="span-10">
		<?php echo $form->label($model,'date_update'); ?>
		<?php echo $form->textField($model,'date_update'); ?>
		</div>
	</div>

	<div class="row buttons">
	<?php 
		$this->widget(
				'booster.widgets.TbButton',
				array(
						'label' => Yii::t('strings','Search'),
						'context' => 'primary',
						'buttonType' => 'submit',
				)
		);?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->