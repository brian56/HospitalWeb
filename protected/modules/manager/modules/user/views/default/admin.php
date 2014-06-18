<?php
/* @var $this UserController */
/* @var $model User */

	
$this->breadcrumbs=array(
	Yii::t('strings','Advance Manage')=> array('/manager/info/default/advancemanage'),
	Yii::t('strings','Manage User'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','List User'), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Create User'), 'url'=>array('create')),
	array('label'=>Yii::t('strings','Tracking new User'), 'url'=>array('trackingUser')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<center><h3><?php echo Yii::t('strings','Manage User');?></h3></center>

<p>
<?php 
echo Yii::t('strings', 'You may optionally enter a comparison operator (<, <=, >, >=, <> or =) at the beginning of each of your search values to specify how the comparison should be done.');
?>
</p>

<?php echo CHtml::link(Yii::t('strings','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php 
$this->widget('booster.widgets.TbGridView', array(
	'id'=>'user-grid',
	'type'=>'bordered condensed',
	'dataProvider'=>$model->getHospitalUsers(),
	//'filter'=>$model,
'emptyText' => Yii::t('strings','No results found'),
'summaryText' => Yii::t('strings','Displaying').' {start}-{end} '.Yii::t('strings','of').' {count} '.Yii::t('strings','result(s)'),
	'columns'=>array(
		'id',
		array(
			'name' => 'user_level_id',
			'value' => '$data->userLevelName',
		),
		array(
			'name' => 'is_actived',
			'value' => '$data->isActived',
		),
		array(
			'name' => 'notify',
			'value' => '$data->notifyName',
		),
		'email',
		'user_name',
		'register_date',
		/*'contact_phone',
		'device_os_id',
		'password',
		'device_id',
		'token',
		'token_expired_date',
		*/
		array(
		'class'=>'booster.widgets.TbButtonColumn',
		'template'=>'{view}{update}{delete}',
		'htmlOptions'=>array('style'=>'width:60px;'),
		'buttons'=>array
		(
				'delete' => array
				(
					'options' => array('style'=>'margin:2px;'),
					'label' => Yii::t('strings','Delete'),
				),
				'view' => array
				(
						'options' => array('style'=>'margin:2px;'),
					'label' => Yii::t('strings','View'),
				),
				'update' => array
				(
						'options' => array('style'=>'margin:2px;'),
					'label' => Yii::t('strings','Update'),
				),
			),
		),
	),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
		'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); 
?>

