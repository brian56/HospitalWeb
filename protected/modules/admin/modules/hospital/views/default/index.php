<?php
/* @var $this HospitalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hospitals',
);

$this->menu=array(
	array('label'=>'Create Hospital', 'url'=>array('create')),
	array('label'=>'Manage Hospital', 'url'=>array('admin')),
);
?>

<h3>Hospitals</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
		'columns'=>array(
				'id',
				array(
						'name' => 'is_actived',
						'value' => '$data->activedName'
				),
				'name',
				'name_en',
				'introduction',
				'photos',
		),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>
