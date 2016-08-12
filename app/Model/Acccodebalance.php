<?php
App::uses('AppModel', 'Model');
/**
 * Accbalance Model
 *
 * @property User $User
 */
class Acccodebalance extends AppModel {

var $actsAs = array('Containable');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'siteid' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Acccode' => array(
			'className' => 'Acccode',
			'foreignKey' => 'acccode_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    
}
