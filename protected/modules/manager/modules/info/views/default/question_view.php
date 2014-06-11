<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Questions'=>array('question'),
	$model->title,
);

	$this->menu=array(
			array('label'=>'Create Question', 'url'=>array('questioncreate')),
			array('label'=>'Update Question', 'url'=>array('questionupdate', 'id'=>$model->id)),
			array('label'=>'Delete Question', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Question', 'url'=>array('question')),
	);

?>

<center><h4>View Question #<?php echo $model->id; ?></h4></center>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
				'name' => 'user_id',
				'value' => $model->getInfoUserName(),
		),
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
	echo "<center><h5>Answers</h5></center>";
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