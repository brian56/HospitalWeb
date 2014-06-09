<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>

<h3> Manage page for managing hospital's information</h3>
<?php 
		echo CHtml::link("Manager infos",Yii::app()->baseUrl."/manager/info",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("Manager users",Yii::app()->baseUrl."/manager/user",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("Log events",Yii::app()->baseUrl."/manager/logevent",array("style"=>"color: darkblue;"));
?>