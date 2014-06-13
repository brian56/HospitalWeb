<?php
/* @var $this SiteController */
if (Yii::app ()->user->getState ( 'isManager' ))
	$this->pageTitle = Yii::app ()->user->getState ( 'hospitalName' );
else 
	$this->pageTitle = Yii::app ()->name;


?>
<center>

	<br>	
	<br>
	<br>	
	<h2>
		Welcome to <i>
		<?php 
			if (Yii::app()->user->getState('isManager')) {
				echo CHtml::encode(Yii::app()->user->getState('hospitalName'));
			}
			else {
				echo CHtml::encode(Yii::app ()->name);
			}
		?>
		</i>
	</h2>

	<h4>This page is for managing hospital's data.</h4>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<h5>A hospital application developed by</h5>
	<?php 
	echo CHtml::image('http://appromobile.com/wp-content/uploads/2013/06/cropped-Logo.png');
// 		echo CHtml::textField('tripTotal','',array('size'=>60,'id' => 'push'));
// 		echo "<p></p>";
// 		$this->widget ( 'booster.widgets.TbButton', array (
// 				'label' => 'Push Notification to one device',
// 				'type' => 'info',
// 				'htmlOptions' => array(
//             		'onclick' => "js:$.ajax({
// 	               		url: '".Yii::app()->baseUrl."/site/push',
// 	                	type: 'POST',
// 	                	data: 'data='+$('#push').val(),
// 	                	success: function(data) {
// 							if(data!='') 
// 								alert('Successfully');
// 							else 
// 								alert('Message can not be empty!');
// 	  					},
// 	           		});"
// 	        	)
// 	    	)
// 	    );
// 		echo "<p></p>";
// 		$this->widget ( 'booster.widgets.TbButton', array (
// 				'label' => 'Push Notification to many device',
// 				'type' => 'danger',
// 				'htmlOptions' => array(
//             		'onclick' => "js:$.ajax({
// 	               		url: '".Yii::app()->baseUrl."/site/PushMultiDevice',
// 	                	type: 'POST',
// 	                	data: 'data='+$('#push').val(),
// 	                	success: function(data) {
// 							if(data!='') 
// 								alert('Successfully');
// 							else 
// 								alert('Message can not be empty!');
// 	  					},
//            			});"
//         		)
//     		)
//     	);
	?>
	
</center>