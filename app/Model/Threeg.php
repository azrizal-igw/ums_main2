<?php
App::uses('AppModel', 'Model');
/**
 * Threeg Model
 *
 * @property Userdetail $Userdetail
 */
class Threeg extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Userdetail' => array(
			'className' => 'Userdetail',
			'foreignKey' => 'threeg_id',
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
