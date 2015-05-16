<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 *
 * Classe model de missatges
 * Missatges personals que es poden enviar als alumnes
 *
 * @author Marcos Torrent
 */
class Missatges extends ActiveRecord {
    /**
     * Especifica el nom de la taula que es farà servir per al model
     * @inheritdoc
     */
    public static function tableName() {
        return 'missatges';
    }
    
    /**
     * defineix les regles de validació
     */
    public function rules() {
        return [ 
                [ 
                        [ 
                                'Missatge' 
                        ],
                        'required' 
                ],
                [ 
                        [ 
                                'DataEnvio',
                                'HoraEnvio',
                                'Descripcio',
                                'ArxiuAdjunt' 
                        ],
                        'default' 
                ] 
        ];
    }
}
