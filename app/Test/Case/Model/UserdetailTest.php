<?php
App::uses('Userdetail', 'Model');

/**
 * Userdetail Test Case
 *
 */
class UserdetailTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.userdetail', 'app.state', 'app.gender', 'app.race', 'app.occupation', 'app.education', 'app.income', 'app.usertype', 'app.ictknowledge', 'app.transport', 'app.fixline', 'app.bband', 'app.mobile', 'app.threeg');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Userdetail = ClassRegistry::init('Userdetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Userdetail);

		parent::tearDown();
	}

}
