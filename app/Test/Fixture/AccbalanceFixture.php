<?php
/**
 * AccbalanceFixture
 *
 */
class AccbalanceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'code' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'transmonth' => array('type' => 'date', 'null' => true, 'default' => NULL, 'comment' => 'last date of the month'),
		'bf' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '11,2'),
		'dr' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '11,2'),
		'cr' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '11,2'),
		'bal' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '11,2'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'siteid' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entrydate' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'three_UNIQUE' => array('column' => array('code', 'transmonth', 'siteid'), 'unique' => 1)),
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
			'code' => 'Lorem ipsum dolor ',
			'transmonth' => '2012-04-10',
			'bf' => 1,
			'dr' => 1,
			'cr' => 1,
			'bal' => 1,
			'user_id' => 1,
			'siteid' => 'Lorem ipsum dolor ',
			'entrydate' => 1334032411
		),
	);
}
