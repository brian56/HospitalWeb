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
// 		Yii::t('strings','Manager')=>array("/manager"),
		Yii::t('strings','Tracking new Visitor Comment'),
);
	$this->menu=array(
			array('label'=>Yii::t('strings','Create Visitor Comment'), 'url'=>array('visitorCommentCreate')),
			array('label'=>Yii::t('strings','Manage Visitor Comment'), 'url'=>array('visitorComment')),

	);

?>
<center><h3><?php echo Yii::t('strings','Tracking new Visitor Comment');?></h3></center>
<script type="text/javascript">
    timeout = 3000;
    function refresh() {       
        <?php
        echo CHtml::ajax(array(
                'url'=> Yii::app()->baseUrl."/manager/info/default/AjaxVisitorComment",
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
	'dataProvider'=>$model->searchVisitorComment(Yii::app()->user->getState('hospitalId')),
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
		/*
		'content',
		'appointment_date',
		'date_update',
		*/
		array(
		'class'=>'CButtonColumn',
		'template'=>'{view}{update}{delete}',
		'buttons'=>array
		(
				'delete' => array
				(
						'label'=> Yii::t('strings','Delete'),
				),
				'view' => array
				(
						'label'=> Yii::t('strings','View'),
						'url'=> 'Yii::app()->createUrl("manager/info/default/visitorCommentView", array("id"=>$data->id))',
				),
				'update' => array
				(
						'label' => Yii::t('strings','Update'),
						'url'=> 'Yii::app()->createUrl("manager/info/default/visitorCommentUpdate", array("id"=>$data->id))',
				),
		),
	),
	),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
		'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('visitorCommentView').'?id="+$.fn.yiiGridView.getSelection(id);}',
)); ?>
</div>