<?php

App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');

class EvaluationGroup extends AppModel {

    public $validate = array(
        'description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Descrição não pode ser deixada em branco.',
            ),
        ),
        'User' => array(
            'isEmptyList' => array(
                'rule' => 'isEmptyList',
                'message' => 'Descrição não pode ser deixada em branco.'
            ),
        ),
    );

    public function isEmptyList($data) {
        if (!empty($data['User']))
            return true;
        else {
            //$this->invalidate('User', 'Selecione pelo menos um membro.');
            return false;
        }
    }

    public $hasAndBelongsToMany = array(
        'User' => array(
            'className' => 'User',
            'joinTable' => 'evaluation_groups_users',
            'foreignKey' => 'evaluation_group_id',
            'associationForeignKey' => 'user_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
    );

    public function getDefaultEvaluationGroup() {
        //seleciona o grupo
        $query = "SELECT `User`.`id`, `User`.`name`, `User`.`surname` , `User`.`email`
                            FROM `inscer`.`users` AS `User` 
                            JOIN `inscer`.`evaluation_groups_users` AS `EvaluationGroupsUser`
                            ON (`EvaluationGroupsUser`.`user_id` = `User`.`id`)
                            JOIN `inscer`.`evaluation_groups` AS `EvaluationGroups`
                            ON (`EvaluationGroupsUser`.`evaluation_group_id` = `EvaluationGroups`.`id`)
                            WHERE `EvaluationGroups`.`default` = 1";
        return $this->query($query);
    }

    public function addDefaultEvaluationGroupToProposal($idProposal) {
        try {
            $date = date('Y-m-d H:i:s', time());
            //seleciona o grupo
            $defaultGroup = $this->getDefaultEvaluationGroup();
            //salva os avaliadores para a proposta
            foreach ($defaultGroup as $value) {
                $queryInsert = "INSERT INTO `inscer`.`proposal_user_evaluations`(`user_id`,`proposal_id`,`evaluation`,`created`,`modified`)VALUES(" . $value['User']['id'] . "," . $idProposal . ", 'NA', '" . $date . "','" . $date . "');";
                $this->query($queryInsert);
            }
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }
    
    public function addDefaultEvaluationGroupToProject($idProject) {
        try {
            $date = date('Y-m-d H:i:s', time());
            //seleciona o grupo
            $defaultGroup = $this->getDefaultEvaluationGroup();
            //salva os avaliadores para a proposta
            foreach ($defaultGroup as $value) {
                $queryInsert = 'INSERT INTO `inscer`.`projects_commitee_member_evaluation`
                                    (`user_id`, `project_id`,`created`)
                                VALUES ('. $value['User']['id'] .', '.$idProject.', \''.$date.'\');'; 
                
                $this->query($queryInsert);
            }
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

    //MANDA E-MAIL PARA A COMISSAO AVALIADORA AVISANDO QUE UMA NOVA PROPOSTA 
    //FOI ENVIADA E QUE ELA DEVE SER AVALIADA
    //$configuration = array('idPropOrProj' => 1, 'subject' => 'Assunto', 'tplemail' => 'newproposal')
    public function sendMailToEvaluationGroup($configuration) {
        try 
            {
                $defaultGroup = $this->getDefaultEvaluationGroup();
                
                foreach ($defaultGroup as $member) {
                    $email = new CakeEmail('default');
                    $email  ->from('neurobase@pucrs.br', 'Instituto do Cérebro PUCRS')
                            ->to($member['User']['email'])
                            ->subject($configuration['subject'])
                            ->template($configuration['tplemail'], 'inscer')
                            ->emailFormat('both');
                    $email->viewVars(array('idPropOrProj' => $configuration['idPropOrProj'], 'projectname' => $configuration['projectname']));
                    $email->send();
                    $email->reset();
                }
                return true;
            } 
        catch (Exception $exc) 
            {
            return false;
            }
    }

    public function saveUsersToGroup($data, $groupId) {
        try {
            $date = date('Y-m-d H:i:s', time());
            //LIMPA A LISTA DE PESQUISADORES ATUAL
            $sqlDelete = 'DELETE FROM `inscer`.`evaluation_groups_users`';
            $this->query($sqlDelete);
            //PARA CADA USUARIO, SALVA O GRUPO

            foreach ($data['EvaluationGroup']['User'] as $user) {
                $sqlInsert = 'INSERT INTO `inscer`.`evaluation_groups_users`
                                (`evaluation_group_id`, `user_id`, `created`)
                             VALUES
                                (' . $groupId . ', ' . $user . ', \'' . $date . '\');';
                $this->query($sqlInsert);
            }
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

}
