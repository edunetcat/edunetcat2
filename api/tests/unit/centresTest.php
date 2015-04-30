<?php
use api\modules\v1\models\Centres;
class centresTest extends \Codeception\TestCase\Test {
	/**
	 *
	 * @var \UnitTester
	 */
	protected $tester;
	protected function _before() {
	}
	protected function _after() {
	}
	
	// tests
	public function testMe() {
		// $centre = Centres::findOne ( 1 );
		$centre = Centres::className ();
	}
}