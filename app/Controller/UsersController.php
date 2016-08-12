<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
var $components = array('Email');
public function beforeFilter($name='admin') {
parent::beforeFilter();
$this->Auth->allow('*');
}
/**
 * index method
 *
 * @return void
 */
public function index() { 
//pr($this->User);
$this->User->recursive = 0;       //Cake fetches Group data and its domain
$cond[] = array();
if($this->request->is('post') || $this->Session->read('Auth.User.Search.User')){
	if($this->request->is('post')){

		$this->Session->write('Auth.User.Search.User',$this->request->data);
		$this->request->params['named']['paged'] = 1;
	} else {
		$this->request->data = $this->Session->read('Auth.User.Search.User');
		}

			/* Search by Name */  
		if($this->request->data['User']['name'] != null){
			$cond['User.name LIKE'] = '%'.$this->request->data['User']['name'].'%';
		}
		/* Search by  Email*/
		if($this->request->data['User']['email'] != null){
			$cond['User.email LIKE'] = '%'.$this->request->data['User']['email'].'%';
		}
		/* Search by Site Code */
		if($this->request->data['User']['sitecode'] != null){
			$cond['User.sitecode LIKE'] = '%'.$this->request->data['User']['sitecode'].'%';
		}
		
	} else {

		//$this->set('users', $this->paginate());
	}
    //$cond['User.name like'] = "%".$this->request->data['User']['name']."%";
	//$this->set('users', $this->paginate());

$this->set('users',$this->paginate('User',$cond));
	 
}


/**
 * view method
 *
 * @param string $id
 * @return void
 */
public function view($id = null) {
	$this->User->id = $id;
	if (!$this->User->exists()) {
		throw new NotFoundException(__('Invalid user'));
	}
	$this->set('user', $this->User->read(null, $id));     //send to .ctp
}

/**
 * add method
 *
 * @return vpopmail_del_domain(domain)
 */
public function add() {
	if ($this->request->is('post')) {                                //if input is keyin data true
		$this->User->create();
		// pr($this->User->create());                                       // create a new user
		if ($this->User->save($this->request->data)) {               //save input request data from input form
			$this->Session->setFlash(__('The user has been saved'));
			$this->redirect(array('action' => 'index'));                //jump to index page
		} else {
			$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
		}
	}
	// $sites = $this->User->Site->find('list',array('fields'=>array('id','name')));          //query site table ON BELONGTO from model
	$sites = $this->User->Site->find('list',array('fields'=>array('id','dropdown_sitename'),'order'=>array('Site.id ASC')));  


	// pr($sites);
	// $sites = Set::combine($sites,'{n}')
	$groups = $this->User->Group->find('list');
	$this->set(compact('groups','sites'));                            //set compact---- .ctp able to read that variable 
}

// this function is used to register many users at one time....
public function myadd() {
Configure::write('debug',2);
	$strQ = "select id as username,'password' as password,CONCAT('Pengurus ',id) as name,\n".
			"'' email,'Pengurus' designation,id sitecode,now() created,now() modified,'4' group_id\n".
			"from sites where id not in (select sitecode from users) order by id\n";
	//pr($strQ);
	$newusers = $this->User->query($strQ);
	//pr($newusers);die();

	/*
	foreach($newusers as $newuser) {
	   $data = array('data','username'=>$newuser['sites']['username'],'password'=>$newuser['0']['password'],'name'=>$newuser['0']['name'],'group_id'=>$newuser['0']['group_id'],'sitecode'=>$newuser['sites']['sitecode']);
		//pr($data);
		$this->User->create();
		$this->User->save($data);
	}
	*/

    foreach($newusers as $newuser) {
        $data = array('data', 
            'username'=>$newuser['sites']['username'],
            'password'=>$newuser['0']['password'],
            'name'=>$newuser['0']['name'],
            //email
            'designation'=>$newuser['0']['designation'],
            //'created'=>date('Y-m-d H:i:s'),
            'group_id'=>$newuser['0']['group_id'],
            'sitecode'=>$newuser['sites']['sitecode']
        );
        //pr($data);
        $this->User->create();
        $this->User->save($data);
    }


}

	
	
