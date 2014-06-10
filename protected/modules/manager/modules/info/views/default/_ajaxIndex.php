<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'info-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name' => 'info_type_id',
			'value' => '$data->infoTypeName',
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
		/*
		'content',
		'appointment_date',
		'date_create',
		'date_update',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
)); ?>