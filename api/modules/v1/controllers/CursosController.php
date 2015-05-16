<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;

/**
 *
 * Classe controladora de cursos
 *
 *
 * @author Marcos Torrent
 */
class CursosController extends ActiveController {
    public $modelClass = 'api\modules\v1\models\Curs'; // encara que la clase sigui CursosController, aqui hem de aclarar que el model es Curs
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
}


