<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - '.Yii::t('strings','Login');
$this->breadcrumbs=array(
	Yii::t('strings','Login'),
);
$this->widget('ext.LangPick.ELangPick', array(
	    //'excludeFromList' => array('pl', 'en'), // list of languages to exclude from list
	    'pickerType' => 'dropdown',              // buttons, links, dropdown
	    //'linksSeparator' => '<b> | </b>',   // if picker type is set to 'links'
	    'buttonsSize' => 'small',                // mini, small, large
	    'buttonsColor' => 'primary',            // primary, info, success, warning, danger, inverse
	)); ?>
<h3><?php echo Yii::t('strings','Login');?></h3>

<p><?php echo Yii::t('strings','Please fill out the following form with your login credentials:');?></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo Yii::t('strings','Fields with * are required');?></p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php 
		$this->widget(
				'booster.widgets.TbButton',
				array(
						'label' => Yii::t('strings','Login'),
						'context' => 'primary',
						'buttonType' => 'submit',
				)
		);?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
