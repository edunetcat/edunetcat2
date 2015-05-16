<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;

/**
 *
 * Classe controladora d'usuaris
 * Defineix les accions que es poden dur a terme a les dades de les persones
 *
 * @author Biel
 */
class UsuarisController extends ActiveController {
    /**
     *
     * @var String nom de la clase model relacionada
     */
    public $modelClass = 'api\modules\v1\models\Persona';
    public function behaviors() {
        $behaviors = parent::behaviors ();
        $behaviors ['corsFilter'] = [
                'class' => Cors::className (),
                'cors' => [
                        'Origin' => [
                                '*'
                        ],
                        'Access-Control-Request-Method' => [
                                'POST',
                                'GET',
                                'PUT',
                                'DELETE',
                                'HEADER',
                                'OPTIONS'
                        ],
                        'Access-Control-Request-Headers' => [
                                '*'
                        ]
                ]
        ];

        return $behaviors;
    }
}


