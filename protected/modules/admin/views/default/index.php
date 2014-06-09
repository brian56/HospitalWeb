<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h3> Admin page for managing system</h3>
<?php 
		echo CHtml::link("Manager infos",Yii::app()->baseUrl."/admin/info",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("Manager users",Yii::app()->baseUrl."/admin/user",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("Manager info comments",Yii::app()->baseUrl."/admin/infocomment",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("Manager hospitals",Yii::app()->baseUrl."/admin/hospital",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("Manager info type",Yii::app()->baseUrl."/admin/infotype",array("style"=>"color: darkblue;"));
?>