<?php
App::uses('Uploadfile', 'Model');

/**
 * Uploadfile Test Case
 *
 */
class UploadfileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.uploadfile',
		'app.user',
		'app.group',
		'app.site',
		'app.state',
		'app.region',
		'app.district',
		'app.mukim',
		'app.userdetail',
		'app.gender',
		'app.race',
		'app.nationality',
		'app.occupation',
		'app.education',
		'app.income',
		'app.usertype',
		'app.ictknowledge',
		'app.transport',
		'app.fixline',
		'app.bband',
		'app.mobile',
		'app.threeg',
		'app.training',
		'app.course',
		'app.module',
		'app.target',
		'app.userdetails_training',
		'app.phase',
		'app.accbalance',
		'app.accstatustitle',
		'app.accstatus',
		'app.acctransaction',
		'app.acccode',
		'app.acccodeheader',
		'app.users_region'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Uploadfile = ClassRegistry::init('Uploadfile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Uploadfile);

		parent::tearDown();
	}

}
