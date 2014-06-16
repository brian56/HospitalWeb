<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
		'Manager'=>array("/manager"),
	'Notice'=>array('notice'),
	$model->title=>array('noticeView','id'=>$model->id),
	'Update',
);

	$this->menu=array(
			array('label'=>'Create Notice', 'url'=>array('noticecreate')),
			array('label'=>'View Notice', 'url'=>array('noticeview', 'id'=>$model->id)),
			array('label'=>'Delete Notice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'params' => array('returnUrl'=>'notice'),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage Notice', 'url'=>array('notice')),
	);
?>

<center><h3>Update Notice <?php echo $model->id; ?></h3></center>

<?php $this->renderPartial('\notice\notice_formUpdate', array('model'=>$model)); ?>