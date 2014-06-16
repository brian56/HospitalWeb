<?php
/* @var $this InfoController */
/* @var $model Info */

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

<?php
/* @var $this InfoController */
/* @var $model Info */
$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
		'Appointment',
);

	$this->menu=array(
			array('label'=>'Create Appointment', 'url'=>array('appointmentCreate')),
			array('label'=>'Tracking new Appointment', 'url'=>array('trackingAppointment')),

	);

?>
<center><h3>Manage appointments</h3></center>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchAppointment',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'info-grid',
	'dataProvider'=>$model->searchAppointment(Yii::app()->user->getState('hospitalId')),
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
		'appointment_date',
		array(
				'name' => 'appointment_status',
				'value' => '$data->appointmentStatusName',
		),
		/*
		 'content',
		'date_update',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array
			(
					'view' => array
					(
							'url'=> 'Yii::app()->createUrl("manager/info/default/appointmentView", array("id"=>$data->id))',
					),
					'update' => array
					(
							'url'=> 'Yii::app()->createUrl("manager/info/default/appointmentUpdate", array("id"=>$data->id))',
					),
			),
		),
	),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('appointmentview').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>