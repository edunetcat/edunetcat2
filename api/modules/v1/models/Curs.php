<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 *
 * Classe model de cursos
 * Cada curs que ofereix cada centre als alumnes que contindrà un grup d'assignatures
 *
 * @author Marcos Torrent
 */
class curs extends ActiveRecord {
    /**
     * Especifica el nom de la taula que es farà servir per al model
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
