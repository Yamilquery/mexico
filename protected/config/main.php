<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'MéxicoLibre',

	// preloading 'log' component
	'preload'=>array(
		'log',
		'bootstrap'
	),
	'defaultController'=>'site/index',

	'language'=>'es',
	'sourceLanguage'=>'en',
	'charset'=>'utf-8',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.controllers.*',
		'application.modules.user.models.*',
        'application.modules.user.components.*',
	),

	'theme'=>'abound', // requires you to copy the theme under your themes directory
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'150190',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),

		'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
            # send activation email
            'sendActivationMail' => false,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => true,
            # automatically login from registration
            'autoLogin' => true,
            # registration path
            'registrationUrl' => array('/user/registration'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/user/login'),
            # page after login
            'returnUrl' => array('/user/profile'),
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
            # profile Relations Awebo :D
            'profileRelations'=>array(
            	//'country'=>array(CActiveRecord::BELONGS_TO, 'Country', 'country_id'),
            ),
        ),

        'hybridauth' => array(
            'baseUrl' => 'http://'. $_SERVER['SERVER_NAME'] . '/mexico/hybridauth', 
            'withYiiUser' => true, // Set to true if using yii-user
            "providers" => array ( 
                "openid" => array (
                    "enabled" => true
                ),
 
                "yahoo" => array ( 
                    "enabled" => true 
                ),
 
                "google" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "id" => "", "secret" => "" ),
                    "scope"   => ""
                ),
 
                "facebook" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "id" => "262047607293971", "secret" => "d0a2adb98cdb77f15d1f02d7ef33762f" ),
                    "scope"   => "email,publish_stream", 
                    "display" => "" 
                ),
 
                "twitter" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "key" => "", "secret" => "" ) 
                )
            )
        ),
	),

	// application components
	'components'=>array(
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		*/
		'db'=>array(
			//'tablePrefix' => 'tbl_',
			'connectionString' => 'mysql:host=localhost;dbname=bolsa',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',


		),
		'user'=>array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
        ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);