<?php

App::uses('AppModel', 'Model');

/**
 * Proposal Model
 *
 * @property User $User
 * @property Area $Area
 */
class Proposal extends AppModel {
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
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
        'area_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'proposal' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor preencha o campo Proposta.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor preencha o campo Nome do Projeto.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'text_evaluation' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor preencha o campo Nome do Projeto.',
            //'allowEmpty' => false,
            //'required' => true,
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
        'Area' => array(
            'className' => 'Area',
            'foreignKey' => 'area_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'ProposalUserEvaluation' => array(
            'className' => 'ProposalUserEvaluation',
            'foreignKey' => 'proposal_id',
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

    public function getUnratedProposals($comissaoUserId) {
        $query = "Select p.id, p.description, p.created, u.name, u.surname, a.description
                from proposals p left join proposal_user_evaluations pue on p.id = pue.proposal_id 
                left join users u on u.id = p.user_id
                left join areas a on a.id = p.area_id
                where pue.evaluation_date is null and pue.user_id = " . $comissaoUserId . " 
                order by p.created";
        return $this->query($query);
    }

    public function getProposalForEvaluation($id = null) {
        $query = "SELECT `Proposal`.`id`, `Proposal`.`proposal`, `Proposal`.`description`, 
                `User`.`id`,  `User`.`name`, `User`.`surname`, `User`.`email`,  
                `Area`.`id`, `Area`.`description`, `ProposalUserEvaluation`.`id` FROM `inscer`.`proposals`
                 AS `Proposal` LEFT JOIN `inscer`.`users` AS `User` ON 
                (`Proposal`.`user_id` = `User`.`id`) LEFT JOIN `inscer`.`areas` AS `Area` ON (`Proposal`.`area_id` = `Area`.`id`) 
                LEFT JOIN `inscer`.`proposal_user_evaluations` AS `ProposalUserEvaluation` ON (`Proposal`.`id` = `ProposalUserEvaluation`.`proposal_id`)
                WHERE `Proposal`.`id` = " . $id . " LIMIT 1;";
        return $this->query($query);
    }

    public function setTextEvaluationForProposal($arrayData) {
        try {
            $date = date('Y-m-d H:i:s', time());

            $query = "INSERT INTO `inscer`.`proposal_text_evaluations`(`proposal_user_evaluation_id`, `description`,`created`)
            VALUES(" . $arrayData['Proposal']['proposal_user_evaluation_id'] . ", '" . $arrayData['Proposal']['text_evaluation'] . "', '" . $date . "');";

            $this->query($query);

            $query2 = "UPDATE `inscer`.`proposal_user_evaluations`
            SET
            `evaluation` = '" . $arrayData['Proposal']['evaluation_type'] . "',
            `modified` = '" . $date . "',
            `evaluation_date` = '" . $date . "'
            WHERE id = " . $arrayData['Proposal']['proposal_user_evaluation_id'] . "";

            $this->query($query2);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    //AO SALVAR UM NOVO PROJETO, É VERIFICADO SE A PROPOSTA
    //QUE ORIGINA O PROJETO É VÁLIDA E SE ELA PARTENCE AO USUÁRIO LOGADO
    public function canProjectBeSend($proposalId, $userId){
        $isOk = false;
        $proposal = $this->find('first',array(
            'fields' => array('Proposal.id', 'Proposal.user_id', 'Proposal.evaluation'),
            'conditions' => array('Proposal.id' => $proposalId)
        ));
        
        //VERIFICA O STATUS
        if($proposal['Proposal']['evaluation'] == "APROVADA")
            $isOk = true;
        //VERIFICA SE PROPOSTA PERTENCE AO USUARIO LOGADO    
        if($userId == $proposal['Proposal']['user_id'])
            $isOk = true;
        else
            $isOk = false;
        
        return $isOk;
    }
    
    public function getEvaluationPercentage($proposalId){
        $sqlTotal = "select count(*) as contagem from proposal_user_evaluations where proposal_id = " . $proposalId;
        $sqlEvaluated = 'select count(*) as contagem from proposal_user_evaluations where proposal_id = '.$proposalId.' and evaluation != \'NA\'';
        
        $contagem = $this->query($sqlTotal);
        $contagem = $contagem[0][0]['contagem'];
        
        $contagemAvaliada = $this->query($sqlEvaluated);
        $contagemAvaliada = $contagemAvaliada[0][0]['contagem'];

        
        return (($contagemAvaliada * 100) / $contagem);
    }
    
    public function isProposalEvaluatedByMe($proposalId, $userId){
        
    }
    
    public function getProposalTextEvaluation($proposalId) {
        $sql = 'SELECT proposal_user_evaluations.evaluation AS `UserEvaluation.evaluation`
            , proposal_text_evaluations.description AS `UserEvaluation.text_evaluation`
        FROM
            proposals
        INNER JOIN areas
            ON proposals.area_id = areas.id
        INNER JOIN proposal_user_evaluations
            ON proposal_user_evaluations.proposal_id = proposals.id
        INNER JOIN proposal_text_evaluations
            ON proposal_text_evaluations.proposal_user_evaluation_id = proposal_user_evaluations.id
        WHERE
            proposals.id = ' . $proposalId;

        return $this->query($sql);
        
    }
}
