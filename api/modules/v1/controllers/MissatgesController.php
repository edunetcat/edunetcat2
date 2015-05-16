<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;

/**
 *
 * Classe controladora de missatges
 * Defineix les accions que es poden dur a terme amb els missatges
 *
 * @author Marcos Torrent
 */
class MissatgesController extends ActiveController {
    /**
     *
     * @var String nom de la clase model relacionada
     */
    public $modelClass = 'api\modules\v1\models\Missatges';
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


