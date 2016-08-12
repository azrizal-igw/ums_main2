<?php
App::uses('AppModel', 'Model');
/**
 * Site Model
 *
 * @property State $State
 */
class Site extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
 var $actsAs = array('Containable');
	public $validate = array(
		'location_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'state_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'district_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mukim_id' => array(
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

	var $virtualFields = array('dropdown_sitename' => 'CONCAT(Site.id, " ", Site.name)');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'District' => array(
			'className' => 'District',
			'foreignKey' => 'district_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
    	),'Phase' => array(
    			'className' => 'Phase',
    			'foreignKey' => 'phase_id',
    			'conditions' => '',
    			'fields' => '',
    			'order' => ''
    	),'Region' => array(
    			'className' => 'Region',
    			'foreignKey' => 'Region_id',
    			'conditions' => '',
    			'fields' => '',
    			'order' => ''
    	)
	
	);
	
	public $hasMany = array(
		'User'=>array(
            'className' => 'User',
			'foreignKey' => 'sitecode'
        ),
        'Accbalance'=>array(
            'className' => 'Accbalance',
			'foreignKey' => 'sitecode'
        ),'Accstatus'=>array(
            'className' => 'Accstatus',
			'foreignKey' => 'sitecode'
        )
   );
}