/**
 * updatepassword method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 
public function updatepassword() {
  
	$this->User->id = $this->Session->read('Auth.User.id');
	if (!$this->User->exists()) {
		throw new NotFoundException(__('Invalid user'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
	  
		if (isset($this->request->data['User']['group_id'])){
			unset($this->request->data['User']['group_id']);
		}
		// if (isset($this->request->data['User']['company_id'])){
		//	unset($this->request->data['User']['company_id']);
		// }
		
		if ($this->User->save($this->request->data)) {
			$this->Session->setFlash(__('The user has been saved'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
		}
	} else {
		$usr = $this->User->findById($this->User->id);
		$usr['User']['password'] = null;
		$this->request->data =$usr;
	}
	$groups = $this->User->Group->find('list');
	$this->set(compact('groups'));
}

// if ($this->request->is('post')) {                                //if input is keyin data true
// $this->User->create();                                       // create a new user
// if ($this->User->save($this->request->data)) {               //save input request data from input form
// $this->Session->setFlash(__('The user has been saved'));
// $this->redirect(array('action' => 'index'));                //jump to index page
// } else {
// $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
// }
// }
// $sites = $this->User->Site->find('list',array('fields'=>array('id','name')));          //query site table ON BELONGTO from model
// $sites = $this->User->Site->find('list',array('fields'=>array('id','dropdown_sitename'),'order'=>array('Site.id ASC')));  


// pr($sites);
// $sites = Set::combine($sites,'{n}')
// $groups = $this->User->Group->find('list');
// $this->set(compact('groups','sites'));                            //set compact---- .ctp able to read that variable 



/**
 * edit method
 *
 * @param string $id
 * @return void
 */
