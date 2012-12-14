<?php

App::uses('AppController', 'Controller');

/**
 * EvaluationCriteria Controller
 *
 * @property EvaluationCriterium $EvaluationCriterium
 */
class EvaluationCriteriaController extends AppController {

    public function admin_index() {
        $this->layout = "default_admin";
        $this->EvaluationCriterium->recursive = 0;
        $this->set('evaluationCriteria', $this->paginate());
    }

    public function admin_add() {
        $this->layout = "default_admin";
        if ($this->request->is('post')) {
            $this->EvaluationCriterium->create();
            if ($this->EvaluationCriterium->save($this->request->data)) {
                //trazer o peso total
                $pesoTotal = $this->EvaluationCriterium->getTotalWeight();
                //calcular a distribuicao: (soma total peso) / peso do criterio
                //soma da distribuicao deve ser 1
                
                if($this->EvaluationCriterium->calculateDistribution($pesoTotal)){
                    $this->Session->setFlash('<h3>Critério de avaliação salvo com sucesso.<h3>', 'default', array('class' => 'formee-msg-success message'));
                    $this->redirect(array('action' => 'index'));
                }else{
                    
                }
            } else {
                $this->Session->setFlash('<h3>Critério de avaliação não pôde ser salvo, tente mais tarde.<h3>', 'default', array('class' => 'formee-msg-error message'));
            }
        }
    }
    
    //EDITA O CRITÉRIO E CASO SEJA MARCADO COMO INATIVO, A DISTRIBUICAO É RECALCULADA.
    public function admin_edit($id = null) {
        $this->layout = "default_admin";
        $this->EvaluationCriterium->id = $id;
        
        if (!$this->EvaluationCriterium->exists()) {
            $this->Session->setFlash('<h3>Critério não encontrado.<h3>', 'default', array('class' => 'formee-msg-error message'));
            $this->redirect(array('action' => 'index'));
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->EvaluationCriterium->save($this->request->data)) {
                //trazer o peso total
                $pesoTotal = $this->EvaluationCriterium->getTotalWeight();
                
                 if($this->EvaluationCriterium->calculateDistribution($pesoTotal)){
                    $this->Session->setFlash('<h3>Critério de avaliação salvo!.<h3>', 'default', array('class' => 'formee-msg-success message'));
                    $this->redirect(array('action' => 'index'));
                }else{
                    $this->Session->setFlash('<h3>Erro ao calcular a distribuição, contacte o administrador so sistema.<h3>', 'default', array('class' => 'formee-msg-error message'));
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash('<h3>Critério de avaliação não salvo, tente novamente mais tarde.<h3>', 'default', array('class' => 'formee-msg-error message'));
            }
        } else {
            $this->request->data = $this->EvaluationCriterium->read(null, $id);
        }
    }

}
