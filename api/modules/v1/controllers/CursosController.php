<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;

/**
 *
 * Classe controladora de cursos
 * Defineix les accions que es poden dur a terme a les dades dels centres
 *
 * @author Marcos Torrent
 */
class CursosController extends ActiveController {
    /**
     *
     * @var String nom de la clase model relacionada (encara que la clase sigui CursosController, aqui hem de aclarar que el model es Curs)
     */
    public $modelClass = 'api\modules\v1\models\Curs';
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


