<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('strings','Advance Manage')=> array('/manager/info/default/advancemanage'),
	Yii::t('strings','List User'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','Create User'), 'url'=>array('create')),
	array('label'=>Yii::t('strings','Manage User'), 'url'=>array('admin')),
	array('label'=>Yii::t('strings','Tracking new User'), 'url'=>array('trackingUser')),
);
?>

<center><h3><?php echo Yii::t('strings', 'List User');?></h3></center>

<?php 
$this->widget('booster.widgets.TbGridView', array(
	'id'=>'user-grid',
	'type'=>'bordered condensed',
	'dataProvider'=>$dataProvider,
'emptyText' => Yii::t('strings','No results found'),
'summaryText' => Yii::t('strings','Displaying').' {start}-{end} '.Yii::t('strings','of').' {count} '.Yii::t('strings','result(s)'),
	'columns'=>array(
		'id',
		array(
			'name' => 'user_level_id',
			'value' => '$data->userLevelName',
		),
		array(
			'name' => 'is_actived',
			'value' => '$data->isActived',
		),
		array(
			'name' => 'notify',
			'value' => '$data->notifyName',
		),
		'email',
		'user_name',
		'register_date',
		/*'contact_phone',
		'password',
		'device_os_id',
		'device_id',
		'token',
		'token_expired_date',
		*/
		array(
'class'=>'booster.widgets.TbButtonColumn',
		'template'=>'{view}{update}{delete}',
		'buttons'=>array
		(
				'delete' => array
				(
					'label' => Yii::t('strings','Delete'),
				),
				'view' => array
				(
					'label' => Yii::t('strings','View'),
				),
				'update' => array
				(
					'label' => Yii::t('strings','Update'),
				),
			),
		),
	),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
		'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>

