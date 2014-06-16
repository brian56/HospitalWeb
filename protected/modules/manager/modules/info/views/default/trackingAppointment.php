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
		'Tracking Appointment',
);
	$this->menu=array(
			array('label'=>'Create Appointment', 'url'=>array('appointmentCreate')),
			array('label'=>'Manage Appointments', 'url'=>array('appointment')),

	);

?>
<center><h3>Tracking new appointments</h3></center>
<script type="text/javascript">
    timeout = 3000;
    function refresh() {       
        <?php
        echo CHtml::ajax(array(
                'url'=> Yii::app()->baseUrl."/manager/info/default/AjaxAppointment",
                'type'=>'post',
                'update'=> '#info-grid',
        ))
        ?>
    }
    window.setInterval("refresh()", timeout);
</script>

<div id='info-grid'>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'info-grid',
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
</div>