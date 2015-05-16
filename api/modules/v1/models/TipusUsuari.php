<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 *
 * Classe model de tipus de usuaris
 * Cada tipus de persones (professor, alumne, administrador)
 *
 *
 * @author Biel
 */
class Tipususuari extends ActiveRecord {
    /**
     * Especifica el nom de la taula que es farà servir per al model
     * @inheritdoc
     */
    public static function tableName() {
        return 'tipususuari';
    }
    
    /**
     * defineix les regles de validació
     */
    public function rules() {
        return [ 
                [ 
                        [ 
                                'nomTipususuari' 
                        ],
                        'required' 
                ] 
        ];
    }
}
