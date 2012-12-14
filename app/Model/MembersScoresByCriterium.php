<?php
App::uses('AppModel', 'Model');
/**
 * MembersScoresByCriterium Model
 *
 * @property ProjectCommiteeMemberEvaluation $ProjectCommiteeMemberEvaluation
 * @property EvaluationCriterion $EvaluationCriterion
 */
class MembersScoresByCriterium extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ProjectCommiteeMemberEvaluation' => array(
			'className' => 'ProjectCommiteeMemberEvaluation',
			'foreignKey' => 'project_commitee_member_evaluation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EvaluationCriterion' => array(
			'className' => 'EvaluationCriterion',
			'foreignKey' => 'evaluation_criterion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public function setMembersScoresByCriterium($evaluationId, $evaluationCriteria) {
        try {
            foreach ($evaluationCriteria['ProjectsCommiteeMemberEvaluation']['MembersScoresByCriterium'] as $msbc) {
                $msbc['project_commitee_member_evaluation_id'] = $evaluationId;
                $sql = 'INSERT INTO `inscer`.`members_scores_by_criteria`
                            (`project_commitee_member_evaluation_id`, `evaluation_criterion_id`, `score`)
                        VALUES
                            (' . $evaluationId . ', ' . $msbc['evaluation_criterion_id'] . ', ' . $msbc['score'] . ');';
                
                $this->query($sql);
            }
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

}
