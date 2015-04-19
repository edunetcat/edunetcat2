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
 * Site controller
 */
class SiteController extends Controller
{

    public $layout = 'login';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $session = Yii::$app->session;

        //si està logat
        if ( isset($session['isLogged']) && $session['isLogged'] == true ) {
            //carrega layout 'main'
            $this->layout = 'main';
            
            //afegeix al layout la vista
            return $this->render('index');    
        } else {
            return $this->actionLogin();
        }
    }

    public function actionLogin()
    {   
        $session = Yii::$app->session;
        $model = new LoginForm();
        $response = 'error';

        if ( $session['isLogged'] ) {
            return $this->goHome();
        }

        //verifica petició post per fer login
        if(Yii::$app->request->post()) {
            $username = Yii::$app->request->post()['LoginForm']['username'];
            $password = Yii::$app->request->post()['LoginForm']['password'];
            $url = 'http://dev.api.edunet.cat/v1/login/';
            $response = json_decode( file_get_contents($url.$username.'/'.$password) );
        }

        //si s'ha logat correctament
        if ($response != 'error') {
            $session->set('isLogged', true);
            $session->set('authKey', $response);

            return $this->goHome();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        $session = Yii::$app->session;

        //elimina sessió
        $session->set('isLogged', false);
        $session->set('authKey', '');

        return $this->goHome();
    }

    /*public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }*/
}
