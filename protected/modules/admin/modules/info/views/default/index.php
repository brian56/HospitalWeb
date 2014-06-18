<?php
/* @var $this InfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('strings','Infos'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','Create Info'), 'url'=>array('create')),
	array('label'=>Yii::t('strings','Manage Info'), 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('strings','Info');?></h3>

<?php $this->widget('booster.widgets.TbGridView', array(
	'type'=>'bordered condensed',
	'emptyText' => Yii::t('strings','No results found'),
	'summaryText' => Yii::t('strings','Displaying').' {start}-{end} '.Yii::t('strings','of').' {count} '.Yii::t('strings','result(s)'),
	'dataProvider'=>$dataProvider,
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
		),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>
