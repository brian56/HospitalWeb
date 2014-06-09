<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Info', 'url'=>array('index')),
	array('label'=>'Create Info', 'url'=>array('create')),
);

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

<h1>Manage Infos</h1>
<script type="text/javascript">
    timeout = 1000;
    function refresh() {       
        <?php
        echo CHtml::ajax(array(
                'url'=> Yii::app()->baseUrl."/manager/info/default/AjaxIndex",
                'type'=>'post',
                'update'=> '#info-grid',
        ))
        ?>
    }
    window.setInterval("refresh()", timeout);
</script>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'info-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name' => 'info_type_id',
			'value' => '$data->infoType->name',
		),
		array(
			'name' => 'user_id',
			'value' => '$data->user->email',
		),
		array(
			'name' => 'hospital_id',
			'value' => '$data->hospital->name',
		),
		'title',
		array(
				'name' => 'access_level_id',
				'value' => '$data->accessLevel->name',
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
)); ?>
