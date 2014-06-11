<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h3> Manage page for managing hospital's information</h3>
<?php 
		echo CHtml::link("- Manager questions",Yii::app()->baseUrl."/manager/info/default/question",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("- Manager events",Yii::app()->baseUrl."/manager/info/default/event",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("- Manager notices",Yii::app()->baseUrl."/manager/info/default/notice",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("- Manager appointment",Yii::app()->baseUrl."/manager/info/default/appointment",array("style"=>"color: darkblue;"));
		echo "<p></p>";
// 		echo CHtml::link("- Manager infos",Yii::app()->baseUrl."/manager/info/default/admin",array("style"=>"color: darkblue;"));
// 		echo "<p></p>";
		echo CHtml::link("- Manager users",Yii::app()->baseUrl."/manager/user/default/admin",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("- Log events",Yii::app()->baseUrl."/manager/logevent/default/admin",array("style"=>"color: darkblue;"));
?>