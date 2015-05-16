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

/**
 *
 * Classe controladora de login
 * Clase login, per poder loguejar els usuaris a la web
 *
 * @author Marcos Torrent
 */
class LoginController extends ActiveController {
    /**
     *
     * @var String nom de la clase model relacionada
     */
    public $modelClass = 'app\models\Persona';
    /**
     *
     * @param unknown $user
     *            usuari per loguejar-se
     * @param unknown $password
     *            contrasenya
     * @return string la api key
     */
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
