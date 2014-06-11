<?php
/* @var $this InfoCommentController */
/* @var $model InfoComment */

$this->breadcrumbs=array(
	'Info Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List InfoComment', 'url'=>array('index')),
	array('label'=>'Create InfoComment', 'url'=>array('create')),
	array('label'=>'Update InfoComment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InfoComment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InfoComment', 'url'=>array('admin')),
);
?>

<h1>View InfoComment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'info_id',
		'content',
		'date_create',
		'date_update',
	),
)); ?>
