<?php

App::uses('AppController', 'Controller');

class EvaluationGroupsController extends AppController {

    public function index() {
        $this->EvaluationGroup->recursive = 0;
        $this->set('evaluationGroups', $this->paginate());
    }

    public function view($id = null) {
        $this->EvaluationGroup->id = $id;
        if (!$this->EvaluationGroup->exists()) {
            throw new NotFoundException(__('Invalid evaluation group'));
        }
        $this->set('evaluationGroup', $this->EvaluationGroup->read(null, $id));
    }

    public function admin_add() {
        $this->layout = "default_admin";
        // coloca o numero do grupo hard coded
        $this->EvaluationGroup->id = 1;
        if (!$this->EvaluationGroup->exists()) {
            throw new NotFoundException(__('Invalid evaluation group'));
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            print_r($this->request->data);
            if ($this->EvaluationGroup->saveUsersToGroup($this->request->data, 1)) {
                $this->Session->setFlash('<h3>Grupo de avaliação salvo com sucesso.<h3>', 'default', array('class' => 'formee-msg-success message'));
                $this->redirect(array('action' => 'admin_add'));
            } else {
                $this->Session->setFlash('<h3>Não foi possível salvar o grupo de avaliação.<h3>', 'default', array('class' => 'formee-msg-error message'));
            }
        } else {
            $this->request->data = $this->EvaluationGroup->read(null, 1);
        }
        
        //RECUPERA OS DADOS DOS USUARIOS PARA MONTAR A LISTA
         $opts   = array(
            'fields'    => array('id', 'name'),
             'conditions' => array('User.group_id' => 3)
        );
        
        $this->loadModel('User');
         $users = $this->User->find('list', $opts);
        
        $group = $this->EvaluationGroup->getDefaultEvaluationGroup();
        $this->set(compact('users', 'group'));
    }

    public function edit($id = null) {
        $this->EvaluationGroup->id = $id;
        if (!$this->EvaluationGroup->exists()) {
            throw new NotFoundException(__('Invalid evaluation group'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->EvaluationGroup->save($this->request->data)) {
                $this->Session->setFlash(__('The evaluation group has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The evaluation group could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->EvaluationGroup->read(null, $id);
        }
        $users = $this->EvaluationGroup->User->find('list');
        $this->set(compact('users'));
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->EvaluationGroup->id = $id;
        if (!$this->EvaluationGroup->exists()) {
            throw new NotFoundException(__('Invalid evaluation group'));
        }
        if ($this->EvaluationGroup->delete()) {
            $this->Session->setFlash(__('Evaluation group deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Evaluation group was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
