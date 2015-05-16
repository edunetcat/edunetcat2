<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 *
 * Classe model de persones
 * Defineix les dades personals de totes les persones/usuaris que es poden conectar, al igual que el password, el tipus d'usuari i el centre
 *
 * @author Marcos Torrent
 */
class Persona extends ActiveRecord {
    /**
     * Especifica el nom de la taula que es farà servir per al model
     * @inheritdoc
     */
    public static function tableName() {
        return 'persona';
    }
    
    /**
     * defineix les regles de validacio
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