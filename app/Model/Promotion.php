<?php
App::uses('AppModel', 'Model');
/**
 * Promotion Model
 *
 * @property Target $Target
 * @property User $User
 */
class Promotion extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'Target' => array(
			'className' => 'Target',
			'foreignKey' => 'target_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
