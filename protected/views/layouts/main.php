<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<center>
	<div id="header">
		<div id="logo">
		<b>
		<?php 
		if(Yii::app()->user->getState('isManager')) {
			//echo CHtml::encode(Yii::app()->name); 
			echo Yii::app()->user->getState('hospitalName', '');
		} else {
			echo Yii::app()->name;
		}
		?>
		</b>
		</div>
	</div><!-- header -->
	</center>
	<div id="eflat-menu">

	<?php 
	
	function startsWith($haystack, $needle)
	{
		$length = strlen($needle);
		return (substr($haystack, 0, $length) === $needle);
	}
	function endsWith($haystack, $needle)
	{
		$length = strlen($needle);
		if ($length == 0) {
			return true;
		}
	
		return (substr($haystack, -$length) === $needle);
	}
	function checkController($controller, $name) {
		$controller = strtolower($controller);
		$name = strtolower($name);
		if(startsWith($controller, $name)||endsWith($controller, $name)){
			return true;
		} else 
			return false;
	}
	
	$activedNoticeItem = false;
	if(isset(Yii::app()->controller->id) && checkController(Yii::app()->controller->action->id,'notice')) {
		$activedNoticeItem = true;
	}
	$activedEventItem = false;
	if(isset(Yii::app()->controller->id) && checkController(Yii::app()->controller->action->id,'event')) {
		$activedEventItem = true;
	}
	$activedQuestionItem = false;
	if(isset(Yii::app()->controller->id) && checkController(Yii::app()->controller->action->id,'question')) {
		$activedQuestionItem = true;
	}
	$activedAppointmentItem = false;
	if(isset(Yii::app()->controller->id) && checkController(Yii::app()->controller->action->id,'appointment')) {
		$activedAppointmentItem = true;
	}
	$activedVisitorCommentItem = false;
	if(isset(Yii::app()->controller->id) && checkController(Yii::app()->controller->action->id,'visitorcomment')) {
		$activedVisitorCommentItem = true;
	}
	$activedAdvanceManageItem = false;
	if(isset(Yii::app()->controller->module)) {
		if(endsWith(Yii::app()->controller->module->id,'user'))
			$activedAdvanceManageItem = true;
		if(endsWith(Yii::app()->controller->module->id,'logevent'))
			$activedAdvanceManageItem = true;
		if(Yii::app()->controller->action->id=='advancemanage')
			$activedAdvanceManageItem = true;
	}
	
	$activedAdminInfos = false;
	if(isset(Yii::app()->controller->module) && checkController(Yii::app()->controller->module->id,'info')) {
		$activedAdminInfos = true;
	}
	$activedAdminHospitals = false;
	if(isset(Yii::app()->controller->module) && checkController(Yii::app()->controller->module->id,'hospital')) {
		$activedAdminHospitals = true;
	}
	$activedAdminUsers = false;
	if(isset(Yii::app()->controller->module) && checkController(Yii::app()->controller->module->id,'user')) {
		$activedAdminUsers = true;
	}
	$activedAdminLogEvents = false;
	if(isset(Yii::app()->controller->module) && checkController(Yii::app()->controller->module->id,'logevent')) {
		$activedAdminLogEvents = true;
	}
	
