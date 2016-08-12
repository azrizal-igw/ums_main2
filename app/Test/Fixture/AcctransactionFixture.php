<?php
/**
 * AcctransactionFixture
 *
 */
class AcctransactionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'transdate' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'acccode_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'drcr' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'amount' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => 11),
		'desc' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'siteid' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entrydate' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'transdate' => '2012-04-10 04:33:55',
			'acccode_id' => 1,
			'code' => 'Lorem ipsum dolor ',
			'drcr' => '',
			'amount' => 1,
			'desc' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'siteid' => 'Lorem ipsum dolor ',
			'entrydate' => 1334032435
		),
	);
}
