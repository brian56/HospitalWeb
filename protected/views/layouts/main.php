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

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	<div id="eflat-menu">

	<?php 
		$this->widget('application.extensions.eflatmenu.EFlatMenu', array(
			'items' => array(
				array(
					'label'=>'Home', 
					'url'=>array('/site'),
					'visible' => TRUE, 
					'active'=>(Yii::app()->controller->action->id=='index' && Yii::app()->controller->id=='site')),
				array(
					'label'=>'Manager', 
					'url'=>array('/manager'), 
					'visible' => !Yii::app()->user->isGuest, 
					'active'=>(isset(Yii::app()->controller->module->id) && (Yii::app()->controller->module->id=='manager')),
				),
				array(
					'label'=>'Administrator', 
					'url'=>array('/admin'), 
					'visible' => !Yii::app()->user->isGuest, 
					'active'=>(isset(Yii::app()->controller->module->id) && Yii::app()->controller->module->id=='admin')),
				array(
					'label'=>'Rights', 
					'url'=>array('/rights'), 
					'visible' => !Yii::app()->user->isGuest, 
					'active'=>(isset(Yii::app()->controller->module->id) && Yii::app()->controller->module->id=='rights')),
				array(
					'label' => 'Login', 
					'url' => array('site/login'), 
					'visible' => Yii::app()->user->isGuest, 
					'active'=>(Yii::app()->controller->id=='site' && Yii::app()->controller->action->id=='login')),
				array(
					'label' => 'Logout (' . Yii::app()->user->name . ')', 
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
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Appromobile.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
