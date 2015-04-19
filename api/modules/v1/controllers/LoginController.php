<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use api\modules\v1\models\Persona;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\ArrayHelper;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class LoginController extends ActiveController {
	public $modelClass = 'app\models\Persona';
	public function actionLogin($user, $password) {
		$persona = Persona::findOne ( [ 
				'email' => $user,
				'password' => hash ( 'sha256', $password ) 
		] );
		
		if ($persona != null)
			return $persona->authKey;
		else
			return 'error';
	}
}
