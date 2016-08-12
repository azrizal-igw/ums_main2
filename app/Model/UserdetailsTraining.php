<?php
App::uses('AppModel', 'Model');
/**
 * UserdetailsTraining Model
 *
 * @property Training $Training
 * @property Userdetail $Userdetail
 * @property User $User
 */
class UserdetailsTraining extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'training_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'userdetail_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Training' => array(
			'className' => 'Training',
			'foreignKey' => 'training_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Userdetail' => array(
			'className' => 'Userdetail',
			'foreignKey' => 'userdetail_id',
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
		),
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => '',
			'conditions' => 'Training.course_id = Course.id',
			'fields' => 'id, course_code, name',
			'order' => ''
		),			
	);
}
