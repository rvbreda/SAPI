<?php

App::uses('AppController', 'Controller');

/**
 * Proposals Controller
 *
 * @property Proposal $Proposal
 */
class ProposalsController extends AppController {

    public function index() {
        $this->set('title_for_layout', 'SAPI - Minhas propostas');
        $this->layout = 'default_pesquisador';
        $this->Proposal->recursive = 0;
        
        $proposals = $this->paginate(array('Proposal.user_id' => $this->Auth->user("id")));
        
        for ($index = 0; $index < count($proposals); $index++) {
            $proposals[$index]['Proposal']['percentage'] = $this->Proposal->getEvaluationPercentage($proposals[$index]['Proposal']['id']);
        }
        
        $this->set('proposals', $proposals);
    }
    
    public function view($id = null) {
        $this->set('title_for_layout', 'SAPI - Visualizar proposta');
        $this->layout = 'default_pesquisador';
        $this->Proposal->id = $id;
        if (!$this->Proposal->exists()) {
            $this->Session->setFlash('<h3>Proposta não encontrada.<h3>', 'default', array('class' => 'formee-msg-error message'));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('proposal', $this->Proposal->read(null, $id));
    }
    
    public function resend($proposalId = null){
        $this->set('title_for_layout', 'SAPI - Reenviar proposta de projeto');
        $this->layout = 'default_pesquisador';
        if ($proposalId == null) {
                $this->Session->setFlash('<h3>Proposta não encontrada.<h3>', 'default', array('class' => 'formee-msg-error message'));
                $this->redirect(array('action' => 'index'));
        }
        //VERIFICA SE A PROPOSTA É MARCADA COMO REANÁLISE
        $this->Proposal->recursive = 0;
        $proposal = $this->Proposal->read(null, $proposalId);
        
        if ($proposal['Proposal']['evaluation'] != 'REANALISE') {
                $this->Session->setFlash('<h3>Proposta não pode ser reenviada.<h3>', 'default', array('class' => 'formee-msg-error message'));
                $this->redirect(array('action' => 'index'));
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Proposal->create();
            if ($this->Proposal->save($this->request->data)) {
                //Salva no banco o relacionamento entre o grupo padrao de avaliadores
                //e a proposta submetida. Caso falhe, efetua um "rollback" manual
                $idProposal = $this->Proposal->id;
                //carrega o modelo
                $this->loadModel("EvaluationGroup");
                //para a proposta criada, associa  o grupo de avaliadores.
                if ($this->EvaluationGroup->addDefaultEvaluationGroupToProposal($idProposal)) {
                   //ENVIA E-MAIL PARA A COMISSAO
                    $configuration = array('idPropOrProj' => $idProposal, 'subject' => 'Proposta Enviada', 'tplemail' => 'newproposal', 'projectname' => '');
                    $this->EvaluationGroup->sendMailToEvaluationGroup($configuration);
                    $this->Session->setFlash('<h3>Proposta enviada com sucesso.<h3>', 'default', array('class' => 'formee-msg-success message'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    // caso não tenha salvo o grupo padrão, remove a proposta
                    $this->Proposal->delete();
                    $this->Session->setFlash('<h3>Erro ao salvar sua proposta. "Grupo padrão não pode ser salvo."<h3>', 'default', array('class' => 'formee-msg-error message'));
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash('<h3>Erro ao salvar sua proposta. Tente novamente mais tarde.<h3>', 'default', array('class' => 'formee-msg-error message'));
                $this->redirect(array('action' => 'index'));
            }
        }
        
        $areas = $this->Proposal->Area->find('list');
        $avaliacoes = $this->Proposal->getProposalTextEvaluation($proposalId);
        $this->set(compact('proposalId', 'proposal', 'areas', 'avaliacoes'));
    }
    
    public function add() {
        $this->set('title_for_layout', 'SAPI - Submeter nova proposta');
        $this->layout = 'default_pesquisador';
        if ($this->request->is('post')) {
            $this->Proposal->create();
            if ($this->Proposal->save($this->request->data)) {
                //Salva no banco o relacionamento entre o grupo padrao de avaliadores
                //e a proposta submetida. Caso falhe, efetua um "rollback" manual
                $idProposal = $this->Proposal->id;
                //carrega o modelo
                $this->loadModel("EvaluationGroup");
                //para a proposta criada, associa  o grupo de avaliadores.
                if ($this->EvaluationGroup->addDefaultEvaluationGroupToProposal($idProposal)) {
                   //ENVIA E-MAIL PARA A COMISSAO
                    $configuration = array('idPropOrProj' => $idProposal, 'subject' => 'Proposta Enviada', 'tplemail' => 'newproposal', 'projectname' => '');
                    $this->EvaluationGroup->sendMailToEvaluationGroup($configuration);
                    $this->Session->setFlash('<h3>Proposta enviada com sucesso.<h3>', 'default', array('class' => 'formee-msg-success message'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    // caso não tenha salvo o grupo padrão, remove a proposta
                    $this->Proposal->delete();
                    $this->Session->setFlash('<h3>Erro ao salvar sua proposta. "Grupo padrão não pode ser salvo."<h3>', 'default', array('class' => 'formee-msg-error message'));
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash('<h3>Erro ao salvar sua proposta. Tente novamente mais tarde.<h3>', 'default', array('class' => 'formee-msg-error message'));
                $this->redirect(array('action' => 'index'));
            }
        }
        $areas = $this->Proposal->Area->find('list');
        $this->set(compact('areas'));
    }

    public function edit($id = null) {
        $this->Proposal->id = $id;
        if (!$this->Proposal->exists()) {
            throw new NotFoundException(__('Invalid proposal'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Proposal->save($this->request->data)) {
                $this->Session->setFlash(__('The proposal has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The proposal could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Proposal->read(null, $id);
        }
        $users = $this->Proposal->User->find('list');
        $areas = $this->Proposal->Area->find('list');
        $this->set(compact('users', 'areas'));
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Proposal->id = $id;
        if (!$this->Proposal->exists()) {
            throw new NotFoundException(__('Invalid proposal'));
        }
        if ($this->Proposal->delete()) {
            $this->Session->setFlash(__('Proposal deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Proposal was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function pending_proposals() {
        $this->layout = "default_comissao";
        $this->set("pp", $this->Proposal->getUnratedProposals($this->Auth->user("id")));
    }

    public function view_for_evaluate($id = null){
        $this->layout = "default_comissao"; 
        $this->set('title_for_layout','Avaliação de proposta');
        $this->Proposal->id = $id;
        if (!$this->Proposal->exists()) {
            $this->Session->setFlash(__('Proposta não encontrada'));
            $this->redirect($this->referer());
        }
        
        if($this->Proposal->isProposalEvaluatedByMe($id, $this->Auth->user("id"))){
            $this->Session->setFlash('<h3>Proposta já avaliada.<h3>', 'default', array('class' => 'formee-msg-info message'));
            $this->redirect(array('action' => 'pending_proposals'));
        }
                
        
        $this->set('proposal', $this->Proposal->getProposalForEvaluation($id));
    }
    
    public function evaluate() {
        
        if ($this->request->is('post') || $this->request->is('put')) {  
            if($this->Proposal->setTextEvaluationForProposal($this->request->data))
            {
                $this->Session->setFlash('<h3>Proposta avaliada.<h3>', 'default', array('class' => 'formee-msg-success message'));
              $this->redirect( array('action' => 'pending_proposals'));
           }
        }
    }
    
    public function evaluate_reproposal($proposalFatherId = null){
        $this->layout = "default_pesquisador";
    }
}
