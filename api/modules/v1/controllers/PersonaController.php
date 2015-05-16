<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;
use api\modules\v1\models\Persona;

/**
 *
 * Classe controladora de persones
 * Defineix les accions que es poden dur a terme a les dades de les persones
 *
 * @author Marcos Torrent
 */
class PersonaController extends ActiveController {
    /**
     *
     * @var String nom de la clase model relacionada
     */
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
    /**
     * mostra la persona indicada
     *
     * @param unknown $id
     *            id de la persona que es vol buscar
     * @return \yii\db\static
     */
    public function actionView($id) {
        return Persona::findOne ( $id );
    }
}


