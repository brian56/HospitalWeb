<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'info-grid',
	'dataProvider'=>$model->searchQuestion(Yii::app()->user->getState('hospitalId')),
	//'filter'=>$model,
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
			'class'=>'CButtonColumn',
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
							'url'=> 'Yii::app()->createUrl("manager/info/default/questionView", array("id"=>$data->id))',
					),
					'update' => array
					(
							'url'=> 'Yii::app()->createUrl("manager/info/default/questionUpdate", array("id"=>$data->id))',
					),
			),
		),
	),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
		'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('questionView').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>
		