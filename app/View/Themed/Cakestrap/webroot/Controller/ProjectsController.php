<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 */
class ProjectsController extends AppController {
    public $helpers = array('Html');
    public $paginate = array(
        'limit'=>15,
        'contain'=>array(
            'Source' => array(
                'conditions'=>array(
                    'Source.type'=>3,
                    'Source.model'=>'Project'
                )
            )
        )
    
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Project->recursive = 0;
		$this->set('projects', $this->paginate());
       // pr($this->paginate());
	}

    /**
 * index method
 *
 * @return void
 */
	public function dashboard($project_id = null) {
	   
       $pest_count = $this->Project->Job->find('all',array(
            'conditions'=>array(
                'Job.project_id'=>$project_id
            ),
            'contain'=>array(
                'Reading' => array(
                    'Pest',
                    'Pesttype'
                ),
                'Activity' => array(
                    'Chemical',
                    'Activitytype'
                )
            ),
            'order'=>array('Job.day')
        ));
        
        //query list pesttype
        $pesttype = $this->Project->Job->Reading->Pesttype->find('list');
        
        //pr($pest_count);
        //count number of pest for each job
        $jobs = array();
        //$job_pesttypes = $pesttype;
        
        foreach($pest_count as $dt){
            $count = 0;
            $count_jobpesttype = array();
            foreach ($dt['Reading'] as $rd){
                
                //pest
                foreach($rd['Pest'] as $ps){
                    $count += $ps['ReadingsPest']['count'];
                }
                
                //pesttype
                $result = Set::combine($rd['Pesttype'], '{n}.id', '{n}.ReadingsPesttype.count');
                foreach($pesttype as $p_id => $pt){
                   if(isset($result[$p_id])){
                        if(!isset($count_jobpesttype[$p_id])){
                            array_push($count_jobpesttype,$p_id,$result[$p_id]);
                        } else {
                            $count_jobpesttype[$p_id]  += $result[$p_id];
                        }
                        
                   } 
                }
            }
            
            //assin number of best to related job
            $jobs[] = $count;
            $title[] = $dt['Job']['date'].' (Day:'.$dt['Job']['day'].')';
            
            //assin number of pesttype to related job
            foreach($pesttype as $p_id => $pt){
                   if(isset($count_jobpesttype[$p_id])){
                        $job_pesttypes[$p_id][]  = $count_jobpesttype[$p_id];
                   } else {
                         $job_pesttypes[$p_id][]  = 0;
                   }
            }
        }
        
        //assin number of pesttype to related job
        foreach($pesttype as $p_id => $pt){
            $job_pesttypes2[]= array('name'=>$pt,'data'=>$job_pesttypes[$p_id]);
            $pesttype2[] = $pt;
        }
        
        //echo json_encode($pesttype2);
       // echo json_encode($job_pesttypes2);
       	$this->set(compact('jobs','title','job_pesttypes2','pesttype2','pest_count'));
	}

/**
 * more method
 *
 * @return void
 */
	public function more() {
	  // $this->layout = false;
	//	$this->Project->recursive = 0;
	//	$this->set('projects', $this->paginate());
    
        $this->loadModel('Activitytype');
        //$this->Activitytype->contain('Chemical');
        $activitytypes = $this->Activitytype->find('all',array(
            'contain'=>array(
                'Chemical'=>array(
                    'Source' =>array(
                        'conditions'=>array(
                            'Source.model'=>'Chemical',
                            'Source.type' => 4
                        )
                    )
                )
             )
        ));
        
       // pr($activitytypes);
        
        $this->loadModel('Chemical');
       // $this->Chemical->contain();
        $chemicals = $this->Chemical->find('all',array(
            'contain'=>array(
                'Source' =>array(
                    'conditions'=>array(
                        'Source.model'=>'Chemical',
                        'Source.type' => 3
                    )
                )
            )
        ));
        
        $this->loadModel('Pest');
        //$this->Pest->contain();
        $pests = $this->Pest->find('all',array(
            'contain'=>array(
                'Source' =>array(
                    'conditions'=>array(
                        'Source.model'=>'Pest',
                        'Source.type' => 3
                    )
                )
            )
        ));
        
        $this->set(compact('activitytypes','chemicals','pests'));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array(
                'conditions' => array(
                    'Project.' . $this->Project->primaryKey => $id),
                'contain'=>array(
                    'Source' => array(
                        'conditions'=>array(
                            'Source.type'=>4,
                            'Source.model'=>'Project'
                        )
                    ),
                    'Job'
                )
            );
		
        // $this->Project->contain('Job');
        $project = $this->Project->find('first', $options);
        
       
        $this->set(compact('project','pesttypes','count_pest','locations'));
	}
    
    public function json_list_job() {
	   $this->autoRender = false;
       $id = $this->request->data['Project']['project_id'];
       
       
       if (!$this->Project->exists($id)) {
		  throw new NotFoundException(__('Invalid project'));
        }
        
        $start_date = date('Y-m-d',mktime(0,0,0,$this->request->data['Project']['month_job']['month'],1,$this->request->data['Project']['month_job']['year']));
        $end_date = date('Y-m-d',mktime(0,0,0,$this->request->data['Project']['month_job']['month'] + 1,1,$this->request->data['Project']['month_job']['year']));
        
		echo json_encode($this->Project->daily_job_pest($id,$start_date,$end_date));
        
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function detail($id = null) {
        //$this->Project->contain('Location','User');
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
        $this->Project->recursive = -1;
		$options = array(
            'contain'=>array(
                'Partition',
                'Source' => array(
                        'conditions'=>array(
                            'Source.type'=>2,
                            'Source.model'=>'Project'
                        )
                    )
            ),
            'conditions' => array('Project.' . $this->Project->primaryKey => $id));
        //pr($this->Project->find('first', $options));
		$this->set('project', $this->Project->find('first', $options));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->layout = false;
		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				//$this->Session->setFlash(__('The project has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
                $id = $this->Project->getLastInsertID();
                $this->Project->contain();
                
                $options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
                echo json_encode($this->Project->find('first', $options));
                
			} else {
				//$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'flash/error');
			}
            $this->autoRender = false;
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	   $this->layout = false;
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Project->save($this->request->data)) {
				//$this->Session->setFlash(__('The project has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
                $this->autoRender = false;
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
			$this->request->data = $this->Project->find('first', $options);
		}
	}


/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Project->id = $id;
        $this->autoRender = false;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		//$this->request->onlyAllow('post', 'delete');
		if ($this->Project->delete()) {
			//$this->Session->setFlash(__('Project deleted'), 'flash/success');
			//$this->redirect(array('action' => 'index'));
		}
		//$this->Session->setFlash(__('Project was not deleted'), 'flash/error');
		//$this->redirect(array('action' => 'index'));
	}
}
