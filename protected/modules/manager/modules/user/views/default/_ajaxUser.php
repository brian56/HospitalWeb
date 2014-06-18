<?php 
$this->widget('booster.widgets.TbGridView', array(
// 	'id'=>'info-grid',
	'type'=>'bordered condensed',
	'dataProvider'=>$model->getHospitalUsers(),
	//'filter'=>$model,
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
		'device_os_id',
		'password',
		'device_id',
		'token',
		'token_expired_date',
		*/
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