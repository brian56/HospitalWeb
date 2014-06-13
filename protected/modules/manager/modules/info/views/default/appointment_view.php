<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Appointment'=>array('appointment'),
	$model->title,
);

	$this->menu=array(
			array('label'=>'Create Appointment', 'url'=>array('appointmentcreate')),
			array('label'=>'Update Appointment', 'url'=>array('appointmentupdate', 'id'=>$model->id)),
			array('label'=>'Delete Appointment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Appointment', 'url'=>array('appointment')),
			array('label'=>'Tracking new Appointment', 'url'=>array('trackingAppointment')),
	);

?>

<center><h3>View Appointment #<?php echo $model->id; ?></h3></center>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
				'name' => 'user_id',
				'value' => $model->getInfoUserName(),
		),
		array(
				'name' => 'appointment_status',
				'value' => $model->appointmentStatusName,
		),
		'appointment_date',
		'title',
		'content',
		'date_create',
		'date_update',
		array(
				'name' => 'access_level_id',
				'value' => $model->getInfoAccessLevelName(),
		),
	),
)); 

echo "<center><h3>Response</h3></center>";
$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'gridComments',
		'dataProvider' => new CActiveDataProvider('InfoComment', array(
				'data'=>$model->infoComments,
		)),
		'columns'=>array(
				'id',
				array(
						'name' => 'user_id',
						'value' => '$data->userName',
				),
				'content',
				'date_create',
				'date_update',
				array(
						'class'=>'CButtonColumn',
				),
		),
));
?>