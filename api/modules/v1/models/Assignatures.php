<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 * Model assignatures
 *
 * @author Marcos
 */
class Centres extends ActiveRecord {
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