public function edit($id = null) {
	$this->User->id = $id;
	if (!$this->User->exists()) {
	throw new NotFoundException(__('Invalid user'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
	// $save = true;                                                 //swicthing save or not save
	// //if one or both not null 
	// //if ($this->request->data['User']['password1'] != null or $this->request->data['User']['password2'] != null) { 
	// //if inputtext1 and inputtext2 are same..
	// if($this->request->data['User']['password1'] == $this->request->data['User']['password2'] ) {  
	// $this->request->data['User']['password'] = $this->request->data['User']['password1'];
	// }else
	// {
	// $this->Session->setFlash(__('The password not match Please, try again.'));
	// $save = false;
	// }
	// 		}
	// 		if ($save) {
				if ($this->User->save($this->request->data)) {     // jika save data dari input
					$this->Session->setFlash(__('The user has been saved')); 
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			//}
			
		} else {
			$this->request->data = $this->User->read(null, $id); //jika tiada input from form ...read var id 
		}
		
		// $sites = $this->User->Site->find('list');   //query	site dalam user
		$sites = $this->User->Site->find('list',array('fields'=>array('id','dropdown_sitename')));   //query	site dalam user
		$groups = $this->User->Group->find('list'); //query group dalam user
		$regions = $this->User->Region->find('list'); //query group dalam user
		$this->set(compact('groups','sites','regions'));    //hantar ke .ctp 
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function login() {
		$this->layout = false;
		if ($this->request->is('post')) { // jika ada data dari input text
			if ($this->Auth->login()) {   //
			//	$this->Session->setFlash('Welcome.');
				$this->Session->write('Site.sitecode',$this->Session->read('Auth.User.sitecode'));
				
				// account = 5
				if ($this->Auth->User('group_id') == 5) {
					$this->User->contain('Region');
					$user = $this->User->findById($this->Auth->User('id'));
					$region = Set::classicExtract($user['Region'], '{n}.id');
					$this->Session->write('Auth.User.region',$region);
					$this->redirect(array('controller'=>'accbalances','action' => 'listacc'));
				} 

				// manager = 4
				else if ($this->Auth->User('group_id') == 4) {
					$this->redirect(array('controller'=>'accbalances','action' => 'listyear'));
				} 

				// reporting = 2
				// regional manager 7
				else if (in_array($this->Auth->User('group_id'), array(2, 7))) {			
					$this->User->contain('Region');
					$user = $this->User->findById($this->Auth->User('id'));
					$region = Set::classicExtract($user['Region'], '{n}.id');
					$this->Session->write('Auth.User.region',$region);					
					$this->redirect(array('controller'=>'userdetails','action' => 'index'));
				}
				
				/*
				else if ($this->Auth->User('group_id') == 2) {
					$this->User->contain('Region');
					$user = $this->User->findById($this->Auth->User('id'));
					$region = Set::classicExtract($user['Region'], '{n}.id');
					$this->Session->write('Auth.User.region',$region);
					$this->redirect(array('controller'=>'accbalances','action' => 'listacc/4'));
				}
				*/
				else {
					$this->redirect(array('controller'=>'userdetails','action' => 'index'));
				}				
			} 
			else {
				$this->Session->setFlash('Your username or password was incorrect.');
			}
		}
	}

	public function logout() {
	    $this->Session->delete('Site.sitecode');
		$this->Session->setFlash('Good-Bye');
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
		
	}
	
	public function initDB() {
	    $group = $this->User->Group;
	    //Allow admins to everything
	    $group->id = 1;
	    $this->Acl->allow($group, 'controllers');  //kebenaran access page dan controller

	    //allow managers to posts and widgets
	    $group->id = 2;
	     $this->Acl->allow($group, 'controllers');

	    //allow users to only add and edit on posts and widgets
	    $group->id = 3;
	     $this->Acl->allow($group, 'controllers');
	     
	     //allow users to only add and edit on posts and widgets
	    $group->id = 4;
	     $this->Acl->allow($group, 'controllers');
         
          //allow users to only add and edit on posts and widgets
	    $group->id = 5;
	     $this->Acl->allow($group, 'controllers');
	     
	     
	     
	    //we add an exit to avoid an ugly "missing views" error message
	    echo "all done";
	    exit;
	}


public function forgot_pass(){

			
		if($this->request->is('post')){

					if(!empty($this->request->data)){

							$this->User->contain();
							$email = $this->User->findByUsername($this->data['User']['username']);
										
							if(!empty($email)){

								$to = $email['User']['email'];
					 	$id = $email['User']['id'];

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length = 8; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    

					
					$message = "New password : ".$randomString." \r\n\r\n It is recommended to change your password after resetting";
						if(!empty($to)){

							$this->Email->to = $to;
							$this->Email->subject = 'CMS Web : Reset Password';
							$this->Email->from = 'ums.support@msd.net.my';
							

							$this->Email->smtpOptions = array(
								'port'=>'465',
								'timeout'=>'30',
								'host'=>'ssl://smtp.gmail.com',
								'username'=>'ums.support@msd.net.my',
								'password'=>'password383',
								);

						
							$this->Email->delivery = 'smtp';
							if ($this->Email->send($message)){
								$this->User->id = $id;
								$this->User->saveField('password', $randomString);
								$this->Session->setFlash("New password has been sent to your email! ".$to);
								$this->redirect(array('action'=>'forgot_pass'));
								
							}else{

								//echo $this->Email->smtpError;
								$this->Session->setFlash($this->Email->smtpError);
								$this->redirect(array('action'=>'forgot_pass'));
							}
								
							}
							else{

								$this->Session->setFlash("No such username were found or no email were registered with this username!");
								$this->redirect(array('action'=>'forgot_pass'));

							}

							}else{

								$this->Session->setFlash("No such username were found or no email were registered with this username!");
								$this->redirect(array('action'=>'forgot_pass'));

							}

					}

					$this->redirect(array('action'=>'login'));

				
				}

}


}
