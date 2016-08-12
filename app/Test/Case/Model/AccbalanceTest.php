<?php
App::uses('Accbalance', 'Model');

/**
 * Accbalance Test Case
 *
 */
class AccbalanceTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.accbalance', 'app.user', 'app.group', 'app.acctransaction');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Accbalance = ClassRegistry::init('Accbalance');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Accbalance);

		parent::tearDown();
	}

}
