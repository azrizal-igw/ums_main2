<?php
/**
 * UserdetailFixture
 *
 */
class UserdetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'localid' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'icno' => array('type' => 'string', 'null' => false, 'length' => 20, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'state_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'gender_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'age' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'race_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'occupation_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'education_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'income_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'oku' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 1),
		'registered_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'active' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 1),
		'usertype_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'tel_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'hp_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ictknowledge_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'distance' => array('type' => 'float', 'null' => true, 'default' => '0.00', 'length' => '5,2'),
		'transport_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'time_to_cbc' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'household' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'fixline' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 1),
		'fixline_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'fixline_num' => array('type' => 'string', 'null' => true, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bband' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 1),
		'bband_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'bband_num' => array('type' => 'string', 'null' => true, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'computer' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 1),
		'mobile' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 1),
		'mobile_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'mobile_num' => array('type' => 'string', 'null' => true, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'threeg' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 1),
		'threeg_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'threeg_num' => array('type' => 'string', 'null' => true, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cardno' => array('type' => 'string', 'null' => true, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'other_site' => array('type' => 'string', 'null' => true, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'dob' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'entry_dt' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'mod_dt' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'sendstatus' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'siteid' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entrydate' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'two_UNIQUE' => array('column' => array('icno', 'siteid'), 'unique' => 1)),
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
			'localid' => 1,
			'icno' => 'Lorem ipsum dolor ',
			'name' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state_id' => 1,
			'gender_id' => 1,
			'age' => 1,
			'race_id' => 1,
			'occupation_id' => 1,
			'education_id' => 1,
			'income_id' => 1,
			'oku' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'registered_date' => '2012-04-10 02:21:50',
			'active' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'usertype_id' => 1,
			'tel_no' => 'Lorem ipsum dolor ',
			'hp_no' => 'Lorem ipsum dolor ',
			'email' => 'Lorem ipsum dolor sit amet',
			'ictknowledge_id' => 1,
			'distance' => 1,
			'transport_id' => 1,
			'time_to_cbc' => 1,
			'household' => 1,
			'fixline' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'fixline_id' => 1,
			'fixline_num' => 'Lorem ipsum dolor ',
			'bband' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'bband_id' => 1,
			'bband_num' => 'Lorem ipsum dolor ',
			'computer' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'mobile' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'mobile_id' => 1,
			'mobile_num' => 'Lorem ipsum dolor ',
			'threeg' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'threeg_id' => 1,
			'threeg_num' => 'Lorem ipsum dolor ',
			'cardno' => 'Lorem ipsum dolor sit amet',
			'other_site' => 'Lorem ipsum dolor sit amet',
			'dob' => '2012-04-10',
			'entry_dt' => '2012-04-10 02:21:50',
			'mod_dt' => '2012-04-10 02:21:50',
			'sendstatus' => 1,
			'siteid' => 'Lorem ipsum dolor sit amet',
			'entrydate' => 1334024510
		),
	);
}
