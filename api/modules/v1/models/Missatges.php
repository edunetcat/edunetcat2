<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 * Model centres
 *
 * @author Marcos
 */
class Missatges extends ActiveRecord {
    /**
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
