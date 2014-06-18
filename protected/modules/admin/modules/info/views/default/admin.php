<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	Yii::t('strings','Infos')=>array('index'),
	Yii::t('strings','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('strings', 'List Info'), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Create Info'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#info-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3><?php echo Yii::t('strings','Manage Info');?></h3>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link(Yii::t('strings','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$this->widget('booster.widgets.TbGridView', array(
	'id'=>'info-grid',
	'type'=>'bordered condensed',
	'emptyText' => Yii::t('strings','No results found'),
	'summaryText' => Yii::t('strings','Displaying').' {start}-{end} '.Yii::t('strings','of').' {count} '.Yii::t('strings','result(s)'),
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
				'id',
				array(
						'name' => 'info_type_id',
						'value' => '$data->infoTypeName',
				),
				array(
						'name' => 'hospital_id',
						'value' => '$data->hospital->name',
				),
				array(
						'name' => 'user_id',
						'value' => '$data->infoUserName',
				),
				'title',
				array(
						'name' => 'access_level_id',
						'value' => '$data->infoAccessLevelName',
				),
				'date_create',
		array(
		'class'=>'booster.widgets.TbButtonColumn',
		'template'=>'{view}{update}{delete}',
		'htmlOptions'=>array('style'=>'width:60px;'),
		'buttons'=>array
		(
				'delete' => array
				(
						'options' => array('style'=>'margin:2px;'),
						'label' => Yii::t('strings','Delete'),
				),
				'view' => array
				(
						'options' => array('style'=>'margin:2px;'),
						'label' => Yii::t('strings','View'),
				),
				'update' => array
				(
						'options' => array('style'=>'margin:2px;'),
						'label' => Yii::t('strings','Update'),
				),
			),
		),
	),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>
