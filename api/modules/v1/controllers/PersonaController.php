<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;
use api\modules\v1\models\Persona;

/**
 * Centres Controller API
 *
 * @author Marcos
 */
class PersonaController extends ActiveController {
    public $modelClass = 'api\modules\v1\models\Persona';
    
    /**
     * retorna la persona asociada amb la apikey enviada
     *
     * @param unknown $key            
     * @return unknown|string|mixed Persona
     */
    public function actionLamevainfo($key) {
        $persona = Persona::findOne ( [ 
                'authKey' => $key 
        ] );
        
        if ($persona != null)
            return $persona;
        else
            return 'error';
        
        return print_r ( $key ); // Yii::app ()->getRequest ()->getQuery ( 'access-key' );
    }
    public function behaviors() {
        $behaviors = parent::behaviors ();
        $behaviors ['corsFilter'] = [ 
                'class' => Cors::className (),
                'cors' => [ 
                        'Origin' => [ 
                                '*' 
                        ],
                        // 'Access-Control-Request-Method' => ['*'],
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
        // 'Access-Control-Request-Headers' => ['Expiry'],
        
        return $behaviors;
    }
    public function actionView($id) {
        return Persona::findOne ( $id );
    }
}


