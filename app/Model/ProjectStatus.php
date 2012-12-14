<?php
App::uses('AppModel', 'Model');
/**
 * ProjectStatus Model
 *
 * @property Project $Project
 */
class ProjectStatus extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'status_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_status_id',
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
