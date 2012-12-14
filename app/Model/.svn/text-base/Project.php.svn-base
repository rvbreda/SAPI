<?php

App::uses('AppModel', 'Model');

class Project extends AppModel {

    public $actsAs = array(
        'Upload.Upload' => array(
            'file' => array(
                'fields' => array(
                    'dir' => 'file_dir'
                )
            )
        )
    );
    public $belongsTo = array(
        'Proposal' => array(
            'className' => 'Proposal',
            'foreignKey' => 'proposal_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ProjectStatus' => array(
            'className' => 'ProjectStatus',
            'foreignKey' => 'project_status_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'FinancialResource' => array(
            'className' => 'FinancialResource',
            'foreignKey' => 'project_id',
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
        'InscerResource' => array(
            'className' => 'InscerResource',
            'foreignKey' => 'project_id',
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
        'ResearchersTraining' => array(
            'className' => 'ResearchersTraining',
            'foreignKey' => 'project_id',
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
        'TechnicalTeam' => array(
            'className' => 'TechnicalTeam',
            'foreignKey' => 'project_id',
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
    
    public $validate = array(
    'file' => array(
        'rule' => 'isUnderPhpSizeLimit',
        'message' => 'Arquivo excede o tamanho máximo para upload'
    ));
    
     public function localToMysql($dateTime) {
        $date_chunks = explode('/', $dateTime);
        $time_chunks = explode(' ', $date_chunks[2]);
        $final_format = $time_chunks[0] . "-" . $date_chunks[1] . "-" . $date_chunks[0] . " " . $time_chunks[1];
        return $final_format;
    }
    
    public function getUnratedProjects($memberId){
        $sql = 'SELECT users.name AS `User.name`
                    , users.surname AS `User.surname`
                    , proposals.description AS `Proposal.description`
                    , projects.created AS `Project.created`
                    , projects.id AS `Project.id`
                    , areas.description AS `Area.description`
                FROM
                    proposals
                INNER JOIN users
                    ON proposals.user_id = users.id
                INNER JOIN projects
                    ON projects.proposal_id = proposals.id
                INNER JOIN projects_commitee_member_evaluation
                    ON projects_commitee_member_evaluation.project_id = projects.id
                INNER JOIN areas
                    ON proposals.area_id = areas.id
                WHERE
                    projects_commitee_member_evaluation.user_id =' . $memberId .'
                    AND projects_commitee_member_evaluation.evaluation_date IS NULL
                    AND projects_commitee_member_evaluation.text_evaluation IS NULL';
        
        return $this->query($sql);
    }
    
    public function wasProjectEvaluated($idProject, $memberId) {
        try {
            $sqlContagem = 'SELECT count(*) AS contagem
                            FROM
                            projects
                            INNER JOIN proposals
                            ON projects.proposal_id = proposals.id
                            INNER JOIN projects_commitee_member_evaluation
                            ON projects_commitee_member_evaluation.project_id = projects.id
                            WHERE
                            projects_commitee_member_evaluation.evaluation_date IS NULL
                            AND projects_commitee_member_evaluation.text_evaluation IS NULL
                            AND projects_commitee_member_evaluation.project_id =' . $idProject . '
                            AND projects_commitee_member_evaluation.user_id =' . $memberId;
            
            $result = $this->query($sqlContagem);
            
            
            
            if($result[0][0]['contagem'] > 0)
                return false;
            else
                return true;
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}