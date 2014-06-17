<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-6 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>Yii::t('strings','Operations'),
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<div class="span-22">
	<div id="content">
	<?php $this->widget('ext.LangPick.ELangPick', array(
	    //'excludeFromList' => array('pl', 'en'), // list of languages to exclude from list
	    'pickerType' => 'dropdown',              // buttons, links, dropdown
	    //'linksSeparator' => '<b> | </b>',   // if picker type is set to 'links'
	    'buttonsSize' => 'small',                // mini, small, large
	    'buttonsColor' => 'primary',            // primary, info, success, warning, danger, inverse
	)); ?>
		<?php echo $content; ?>
	</div><!-- content -->
</div>

<?php $this->endContent(); ?>