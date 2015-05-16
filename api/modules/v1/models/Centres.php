<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 *
 * Classe model de centres
 * Cadascun dels centres que estan funcionant amb edunet
 *
 * @author Marcos Torrent
 */
class Centres extends ActiveRecord {
    /**
     * Especifica el nom de la taula que es farà servir per al model
     * @inheritdoc
     */
    public static function tableName() {
        return 'centres';
    }
    
    /**
     * defineix les regles de validació
     */
    public function rules() {
        return [ 
                [ 
                        [ 
                                'nom' 
                        ],
                        'required' 
                ],
                [ 
                        [ 
                                'direccio',
                                'telefon',
                                'poblacio' 
                        ],
                        'default' 
                ] 
        ];
    }
}
