<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');
/**
 * User Model
 *
 * @property Group $Group
 * @property Accbalance $Accbalance
 * @property Acctransaction $Acctransaction
 */
class User extends AppModel {
	var $components = array('Email');
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	// public $actsAs = array('Containable','Acl' => array('type' => 'requester'));
	public $actsAs = array('Acl' => array('type' => 'requester'), 'Containable');
	// public $actsAs = array('Containable');


	public function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}



/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Site'=> array(
			'foreignKey' => 'sitecode' 
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Accbalance' => array(
			'className' => 'Accbalance',
			'foreignKey' => 'user_id',
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
		'Acctransaction' => array(
			'className' => 'Acctransaction',
			'foreignKey' => 'user_id',
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

	public $hasAndBelongsToMany = array (
        'Region' => array (
            'className'             => 'Region',
            'joinTable'             => 'users_regions',
            'foreignKey'            => 'user_id',
            'associationForeignKey' => 'region_id',
            'unique'                => true
        )
    );
	
	
	/**
	 * acos table
	 */
  	public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } 
        else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } 
        else {
            return array('Group' => array('id' => $groupId));
        }
    }
    
	/**
	 * beforeSave method  */
	 	 
	public function beforeSave($options = null) {
		if ( isset($this->data['User']['password']) and $this->data['User']['password'] != null ) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true;
	}

   	var $validate = array(
        'username'=>array(
            'title_must_not_be_blank'=>array(
                'rule'=>'notEmpty',
               
            ),
           
        )
        
    );
}



