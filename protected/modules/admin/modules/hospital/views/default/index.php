<?php
/* @var $this HospitalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	 Yii::t('strings','Hospitals'),
);

$this->menu=array(
	array('label'=> Yii::t('strings','Create Hospital'), 'url'=>array('create')),
	array('label'=> Yii::t('strings','Manage Hospital'), 'url'=>array('admin')),
);
?>

<h3><?php echo  Yii::t('strings','Hospitals');?></h3>

<?php $this->widget('booster.widgets.TbGridView', array(
	'type'=>'bordered condensed',
	'emptyText' => Yii::t('strings','No results found'),
	'summaryText' => Yii::t('strings','Displaying').' {start}-{end} '.Yii::t('strings','of').' {count} '.Yii::t('strings','result(s)'),
	'dataProvider'=>$dataProvider,
		'columns'=>array(
				'id',
				array(
						'name' => 'is_actived',
						'value' => '$data->activedName'
				),
				'name',
				'name_en',
				'introduction',
				'photos',
		),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>
