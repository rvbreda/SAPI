<?php
App::uses('AppController', 'Controller');

class ConfigurationsController extends AppController {

	public function admin_index() {
		$this->Configuration->recursive = 0;
		$this->set('configurations', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->Configuration->id = $id;
		if (!$this->Configuration->exists()) {
			throw new NotFoundException(__('Invalid configuration'));
		}
		$this->set('configuration', $this->Configuration->read(null, $id));
	}
        
	public function admin_add() {
                $this->layout = "default_admin";
		if ($this->request->is('post')) {
			$this->Configuration->create();
			if ($this->Configuration->save($this->request->data)) {
				$this->Session->setFlash(__('The configuration has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configuration could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit() {
            $this->layout = "default_admin";
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Configuration->save($this->request->data)) {
				$this->Session->setFlash(__('The configuration has been saved'));
				$this->redirect(array('action' => 'edit'));
			} else {
				$this->Session->setFlash(__('The configuration could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Configuration->find('first');
		}
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Configuration->id = $id;
		if (!$this->Configuration->exists()) {
			throw new NotFoundException(__('Invalid configuration'));
		}
		if ($this->Configuration->delete()) {
			$this->Session->setFlash(__('Configuration deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Configuration was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
