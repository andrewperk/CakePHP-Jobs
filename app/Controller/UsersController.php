<?php

class UsersController extends AppController {
	public $name = 'Users';
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		// Auth
		$this->Auth->allow('add', 'view');
	}
	
	public function login() {
		$this->set('title_for_layout', 'Login');
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Your username or password were incorrect');
			}
		}
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	public function index() {
		$this->set('users', $this->User->find('all'));
		$this->set('title_for_layout', 'Developers');
	}
	
	public function view($id = null) {
		$this->User->id = $id;
		$this->set('user', $this->User->read());
		$this->set('title_for_layout', 'Developer');
	}
	
	public function add() {
		$this->set('title_for_layout', 'Create Developer Profile');
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Your developer profile was created');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The following errors occurred:');
			}
		}
	}
	
	public function edit() {
		$this->set('title_for_layout', 'Edit Developer Profile');
		$this->User->id = $this->Auth->user('id');
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Your profile has been updated');
				$this->redirect(array('action'=>'view', $this->Auth->user('id')));
			} else {
				$this->Session->setFlash('The following errors occurred:');
			}
		} else {
			$this->request->data = $this->User->read();
		}
	}
}
