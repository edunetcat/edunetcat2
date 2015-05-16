<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 *
 * Classe model d'assignatures
 *
 *
 * @author Marcos Torrent
 */
class Assignatures extends ActiveRecord {
    /**
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
