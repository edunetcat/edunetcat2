<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 *
 * Classe model de cursos
 *
 *
 * @author Marcos Torrent
 */
class curs extends ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'curs';
    }
    
    /**
     * defineix les regles de validació
     */
    public function rules() {
        return [ 
                [ 
                        [ 
                                'nom',
                                'idCentre',
                                'idAssignatura' 
                        ],
                        'required' 
                ] 
        ];
    }
}
