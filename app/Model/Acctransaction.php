<?php
App::uses('AppModel', 'Model');
/**
 * Acctransaction Model
 *
 * @property Acccode $Acccode
 * @property User $User
 */
class Acctransaction extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	var $actsAs = array('Containable');

    var $uses = array('Accbalance','Acctransaction','Acccodebalance','Receipt','Accstatus');
  
	public $validate = array(
		'drcr' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
		'amount' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Wajib diisi',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Sila masukan format yang betul',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'file' => array(
            
        ),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Acccode' => array(
			'className' => 'Acccode',
			'foreignKey' => 'acccode_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Acccodeheader' => array(
			'className' => 'Acccodeheader',
			'foreignKey' => 'acccode_id',
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
		'Site' => array(
			'className' => 'Site',
			'foreignKey' => 'sitecode',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),            
	);


    public $hasOne = array(
        'Uploadfile' => array(
            'className' => 'Uploadfile',
            'foreignKey' => 'acctransaction_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
    );

    
	/**
 * entry method
 *
 * @return void
 */ 
	function expenseHeader ( $transdate = null,$sitecode =null) {
	
        
       
		$year = substr($transdate,0,4);
		$month = substr($transdate,4,2);
        $day = substr($transdate,6,2);

        $minDate = date('Ymd',mktime(0,0,0,$month,1,$year));
        $maxDate = date('Ymd',mktime(0,0,0,$month + 1,1,$year));
		
        $this->Acccode->Acccodeheader->contain('Acccode');
		$accodeheaders = $this->Acccode->Acccodeheader->find('all',array('conditions'=>array('Acccodeheader.sitecode'=>$sitecode,'AND'=>array('Acccodeheader.transdate >='=>$minDate,'Acccodeheader.transdate <'=>$maxDate))));
	
        $acc = array();
		foreach ($accodeheaders as $accodeheader) {
		  $id = ''.+substr($accodeheader['Acccodeheader']['transdate'],6,8);
		  //$accodeheader['Acccodeheader']['amount'] = ($accodeheader['Acccodeheader']['amount'] == 0 ? '&nbsp;' : money_format('%.2n',$accodeheader['Acccodeheader']['amount']));
			//if(isset($acc[$id][$accodeheader['Acccodeheader']['acccode_id']])) {
          $accodeheader['Acccodeheader']['amount'] = sprintf('%01.2f', $accodeheader['Acccodeheader']['amount']);
			$acc[$id][$accodeheader['Acccodeheader']['acccode_id']] = $accodeheader['Acccodeheader'];
            
            $acc[$id]['masuk'] = isset($acc[$id]['masuk'])?$acc[$id]['masuk']:0;
            $acc[$id]['keluar'] = isset($acc[$id]['keluar'])?$acc[$id]['keluar']:0;
            $acc['final_acc'][$accodeheader['Acccodeheader']['acccode_id']] = isset($acc['final_acc'][$accodeheader['Acccodeheader']['acccode_id']])?$acc['final_acc'][$accodeheader['Acccodeheader']['acccode_id']]:0;
           	       
            if ($accodeheader['Acccode']['reportas'] == 1){
                $acc[$id]['masuk'] += $accodeheader['Acccodeheader']['amount'];
            } else {
                $acc[$id]['keluar'] += $accodeheader['Acccodeheader']['amount'];
            }
            
            $baki =  $acc[$id]['masuk'] +  $acc[$id]['keluar'];
            $acc[$id]['baki'] = $baki;
            
           $acc['final_acc'][$accodeheader['Acccodeheader']['acccode_id']] += $accodeheader['Acccodeheader']['amount'];
            

		}
        $numDay = cal_days_in_month ( CAL_GREGORIAN, $month, $year);
        $accbalance = $this->accstatus($year.$month,$sitecode);
        $bakiforward = $accbalance['bf'];
        $final_keluar =0 ;
        $final_masuk =0;
        
        for ($i = 1;$i <= $numDay; $i++) {
            $bakiSemasa = isset($acc[$i]['baki'])?$acc[$i]['baki']:0;
            //$acc[$i]['bakiforward'] = $bakiSemasa + $bakiforward;
			$acc[$i]['bakiforward'] = number_format($bakiSemasa + $bakiforward, 2);
            $bakiforward += $bakiSemasa;
            
            $final_masuk += isset($acc[$i]['masuk']) ? $acc[$i]['masuk']:0;
            $final_keluar += isset($acc[$i]['keluar']) ? $acc[$i]['keluar']:0;
        }
       //$acc['final_bakiforward'] = $bakiforward;
	   $acc['final_bakiforward'] = number_format($bakiforward, 2);
       $acc['final_masuk'] = $final_masuk;
       $acc['final_keluar'] = $final_keluar;
       
       $acc['acc_status'] = $accbalance;
       $acc['bf'] = $accbalance['bf'];
       return $acc;
       // pr($acc);
    }
    
    	
/**
 *  accstatus method 
 *
 * @param transmonth ex : 201204,201203
 * @param sitecode 
 * @return 'close or open'
 */
 
	function accstatus( $transmonth = null , $sitecode = null) {
	   
        $closedacc = $this->Site->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.substr($transmonth ,0,6),"Accbalance.sitecode='".$sitecode."'")));
        $status = array();
        if ( empty($closedacc )) {
			$closedacc = $this->Site->Accbalance->Accstatustitle->find('all',array('conditions'=>array('Accstatustitle.id' => 1)));
            $status['title'] = $closedacc[0]['Accstatustitle']['name'];
            $status['edit_permission'] = true;
            $status['bf'] = 0;
            unset($closedacc[0]['Accstatus']);

		} else if($closedacc[0]['Accstatustitle']['id'] == 2) {
            $status['title'] = $closedacc[0]['Accstatustitle']['name'].' '.$closedacc[0]['Accbalance']['modified'];
            $status['edit_permission'] = false;
            $status['bf'] = $closedacc[0]['Accbalance']['bf'];
            $status['id'] = $closedacc[0]['Accbalance']['id'];
        $status['accstatustitle_id'] = $closedacc[0]['Accstatustitle']['id'];
		} else if($closedacc[0]['Accstatustitle']['id'] == 3) {
            $status['title'] = $closedacc[0]['Accstatustitle']['name'].'<b>('.$closedacc[0]['Accbalance']['count'].')</b> '.$closedacc[0]['Accstatus']['modified'];
            $status['edit_permission'] = false;
            $status['bf'] = $closedacc[0]['Accbalance']['bf'];
            $status['id'] = $closedacc[0]['Accbalance']['id'];
        $status['accstatustitle_id'] = $closedacc[0]['Accstatustitle']['id'];
        } else if($closedacc[0]['Accstatustitle']['id'] == 4) {
            $status['title'] = $closedacc[0]['Accstatustitle']['name'].' '.$closedacc[0]['Accbalance']['modified'];
            $status['edit_permission'] = false;
            $status['bf'] = $closedacc[0]['Accbalance']['bf'];
            $status['id'] = $closedacc[0]['Accbalance']['id'];
        $status['accstatustitle_id'] = $closedacc[0]['Accstatustitle']['id'];
        } else if($closedacc[0]['Accstatustitle']['id'] == 1) {
            $status['title'] = $closedacc[0]['Accstatustitle']['name'];
            $status['edit_permission'] = true;
            $status['bf'] = $closedacc[0]['Accbalance']['bf'];
            $status['id'] = $closedacc[0]['Accbalance']['id'];
        $status['accstatustitle_id'] = $closedacc[0]['Accstatustitle']['id'];
        }
        
        
        return $status;
        //pr($closedacc);
		
	}
    
    public function totalAcc(){
        if(isset($this->lastInsetData)){
            
            $sitecode = $this->lastInsetData['Acctransaction']['sitecode'];
            $parent_id = $this->lastInsetData['Acccode']['parent_id'];
            $transdate = $this->lastInsetData['Acctransaction']['transdate'];
            
            $cond = array(
                        'Acctransaction.transdate'=>$transdate,
                        'Acccode.parent_id'=>$parent_id,
                        'Acctransaction.sitecode'=>$sitecode);
                        
            $accTrans = $this->find('all',array(
                                            'conditions'=>$cond
                                            )
                                         );
   
            
            $accTotal =0;
            foreach ($accTrans as $accTran){
                if($accTran['Acctransaction']['drcr'] == 'cr'){
                    $accTotal -= $accTran['Acctransaction']['amount'] ;
                } else {
                    $accTotal += $accTran['Acctransaction']['amount'] ;
                }
            }
            
            
            $cond = array(
                        'Acccodeheader.acccode_id'=>$parent_id,
                        'Acccodeheader.transdate'=>$transdate,
                        'Acccodeheader.sitecode'=>$sitecode);
            
            $saveData = array(
                                'Acccodeheader.amount'=>$accTotal ) ;
            
            //if amount = 0 : delete record
            if($accTotal == 0 ) {
                $this->Acccodeheader->deleteAll($cond);
            } else {
                $this->contain();
                if($this->Acccodeheader->hasAny($cond)){
                    $this->Acccodeheader->updateAll($saveData,$cond);
                } else {
                    $this->Acccodeheader->save(array('Acccodeheader'=>array(
                                    'amount'=>$accTotal,
                                    'acccode_id'=>$parent_id,
                                    'transdate'=>$transdate,
                                    'sitecode'=>$sitecode ) ));
                }
            }
            
            
            $accbalanceDetail = $this->expenseHeader($transdate,$sitecode);
            //$bal =  $accbalanceDetail['final_masuk'] + $accbalanceDetail['final_masuk'] - $accbalanceDetail['final_keluar']
            $accbalance = array('dr'=>$accbalanceDetail['final_masuk'],'cr'=>$accbalanceDetail['final_keluar'] );
            $cond = array('sitecode'=>$sitecode,'transmonth'=>substr($transdate,0,6));
            
            $this->Site->Accbalance->contain();
            if($acc = $this->Site->Accbalance->find('all',array('conditions'=>$cond))){
                $accbalance['id'] = $acc[0]['Accbalance']['id'];                
            } else {
                $accbalance = Set::pushDiff($accbalance,$cond);
                
            }
            $this->Site->Accbalance->save(array('Accbalance'=>$accbalance));            
            
            //return( $saveData);
        }
        
    }
   
    public function beforeSave($options = null){
        if(isset($this->data['Acctransaction']['id']) and $this->data['Acctransaction']['id'] != null){
            $this->editId = $this->data['Acctransaction']['id'];
        }       
        
            
    }
    public function afterSave($created=null, $options = null){
        if(isset($this->editId))  {
            $id = $this->editId;
        } else {
            $id = $this->getInsertID();
        }       
        
        $this->contain('Acccode');
        $this->lastInsetData = $this->findById($id);
        $this->totalAcc();
            
    }
    public function beforeDelete($cascade = true){
                   
        $id = $this->id;
        $this->contain('Acccode');
        $this->lastInsetData = $this->findById($id);
            
    }
    public function afterDelete(){
                   
        $this->totalAcc();
            
    }
    
}

?>
