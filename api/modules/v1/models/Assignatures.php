<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 *
 * Classe model d'assignatures
 * Defineix cada una de les assignatures que pot cursar un alumne
 *
 * @author Marcos Torrent
 */
class Assignatures extends ActiveRecord {
    /**
     * Especifica el nom de la taula que es farà servir per al model
     * @inheritdoc
     */
    public static function tableName() {
        return 'assignatures';
    }
    
    /**
     * defineix les regles de validació
     */
    public function rules() {
        return [ 
                [ 
                        [ 
                                'nomAssignatura' 
                        ],
                        'required' 
                ] 
        ];
    }
}
