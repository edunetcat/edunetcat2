<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 *
 * Classe model de persones
 *
 *
 * @author Marcos Torrent
 */
class Persona extends ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'persona';
    }
    
    /**
     * defineix les regles de validació
     */
    public function rules() {
        return [ 
                [ 
                        [ 
                                'email',
                                'NIF',
                                'nom',
                                'cognoms',
                                'password',
                                'idTipusUsuari',
                                'idCentre' 
                        ],
                        'required' 
                ],
                [ 
                        [ 
                                'dataNaixement',
                                'direccio',
                                'poblacio',
                                'codiPostal' 
                        ],
                        'default' 
                ] 
        ];
    }
}