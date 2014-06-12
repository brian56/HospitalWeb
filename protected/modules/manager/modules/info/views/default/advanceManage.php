<h3> Manage page for managing hospital's information</h3>
<?php 
		echo CHtml::link("> Manager Users",Yii::app()->baseUrl."/manager/user/default/admin",array("style"=>"color: darkblue;"));
		echo "<p></p>";
		echo CHtml::link("> Log events",Yii::app()->baseUrl."/manager/logevent/default/admin",array("style"=>"color: darkblue;"));
?>