<?php
App::uses('Acccode', 'Model');

/**
 * Acccode Test Case
 *
 */
class AcccodeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.acccode', 'app.acctransaction');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Acccode = ClassRegistry::init('Acccode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Acccode);

		parent::tearDown();
	}

}
