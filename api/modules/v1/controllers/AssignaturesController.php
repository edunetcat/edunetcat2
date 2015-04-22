<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Centres Controller API
 *
 * @author Marcos
 */
class AssignaturesController extends ActiveController {
	public $modelClass = 'api\modules\v1\models\Assignatures';
	
	/**
	 * Configuracio yii
	 * 
	 * @see \yii\rest\Controller::behaviors()
	 */
	public function behaviors() {
		$behaviors = parent::behaviors ();
		
		// configurem la resposta en format json cuan es demani desde web
		$behaviors ['contentNegotiator'] ['formats'] ['text/html'] = Response::FORMAT_JSON;
		
		// daquesta forma necesita la apikey
		$behaviors ['authenticator'] = [ 
				'class' => QueryParamAuth::className () 
		];
		
		return $behaviors;
	}
	
	/**
	 * activen la identificació de sessions
	 * 
	 * @see \yii\rest\ActiveController::init()
	 */
	public function init() {
		parent::init ();
		\Yii::$app->user->enableSession = false;
	}
}


