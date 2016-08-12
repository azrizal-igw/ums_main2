<?php
App::uses('AppModel', 'Model');
/**
 * Usage Model
 *
 * @property Service $Service
 * @property Svcaltelsimpack $Svcaltelsimpack
 * @property Svcbsnbill $Svcbsnbill
 * @property Svcbsncashsaving $Svcbsncashsaving
 * @property Svcbsntopup $Svcbsntopup
 * @property Svcceleasyreload $Svcceleasyreload
 * @property Svccelstarter $Svccelstarter
 * @property Svcinsurance $Svcinsurance
 */
class Usage extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'localid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'icno' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sitecode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Service' => array(
			'className' => 'Service',
			'foreignKey' => 'service_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Svcaltelsimpack' => array(
			'className' => 'Svcaltelsimpack',
			'foreignKey' => 'usage_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Svcbsnbill' => array(
			'className' => 'Svcbsnbill',
			'foreignKey' => 'usage_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Svcbsncashsaving' => array(
			'className' => 'Svcbsncashsaving',
			'foreignKey' => 'usage_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Svcbsntopup' => array(
			'className' => 'Svcbsntopup',
			'foreignKey' => 'usage_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Svcceleasyreload' => array(
			'className' => 'Svcceleasyreload',
			'foreignKey' => 'usage_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Svccelstarter' => array(
			'className' => 'Svccelstarter',
			'foreignKey' => 'usage_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Svcinsurance' => array(
			'className' => 'Svcinsurance',
			'foreignKey' => 'usage_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
