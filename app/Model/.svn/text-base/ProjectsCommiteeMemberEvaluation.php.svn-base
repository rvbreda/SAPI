<?php
App::uses('AppModel', 'Model');
/**
 * ProjectsCommiteeMemberEvaluation Model
 *
 * @property User $User
 * @property Project $Project
 * @property MembersScoresByCriterium $MembersScoresByCriterium
 */
class ProjectsCommiteeMemberEvaluation extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'projects_commitee_member_evaluation';


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
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'MembersScoresByCriterium' => array(
			'className' => 'MembersScoresByCriterium',
			'foreignKey' => 'id',
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
