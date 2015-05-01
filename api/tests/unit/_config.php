<?php
return yii\helpers\ArrayHelper::merge ( require (__DIR__ . '/../../../common/config/main.php'), require (__DIR__ . '/../../../common/config/main-local.php'), require (__DIR__ . '/../../config/main.php'), require (__DIR__ . '/../../config/main-local.php'), require (__DIR__ . '/../_config.php'), [ 
		'components' => [ 
				'db' => [ 
						'class' => 'yii\db\Connection',
						'dsn' => 'mysql:host=localhost;dbname=edunetcat',
						'username' => 'root',
						'password' => '',
						'charset' => 'utf8' 
				] 
		] 
] );
