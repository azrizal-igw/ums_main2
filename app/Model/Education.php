<?php
App::uses('AppModel', 'Model');
/**
 * Education Model
 *
 * @property Userdetail $Userdetail
 */
class Education extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Userdetail' => array(
			'className' => 'Userdetail',
			'foreignKey' => 'education_id',
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
