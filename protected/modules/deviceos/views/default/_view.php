<?php
/* @var $this DeviceOsController */
/* @var $data DeviceOs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
	<?php echo CHtml::encode($data->version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('device_type')); ?>:</b>
	<?php echo CHtml::encode($data->device_type); ?>
	<br />


</div>