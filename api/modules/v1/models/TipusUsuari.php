<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 * Model tipususuari
 *
 * @author Biel
 */
class TipusUsuari extends ActiveRecord {
	/**
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
					'nom' 
				],
				'required' 
			]
		];
	}
}
