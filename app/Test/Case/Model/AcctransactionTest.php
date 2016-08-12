<?php
App::uses('Acctransaction', 'Model');

/**
 * Acctransaction Test Case
 *
 */
class AcctransactionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.acctransaction', 'app.acccode', 'app.user', 'app.group', 'app.accbalance');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Acctransaction = ClassRegistry::init('Acctransaction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Acctransaction);

		parent::tearDown();
	}

}
