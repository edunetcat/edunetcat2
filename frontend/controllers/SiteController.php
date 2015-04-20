<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Controller que controla l'accès al panell de control i el login d'usuaris
 *
 * @author : Biel <bielbcm@gmail.com>
 *        
 */

/**
 * Site controller
 */
class SiteController extends Controller {
	public $layout = 'login';
	
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [ 
				'access' => [ 
						'class' => AccessControl::className (),
						'only' => [ 
								'logout',
								'signup' 
						],
						'rules' => [ 
								[ 
										'actions' => [ 
												'signup' 
										],
										'allow' => true,
										'roles' => [ 
												'?' 
										] 
								],
								[ 
										'actions' => [ 
												'logout' 
										],
										'allow' => true,
										'roles' => [ 
												'@' 
										] 
								] 
						] 
				],
				'verbs' => [ 
						'class' => VerbFilter::className (),
						'actions' => [ 
								'logout' => [ 
										'post' 
								] 
						] 
				] 
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [ 
				'error' => [ 
						'class' => 'yii\web\ErrorAction' 
				],
				'captcha' => [ 
						'class' => 'yii\captcha\CaptchaAction',
						'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null 
				] 
		];
	}
	
	/**
	 * actionIndex es la que sexecuta quan s'accedeix a la url.
	 * Verifica si l'usuari
	 * està identificat. Si està autenticat, redirecciona
	 *
	 * @author : Biel <bielbcm@gmail.com>
	 *        
	 */
	public function actionIndex() {
		$session = Yii::$app->session;
		
		// si està logat
		if (isset ( $session ['isLogged'] ) && $session ['isLogged'] == true) {
			// carrega layout 'main'
			$this->layout = 'main';
			
			// afegeix al layout la vista
			return $this->render ( 'index' );
		} else {
			return $this->actionLogin ();
		}
	}
	
	/**
	 * Verifica si l'usuari està loguejat, si s'ha realitzat un intent de login (POST), i
	 * en cas afirmatiu, redirecciona.
	 *
	 * @author : Biel <bielbcm@gmail.com>
	 *        
	 */
	public function actionLogin() {
		$session = Yii::$app->session;
		$model = new LoginForm ();
		$response = 'error';
		
		if ($session ['isLogged']) {
			return $this->goHome ();
		}
		
		// verifica petició post per fer login
		if (Yii::$app->request->post ()) {
			$username = Yii::$app->request->post ()['LoginForm']['username'];
			$password = Yii::$app->request->post ()['LoginForm']['password'];
			$url = 'http://dev.api.edunet.cat/v1/login/';
			
			if (isset ( $username ) && isset ( $password )) {
				$response = json_decode ( $this->get_remote_data ( $url . $username . '/' . $password )[0] );
			}
		}
		// si s'ha logat correctament
		if ($response != 'error') {
			$session->set ( 'isLogged', true );
			$session->set ( 'authKey', $response );
			
			return $this->goHome ();
		} else {
			return $this->render ( 'login', [ 
					'model' => $model 
			] );
		}
	}
	public function actionGenerateToken() {
		$s = Yii::$app->session;
		echo 'pos mu bien';
	}
	
	/**
	 * Mètode per realitzar peticions rest.
	 * Retorna un array:
	 * [0] - Resposta en format JSON
	 * [1] - Header de la resposta
	 *
	 * @author : Marcos
	 *        
	 */
	public static function get_remote_data($url) {
		// metodo 3
		$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
		
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_USERAGENT, $agent );
		curl_setopt ( $ch, CURLOPT_VERBOSE, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 1 );
		
		$result = curl_exec ( $ch );
		
		$header_size = curl_getinfo ( $ch, CURLINFO_HEADER_SIZE );
		$header = substr ( $result, 0, $header_size );
		$body = substr ( $result, $header_size );
		
		curl_close ( $ch );
		return [ 
				$body,
				$header 
		];
	}
	
	/*
	 * public function actionRequestPasswordReset()
	 * {
	 * $model = new PasswordResetRequestForm();
	 * if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	 * if ($model->sendEmail()) {
	 * Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
	 *
	 * return $this->goHome();
	 * } else {
	 * Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
	 * }
	 * }
	 *
	 * return $this->render('requestPasswordResetToken', [
	 * 'model' => $model,
	 * ]);
	 * }
	 *
	 * public function actionResetPassword($token)
	 * {
	 * try {
	 * $model = new ResetPasswordForm($token);
	 * } catch (InvalidParamException $e) {
	 * throw new BadRequestHttpException($e->getMessage());
	 * }
	 *
	 * if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
	 * Yii::$app->getSession()->setFlash('success', 'New password was saved.');
	 *
	 * return $this->goHome();
	 * }
	 *
	 * return $this->render('resetPassword', [
	 * 'model' => $model,
	 * ]);
	 * }
	 */
}
