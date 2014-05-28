<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Hospital Application',
    // preloading 'log' component
    'preload' => array(
        'bootstrap',
        'log',
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'application.controllers.api.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'manager' => array(
            'modules' => array(
                'info',
                'infocomment',
                'logevent',
                'user',
            ),
        ),
        'admin' => array(
            'modules' => array(
                'accesslevel',
                'changelog',
                'deviceos',
                'event',
                'hospital',
                'info',
                'infotype',
                'infocomment',
                'logevent',
                'user',
                'userlevel',
            ),
        ),
        'rights' => array(
        	'userNameColumn'=>'email',
            'install' => false,
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // There you go, use our 'extended' version
            //'class'=>'application.components.EWebUser',
            // enable cookie-based authentication
            'class' => 'RWebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('site/login'),
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'caseSensitive' => false,
            'showScriptName' => false,
            'rules' => array(
                // REST patterns
                /* array('api/list', 'pattern'=>'api/<model:\w+>', 'verb'=>'GET'),
                  array('api/list', 'pattern'=>'api/<model:\w+>/<offset:\d+>/<limit:\d+>/<sort:\w+>', 'verb'=>'GET'),
                  array('api/list', 'pattern'=>'api/<model:\w+>/<offset:\d+>/<limit:\d+>/<sort:\w+>', 'verb'=>'GET'),


                  array('api/view', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'GET'),
                  array('api/update', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
                  array('api/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
                  array('api/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'), */
                // Other controllers
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        /* 'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ), */
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=hospital',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'bootstrap' => array(
            'class' => 'ext.yiibooster-4.components.Booster',
        ),
        'apns' => array(
        		'class' => 'ext.apns-gcm.YiiApns',
        		'environment' => 'sandbox',
        		'pemFile' => dirname(__FILE__).'/apnssert/apns-dev.pem',
        		'dryRun' => false, // setting true will just do nothing when sending push notification
        		// 'retryTimes' => 3,
        		'options' => array(
        				'sendRetryTimes' => 5
        		),
        ),
        'gcm' => array(
        		'class' => 'ext.apns-gcm.YiiGcm',
        		'apiKey' => 'AIzaSyCmvUK69cXXj8AdfhCw6QvqXazPQ2eKkZA'
        ),
        // using both gcm and apns, make sure you have 'gcm' and 'apns' in your component
        'apnsGcm' => array(
        		'class' => 'ext.apns-gcm.YiiApnsGcm',
        		// custom name for the component, by default we will use 'gcm' and 'apns'
        		//'gcm' => 'gcm',
        		//'apns' => 'apns',
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'RESTusername' => 'admin@restuser',
        'RESTpassword' => 'admin@Access',
    ),
);
