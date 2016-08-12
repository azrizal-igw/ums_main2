<?php
App::uses('AppModel', 'Model');
/**
 * Certrecord Model
 *
 * @property TraineeCourse $TraineeCourse
 * @property Trainee $Trainee
 * @property Course $Course
 * @property Location $Location
 * @property Gender $Gender
 * @property Occupation $Occupation
 * @property Education $Education
 * @property Race $Race
 */
class Certrecord extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed


	public $validate = array(
		'trainer_icno' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter IC No.',
			),                                                     
		),  
		'trainer_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter Name.',
			),                                                     
		),  
		'trainer_dob' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter Date of Birth.',
			),                                                     
		),  
		'trainer_mobile' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter HP No.',
			),                                                     
		),  
		'trainer_sitecode' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter Sitecode.',
			),                                                     
		),  
	);


/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Userdetail' => array(
			'className' => 'Userdetail',
			'foreignKey' => '',
			'conditions' => 'Certrecord.trainee_id = Userdetail.id',
			'fields' => 'name, icno, age',
			'order' => ''
		),
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Site' => array(
			'className' => 'Site',
			'foreignKey' => '',
			'conditions' => 'Site.id = Certrecord.location_id',
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
		'Race' => array(
			'className' => 'Race',
			'foreignKey' => 'race_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),


		
	);
}
