<?php
App::uses('AppModel', 'Model');
/**
 * Race Model
 *
 * @property Userdetail $Userdetail
 */
class Race extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Userdetail' => array(
			'className' => 'Userdetail',
			'foreignKey' => 'race_id',
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
