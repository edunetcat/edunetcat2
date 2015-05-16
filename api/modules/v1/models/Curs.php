<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 *
 * Classe model de cursos
 * Cada curs que ofereix cada centre als alumnes que contindr� un grup d'assignatures
 *
 * @author Marcos Torrent
 */
class curs extends ActiveRecord {
    /**
     * Especifica el nom de la taula que es far� servir per al model
     * @inheritdoc
     */
    public static function tableName() {
        return 'curs';
    }
    
    /**
     * defineix les regles de validaci�
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
