<?php

class AppController extends Controller {
    public $name = 'App';
    
    public $helpers = array(
        'Session',
        'Html',
        'Form',
        'Time',
        'Jobs',
        'Js'
    );
    
    public $components = array(
        'Security',
        'Session',
        'Auth'=>array(
			'loginRedirect'=>array('controller'=>'users', 'action'=>'index'), 
			'logoutRedirect'=>array('controller'=>'jobs', 'action'=>'index'),
			'authError'=>'You can\'t access that page',
			'authorize'=>array('Controller')
		)
    );
	
	public function isAuthorized($user) {
		return true;
	}
	
	public function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}
}
