<?php 
$this->widget('booster.widgets.TbGridView', array(
// 	'id'=>'info-grid',
	'type'=>'bordered condensed',
	'dataProvider'=>$model->searchVisitorComment(Yii::app()->user->getState('globalId')),
	//'filter'=>$model,
	'emptyText' => Yii::t('strings','No results found'),
	'summaryText' => Yii::t('strings','Displaying').' {start}-{end} '.Yii::t('strings','of').' {count} '.Yii::t('strings','result(s)'),
	'columns'=>array(
		'id',
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
		/*
		'content',
		'appointment_date',
		'date_update',
		*/
		array(
		'class'=>'booster.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'width:60px;'),
			'template'=>'{view}{update}{delete}',
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
							'url'=> 'Yii::app()->createUrl("manager/info/default/visitorCommentView", array("id"=>$data->id))',
					),
					'update' => array
					(
						'options' => array('style'=>'margin:2px;'),
							'label' => Yii::t('strings','Update'),
							'url'=> 'Yii::app()->createUrl("manager/info/default/visitorCommentUpdate", array("id"=>$data->id))',
					),
			),
		),
	),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
		'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('visitorCommentView').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>
		