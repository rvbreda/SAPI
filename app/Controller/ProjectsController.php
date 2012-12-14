<?php

App::uses('AppController', 'Controller');

class ProjectsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('*'));
    }

    public function index() {
        $this->Project->recursive = 0;
        $this->set('projects', $this->paginate());
    }

    public function view($id = null) {
         $this->layout = "default_diretor";
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Projeto inválido'));
        }
        $this->set('project', $this->Project->read(null, $id));
    }

    public function add($proposalId = null) {
        $this->layout = 'default_pesquisador';
        //VERIFICA SE UM ID DE PROPOSTA FOI ENVIADO
        if ($proposalId == null) {
            $this->Session->setFlash('<h3>Nenhuma proposta relacionada foi encontrada.<h3>', 'default', array('class' => 'formee-msg-error message'));
            $this->redirect(array('action' => 'index'));
        }

        //VERIFICA SE A PROPOSTA EXISTE
        $this->loadModel('Proposal');
        $this->Proposal->id = $proposalId;

        if ($this->Proposal->exists()) {
            //CARREGA A PROPOSTA PARA USO DAS INFORMAÇÕES
            $this->Proposal->recursive = -1;
            $this->Proposal->read(null, $proposalId);
            //A PROPOSTA EXISTE
            if ($this->request->is('post')) {
                //VERIFICA SE A PROPOSTA É DO USUARIO LOGADO E ESTÁ COMO APROVADA
                if ($this->Proposal->canProjectBeSend($proposalId, $this->Auth->user("id"))) {
                    $this->Project->create();
                    //TRANFORMA A DATA DO BR PARA MYSQL
                    $this->request->data['Project']['start_date'] = $this->Project->localToMysql($this->request->data['Project']['start_date']);
                    $this->request->data['Project']['end_date'] = $this->Project->localToMysql($this->request->data['Project']['end_date']);
                    //PARA CADA VALOR DE FINANCIAMENTO, ADEQUAR AO MYSQL
                    foreach ($this->request->data['FinancialResource'] as $key => $resource) {
                        $entry = str_replace(array(',', '.'), "", $resource['value']);
                        $entry = substr($entry, 0, -2);
                        $this->request->data['FinancialResource'][$key]['value'] = $entry;
                    }
                    //SALVA O PROJETO E OS DADOS ASSOCIADOS
                    if ($this->Project->saveAssociated($this->request->data)) {
                        //assossia o projeto com os avaliadores
                        $idProject = $this->Project->id;
                        $this->loadModel('EvaluationGroup');
                        if ($this->EvaluationGroup->addDefaultEvaluationGroupToProject($idProject)) {
                            //ENVIA E-MAIL PARA A COMISSAO
                            $configuration = array('idPropOrProj' => $idProject, 'subject' => 'Projeto Enviado', 'tplemail' => 'newproject', 'projectname' => $this->Proposal->data['Proposal']['description']);
                            $this->EvaluationGroup->sendMailToEvaluationGroup($configuration);
                            $this->Session->setFlash('<h3>Projeto enviado com sucesso.<h3>', 'default', array('class' => 'formee-msg-success message'));
                            $this->redirect(array('action' => 'index'));
                        } else {
                            // caso não tenha salvo o grupo padrão, remove a proposta
                            $this->Project->delete();
                            $this->Session->setFlash('<h3>Erro ao salvar seu projeto. "Grupo padrão não pode ser salvo."<h3>', 'default', array('class' => 'formee-msg-error message'));
                            $this->redirect(array('action' => 'index'));
                        }
                        
                    } else {
                        $this->Session->setFlash('<h3>Este projeto não pode ser enviado, tente mais tarde.<h3>', 'default', array('class' => 'formee-msg-info message'));
                        $this->redirect(array('action' => 'index'));
                    }
                } else {
                    $this->Session->setFlash('<h3>Este projeto não pode ser enviado, sua proposta não foi avaliada.<h3>', 'default', array('class' => 'formee-msg-info message'));
                    $this->redirect(array('action' => 'index'));
                }
            }

            $this->set(compact('proposalId'));
        } else {
            $this->Session->setFlash('<h3>Nenhuma proposta relacionada foi encontrada.<h3>', 'default', array('class' => 'formee-msg-info message'));
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function edit($id = null) {
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__('The project has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The project could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Project->read(null, $id);
        }
        $proposals = $this->Project->Proposal->find('list');
        $projectStatuses = $this->Project->ProjectStatus->find('list');
        $this->set(compact('proposals', 'projectStatuses'));
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }
        if ($this->Project->delete()) {
            $this->Session->setFlash(__('Project deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Project was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function admin_index() {
        $this->Project->recursive = 0;
        $this->set('projects', $this->paginate());
    }

    public function admin_view($id = null) {
        $this->layout = "default_admin";
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }
        $this->set('project', $this->Project->read(null, $id));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Project->create();
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__('The project has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The project could not be saved. Please, try again.'));
            }
        }
        $proposals = $this->Project->Proposal->find('list');
        $projectStatuses = $this->Project->ProjectStatus->find('list');
        $this->set(compact('proposals', 'projectStatuses'));
    }

    public function admin_edit($id = null) {
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__('The project has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The project could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Project->read(null, $id);
        }
        $proposals = $this->Project->Proposal->find('list');
        $projectStatuses = $this->Project->ProjectStatus->find('list');
        $this->set(compact('proposals', 'projectStatuses'));
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }
        if ($this->Project->delete()) {
            $this->Session->setFlash(__('Project deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Project was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function admin_manage_projects() {
        $this->layout = "default_admin";
        $this->Project->recursive = 0;
        $this->set('projects', $this->paginate());
    }

    public function admin_portfolio_projects() {
        $this->layout = "default_admin";
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->request->data['Projects']['status_id'] != "") {
                $projects = $this->paginate(array('Project.project_status_id' => $this->request->data['Projects']['status_id']));
            } else {
                $projects = $this->paginate();
            }
        } else {
            $projects = $this->paginate();
        }
        $this->loadModel("ProjectStatus");
        $statuses = $this->ProjectStatus->find('list');
        $this->set(compact('statuses', 'projects'));
    }
    
    public function portfolio_projects() {
        $this->layout = "default_diretor";
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->request->data['Projects']['status_id'] != "") {
                $projects = $this->paginate(array('Project.project_status_id' => $this->request->data['Projects']['status_id']));
            } else {
                $projects = $this->paginate();
            }
        } else {
            $projects = $this->paginate();
        }
        $this->loadModel("ProjectStatus");
        $statuses = $this->ProjectStatus->find('list');
        $this->set(compact('statuses', 'projects'));
    }

    public function validate_project($projectId = null) {
        $this->layout = "default_diretor";
        //VERIFICA SE UM ID DE PROJETO FOI ENVIADO
        if ($projectId == null) {
            $this->Session->setFlash('<h3>Nenhum projeto encontrado.<h3>', 'default', array('class' => 'formee-msg-error message'));
            $this->redirect(array('action' => 'admin_validate_project_list'));
        }

        //VERIFICA SE A PROPOSTA EXISTE
        $this->Project->id = $projectId;
        if (!$this->Project->exists()) {
            $this->Session->setFlash('<h3>Nenhum projeto encontrado.<h3>', 'default', array('class' => 'formee-msg-error message'));
            $this->redirect(array('action' => 'admin_validate_project_list'));
        }
        //RECUPERA OS DADOS DO PROJETO
        $project = $this->Project->read(null, $id);
        
        //RECUPERA OS STATUS POSSÍVEIS PARA O DIRETOR
        $this->loadModel("ProjectStatus");
        $statuses = $this->ProjectStatus->find('list',array('conditions' => array(
            'ProjectStatus.id' => array(3,5)
        )));
        
        //RECUPERA AS AVALIAÇÕES DO PROJETO PELA COMISSAO
        $this->loadModel('ProjectsCommiteeMemberEvaluation');
        $projectEvaluations = $this->ProjectsCommiteeMemberEvaluation->find('all', array(
            'conditions' => array('project_id' => $projectId),
        ));
        
        $this->set(compact('statuses', 'project', 'projectEvaluations'));
    }

    public function validate_project_list() {
        $this->layout = "default_diretor";
        $this->Project->recursive = 0;
        $this->set('projects', $this->paginate(array('Project.project_status_id' => 2)));
    }

    public function evaluate($idProject = null) {
        $this->layout = "default_comissao";
        //CARREGA OS MODELOS ASSOCIADOS
        $this->loadModel('ProjectsCommiteeMemberEvaluation');
        $this->loadModel('MembersScoresByCriterium');
        
        if ($this->request->is('post')) {
             //RECUPERA O ID DA AVALIAÇÃO
            $avaliacao = $this->ProjectsCommiteeMemberEvaluation->find('first',array(
                'fields' => array('id'),
                'conditions' => array('project_id' => $this->request->data['ProjectsCommiteeMemberEvaluation']['project_id'], 'user_id' => $this->Auth->user('id')),
                'recursive' => -1
            ));
            $this->ProjectsCommiteeMemberEvaluation->id = $avaliacao['ProjectsCommiteeMemberEvaluation']['id'];
            //SETA A DATA DA AVALIACAO
            $date = date('Y-m-d H:i:s', time());
            $this->request->data['ProjectsCommiteeMemberEvaluation']['evaluation_date'] = $date;
            if ($this->ProjectsCommiteeMemberEvaluation->save($this->request->data)) {
                $evaluationId = $this->ProjectsCommiteeMemberEvaluation->id;
                //SALVA AS NOTAS DOS CRITÉRIOS
                if ($this->MembersScoresByCriterium->setMembersScoresByCriterium($evaluationId, $this->request->data)) {
                    $this->Session->setFlash('<h3>Avaliação efetuada com sucesso.<h3>', 'default', array('class' => 'formee-msg-success message'));
                    $this->redirect(array('controller' => 'proposals', 'action' => 'pending_proposals'));
                }
            }
                 
            
        }// FIM DO IF DO IS POST
        else { // ELSE DO IS POST
            if ($idProject == null) {
                $this->Session->setFlash('<h3>Nenhum projeto encontrado.<h3>', 'default', array('class' => 'formee-msg-error message'));
                $this->redirect(array('action' => 'index'));
            }
            //VERIFICA SE O PROJETO EXISTE
            $this->Project->id = $idProject;
            if (!$this->Project->exists()) {
                $this->Session->setFlash('<h3>Projeto inexistente.<h3>', 'default', array('class' => 'formee-msg-error message'));
                $this->redirect(array('action' => 'index'));
            }
            //VERIFICA SE O PROJETO JA FOI AVALIADO PELO PESQUISADOR LOGADO
            if ($this->Project->wasProjectEvaluated($idProject, $this->Auth->user('id'))) {
                $this->Session->setFlash('<h3>Projeto já avaliado.<h3>', 'default', array('class' => 'formee-msg-info message'));
                $this->redirect(array('action' => 'index'));
            }
            //encontra os criterios de avaliacao
            $this->loadModel("EvaluationCriterium");
            $criterios = $this->EvaluationCriterium->find('all', array(
                'conditions' => array(
                    'EvaluationCriterium.active' => 1),
                'fields' => array(
                    'EvaluationCriterium.id', 'EvaluationCriterium.description')
                    ));

            $projeto = $this->Project->find('first', array('conditions' => array('Project.id' => $idProject)));
            $uid = $this->Auth->user('id');
            $this->set(compact('criterios', 'projeto', 'uid'));
        }// FIM DO ELSE DO POST        
    }
    
    public function pending_projects() {
        $this->layout = "default_comissao";
        $this->set("projects", $this->Project->getUnratedProjects($this->Auth->user("id")));
    }
}
