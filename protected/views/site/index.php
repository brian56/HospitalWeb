<?php
/* @var $this SiteController */
if (Yii::app ()->user->getState ( 'isManager' ))
	$this->pageTitle = Yii::app ()->user->getState ( 'hospitalName' );
else 
	$this->pageTitle = Yii::app ()->name;


?>
<center>
<?php $this->widget('ext.LangPick.ELangPick', array(
	    //'excludeFromList' => array('pl', 'en'), // list of languages to exclude from list
	    'pickerType' => 'dropdown',              // buttons, links, dropdown
	    //'linksSeparator' => '<b> | </b>',   // if picker type is set to 'links'
	    'buttonsSize' => 'small',                // mini, small, large
	    'buttonsColor' => 'primary',            // primary, info, success, warning, danger, inverse
	)); ?>
	<br>	
	<br>
	<br>	
	<h2>
		<?php echo Yii::t('strings','Welcome to');?> <i>
		<?php 
			if (Yii::app()->user->getState('isManager')) {
				echo CHtml::encode(Yii::app()->user->getState('globalName'));
			}
			else {
				echo CHtml::encode(Yii::app ()->name);
			}
		?>
		</i>
	</h2>

	<h4><?php echo Yii::t('strings',"This page is for managing hospital's data.");?></h4>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<h5><?php echo Yii::t('strings','A hospital application developed by');?></h5>
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