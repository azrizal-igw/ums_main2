<?php
App::uses('AppModel', 'Model');
/**
 * Userdetail Model
 *
 * @property State $State
 * @property Gender $Gender
 * @property Race $Race
 * @property Nationality $Nationality
 * @property Occupation $Occupation
 * @property Education $Education
 * @property Income $Income
 * @property Usertype $Usertype
 * @property Ictknowledge $Ictknowledge
 * @property Transport $Transport
 * @property Fixline $Fixline
 * @property Bband $Bband
 * @property Mobile $Mobile
 * @property Threeg $Threeg
 * @property Training $Training
 */
class Userdetail extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
public $order = "Userdetail.name ASC";

var $actsAs = array('Containable');

	public $validate = array(
		'icno' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'checkExist' => array(
				'rule' => 'checkExist',
				'message' => 'This IC already been taken.',
			),  			
		),
        // 'icno' => array(
        //     'rule' => 'isUnique',
        //     'message' => 'This IC No has already been taken.'
        // ),   		
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),		
		'address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'city' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),		
		'state_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'gender_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),			
		'age' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'race_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),			
		'occupation_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'education_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'income_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),			
		'tel_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		/*
		'hp_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'email' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),			
		*/
		'ictknowledge_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'distance' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'transport_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'time_to_cbc' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'household' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),											
		'nationality_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'dob' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),	
		'sitecode' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	
	var $virtualFields = array('name_ic' => 'CONCAT(Userdetail.name, " (", Userdetail.icno, ")")');
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
		'Gender' => array(
			'className' => 'Gender',
			'foreignKey' => 'gender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Race' => array(
			'className' => 'Race',
			'foreignKey' => 'race_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Nationality' => array(
			'className' => 'Nationality',
			'foreignKey' => 'nationality_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Occupation' => array(
			'className' => 'Occupation',
			'foreignKey' => 'occupation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Education' => array(
			'className' => 'Education',
			'foreignKey' => 'education_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Income' => array(
			'className' => 'Income',
			'foreignKey' => 'income_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usertype' => array(
			'className' => 'Usertype',
			'foreignKey' => 'usertype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ictknowledge' => array(
			'className' => 'Ictknowledge',
			'foreignKey' => 'ictknowledge_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Transport' => array(
			'className' => 'Transport',
			'foreignKey' => 'transport_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Fixline' => array(
			'className' => 'Fixline',
			'foreignKey' => 'fixline_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Bband' => array(
			'className' => 'Bband',
			'foreignKey' => 'bband_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Mobile' => array(
			'className' => 'Mobile',
			'foreignKey' => 'mobile_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
		'Threeg' => array(
			'className' => 'Threeg',
			'foreignKey' => 'threeg_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Training' => array(
			'className' => 'Training',
			'joinTable' => 'userdetails_trainings',
			'foreignKey' => 'userdetail_id',
			'associationForeignKey' => 'training_id',
			'unique' => 'keepExisting',
			// 'unique' => 'false',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);


    public function checkExist() {
        $valid = true;        
        $count = $this->find('count', array(
            'conditions' => array(
                'Userdetail.icno' => $this->data['Userdetail']['icno'],
                'Userdetail.sitecode' => $this->data['Userdetail']['sitecode'],                
            )
        ));        
        if ($count > 0) {
            $valid = false;
        }        
        return $valid;       
    }  

}
