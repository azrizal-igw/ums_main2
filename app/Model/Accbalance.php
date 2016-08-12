<?php
App::uses('AppModel', 'Model');
/**
 * Accbalance Model
 *
 * @property User $User
 */
class Accbalance extends AppModel {

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
        'Accstatustitle' => array(
			'className' => 'Accstatustitle',
			'foreignKey' => 'accstatustitle_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Site' => array(
			'className' => 'Site',
			'foreignKey' => 'sitecode',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    
     public function beforeSave($options = null){
        if(isset($this->data['Accbalance']['id']) and $this->data['Accbalance']['id'] != null){
            $this->editId = $this->data['Accbalance']['id'];
        }       
        
            
    }
    public function afterSave($created=null, $options = null){
        if(isset($this->editId))  {
            $id = $this->editId;
        } else {
            $id = $this->getInsertID();
        }       
        
        //$id = mysql_real_escape_string($id);
        //$this->contain('Acccode');
        //$this->lastInsetData = $this->findById($id);
        //$this->totalAcc();
        if(isset($id)){
            $this->query('UPDATE accbalances Set `bal`= `bf` + `dr` + `cr` WHERE id='.$id);
        }
        
            
    }    

    
   
}
