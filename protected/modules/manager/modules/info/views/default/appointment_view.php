<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
// 		Yii::t('strings','Manager')=>array("/manager"),
	Yii::t('strings','Appointment')=>array('appointment'),
	$model->title,
);

	$this->menu=array(
			array('label'=>Yii::t('strings','Create Appointment'), 'url'=>array('appointmentcreate')),
			array('label'=>Yii::t('strings','Update Appointment'), 'url'=>array('appointmentupdate', 'id'=>$model->id)),
			array('label'=>Yii::t('strings','Delete Appointment'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'appointment'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>Yii::t('strings','Manage Appointment'), 'url'=>array('appointment')),
			array('label'=>Yii::t('strings','Tracking new Appointment'), 'url'=>array('trackingAppointment')),
	);

?>

<center><h3><?php echo Yii::t('strings','View Appointment').' #'; echo $model->id; ?></h3></center>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
				'name' => 'user_id',
				'value' => $model->infoUserName,
		),
		array(
				'name' => 'appointment_status',
				'value' => $model->appointmentStatusName,
		),
		'appointment_date',
		'title',
		'content',
		array(
				'label'=>Yii::t('strings','Contact Phone'),
				'type'=>'raw',
				'value'=>$model->user->contact_phone,
		),

		'date_create',
		'date_update',
		array(
				'name' => 'access_level_id',
				'value' => $model->getInfoAccessLevelName(),
		),
	),
)); 

echo "<center><h3>".Yii::t('strings','Response')."</h3></center>";
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