// 	if(isset(Yii::app()->controller->module->id) && (Yii::app()->controller->module->id=='manager')) {
// 		$activedManagerItem = true;
// 	}
// 	if(isset(Yii::app()->controller->module->parentModule->id) && (Yii::app()->controller->module->parentModule->id=='manager')) {
// 		$activedManagerItem = true;
// 	}
// 	$activedAdminItem = false;
// 	if(isset(Yii::app()->controller->module->id) && (Yii::app()->controller->module->id=='admin')) {
// 		$activedAdminItem = true;
// 	}
// 	if(isset(Yii::app()->controller->module->parentModule->id) && (Yii::app()->controller->module->parentModule->id=='admin')) {
// 		$activedAdminItem = true;
// 	}
		$this->widget('application.extensions.eflatmenu.EFlatMenu', array(
			'items' => array(
				array(
					'label'=>Yii::t('strings','Home'), 
					'url'=>array('/site'),
					'visible' => TRUE, 
					'active'=>(Yii::app()->controller->action->id=='index' && Yii::app()->controller->id=='site')),
				array(
					'label'=>Yii::t('strings','Notices'), 
					'url'=>array('/manager/info/default/notice'), 
					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isManager")), 
					'active'=>$activedNoticeItem
				),
				array(
					'label'=>Yii::t('strings','Events'), 
					'url'=>array('/manager/info/default/event'), 
					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isManager")), 
					'active'=>$activedEventItem
				),
				array(
					'label'=>Yii::t('strings','Appointments'), 
					'url'=>array('/manager/info/default/appointment'), 
					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isManager")), 
					'active'=>$activedAppointmentItem
				),
				array(
					'label'=>Yii::t('strings','Questions'), 
					'url'=>array('/manager/info/default/question'), 
					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isManager")), 
					'active'=>$activedQuestionItem
				),
				array(
					'label'=>Yii::t('strings','Visitor Comments'), 
					'url'=>array('/manager/info/default/visitorComment'), 
					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isManager")), 
					'active'=>$activedVisitorCommentItem
				),
				array(
					'label'=>Yii::t('strings','Advance Manage'), 
					'url'=>array('/manager/info/default/advanceManage'), 
					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isManager")), 
					'active'=>$activedAdvanceManageItem
				),
				
				
				array(
					'label'=>Yii::t('strings','Infos'), 
					'url'=>array('/admin/info'), 
					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isAdmin")), 
					'active'=>$activedAdminInfos
				),
				array(
					'label'=>Yii::t('strings','Hospitals'), 
					'url'=>array('/admin/hospital'), 
					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isAdmin")), 
					'active'=>$activedAdminHospitals
				),
				array(
					'label'=>Yii::t('strings','Users'), 
					'url'=>array('/admin/user'), 
					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isAdmin")), 
					'active'=>$activedAdminUsers
				),
				array(
					'label'=>Yii::t('strings','Log Events'), 
					'url'=>array('/admin/logevent'), 
					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isAdmin")), 
					'active'=>$activedAdminLogEvents
				),
// 				array(
// 					'label'=>'Administrator', 
// 					'url'=>array('/admin'), 
// 					'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState("isAdmin")) , 
// 					'active'=>$activedAdminItem
// 				),
				array(
					'label' => Yii::t('strings','Login'), 
					'url' => array('site/login'), 
					'visible' => Yii::app()->user->isGuest, 
					'active'=>(Yii::app()->controller->id=='site' && Yii::app()->controller->action->id=='login')),
				array(
					'label' => Yii::t('strings','Logout'). '(' . Yii::app()->user->name . ')', 
					'url' => array('/site/logout'), 
					'visible' => !Yii::app()->user->isGuest)
			)
		));
	?>
	
	<?php
	
 /*    $this->widget('bootstrap.widgets.TbNavbar', array(
        'type' => 'inverse', // null or 'inverse'
        'brand' => Yii::app()->name,
        //'brandUrl' => Yii::app()->homeUrl,
        'collapse' => true, // requires bootstrap-responsive.css
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                    array('label' => 'Manage', 'url' => '#', 'items' => array(
                        array('label' => 'Product Category', 'url' => array('/productTemplates')),
                        array('label' => 'User', 'url' => array('/users')),
                        array('label' => 'Product', 'url' => array('/products')),
                        array('label' => 'Order', 'url' => array('/orders')),
                        array('label' => 'RFQ', 'url' => array('/rfq')),
                        array('label' => 'Quote', 'url' => array('/quotes')),
                        array('label' => 'Member', 'url' => array('/members')),
                    )),
                    array('label' => 'Companies', 'url' => array('/companies')),
                    array('label' => 'Articles', 'url' =>'#', 'items' => array(
                        array('label' => 'Article', 'url' => array('/articles')),
                        array('label' => 'Footer', 'url' => array('/footer')),
                        array('label' => 'News and Events', 'url' => array('/events')),
                    )),
                    array('label' => 'Global', 'url' => '#', 'items' => array(
                        array('label' => 'Home Setting', 'url' => array('/globalsetting/home/setting?c=c_default&a=a_index')),
                        array('label' => 'Member Setting', 'url' => array('/globalsetting/default/memberSetting')),
                        array('label' => 'Account Setting', 'url' => array('/rights')),
                    )),
                    array('label' => 'Slider', 'url' => array('/slider')),
                    array('label' => 'Promotion', 'url' => array('/promotions')),
                ),
            ),
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => (Yii::app()->user->isGuest) ? array(
                    array('label' => 'Login', 'url' => '/back/userProfile/default/login'),) : array(
                    '---',
                    array('label' => "Welcome " . Yii::app()->user->name,'icon'=>'home', 'url' => (yii::app()->homeUrl) . 'userProfile/default/index', 'items' => array(
                        array('label' => 'Profile', 'url' => (yii::app()->homeUrl) . 'userProfile/default/index'),
                        array('label' => 'Change password', 'url' => (yii::app()->homeUrl) . 'userProfile/default/changePass'),
                        '---',
                        array('label' => 'Logout', 'url' => array('/vietrade/default/logout')),
                    )),
                ),
            ),
        ),
    )); */
    ?> 
	</div><!-- mainmenu -->
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink' => CHtml::link(Yii::t('strings','Home'), Yii::app()->homeUrl),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <a href="http://www.appromobile.com/" rel="external">Appromobile</a>.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
