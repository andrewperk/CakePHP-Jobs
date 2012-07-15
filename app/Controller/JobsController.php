<?php

class JobsController extends AppController {
    public $name = 'Jobs';
    
    public $components = array(
        'Wizard.Wizard',
        'Search.Prg'
    );
    
    public $presetVars = array(
        array('field'=>'jobtype', 'type'=>'like'),
        array('field'=>'joblocation', 'type'=>'like'),
        array('field'=>'jobtitle', 'type'=>'like'),
        array('field'=>'companyname', 'type'=>'like')
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
		
		// Wizard
        $this->Wizard->steps = array('personalinfo', 'jobinfo', 'review');
        $this->Wizard->completeURL = array('controller'=>'jobs', 'action'=>'success');
        if ($this->action == 'wizard' && $this->request->params['pass'][0] == 'review') {
            $job = $this->recombineWizardData();
            $this->set(compact('job'));
        }
		
		// Auth
		$this->Auth->allow('wizard');
    }
    
    /**
     * Form Wizard main action
     */
    public function wizard($step = null) {
        $this->Wizard->process($step);
    }
    
    /**
     * Form Wizard callbacks (steps)
     */
     
    /**
     * First Step
     */
    public function _processPersonalinfo() {
        $this->checkForCancel();
        $this->Job->set($this->request->data);
        if ($this->Job->validates()) {
            return true;
        }
		$this->Session->setFlash('The following errors occurred');
        return false;
    }
    
    /**
     * Second Step
     */
    public function _processJobinfo() {
        $this->checkForCancel();
        $this->Job->set($this->request->data);
        if ($this->Job->validates()) {
            return true;
        }
		$this->Session->setFlash('The following errors occurred');
        return false;
    }
    
    /**
     * Third Step
     */
    public function _processReview() {
        $this->checkForCancel();
		
		$this->Session->setFlash('Your job has been posted');
        return true;
    }
    
    /**
     * What happens after completion of wizard.
     */
    public function _afterComplete() {
        $this->Job->save($this->recombineWizardData());
    }
    
    public function index() {
        $title_for_layout = 'Cakephp Jobs - Listings';

        $this->Prg->commonProcess();
        
        $filter_conditions = $this->Job->parseCriteria($this->passedArgs);
        $my_conditions = array(
            'created >='=>date('Y-m-d', strtotime('-30 days'))
        );
        
        $conditions = array_merge($my_conditions, $filter_conditions);
        
        $jobs = $this->Job->find('all', array(
            'conditions'=>$conditions,
            'order'=>'created DESC'
        ));
        $this->set(compact('title_for_layout', 'jobs'));
    }
    
    public function add() {
        if ($this->request->is('post')) {
            if ($this->Job->save($this->request->data)) {
                $this->redirect(array('controller'=>'jobs', 'action'=>'success'));
            } else {
                $this->Session->setFlash('Please correct the errors highlighted below:');
            }
        }
        $title_for_layout = 'Cakephp Jobs - Post a New Cakephp Job';
        $this->set(compact('title_for_layout'));
    }
    
    public function view($id = NULL) {
        $this->Job->id = $id;
        if (!$this->Job->exists()) {
            $this->Session->setFlash('Invalid job listing');
            $this->redirect(array('action'=>'index'));
        }
        
        $job = $this->Job->read();
        
        // Check if the job's date is 30 days old
        if (strtotime($job['Job']['created']) <= strtotime(date('Y-m-d', strtotime('-30 days')))) {
            $this->Session->setFlash('That job listing has expired.');
            $this->redirect(array('action'=>'index'));
        }
        $title_for_layout = "Cakephp Jobs - ".$job['Job']['jobtitle'];
        $this->set(compact('job', 'title_for_layout'));
    }
    
    public function success() {
        $title_for_layout = 'Thank you - Job Listing Added Successfully.';
        $this->set(compact('title_for_layout'));
    }
    
    /**
     * Grabs wizard data and combines the data from all steps into one 
     * array to be used for submission to the database or output.
     *
     * @return array The wizard data combined
     */
    private function recombineWizardData() {
        $wizard_data = $this->Wizard->read();
        $job = array_merge($wizard_data['personalinfo']['Job'], $wizard_data['jobinfo']['Job']);
        $job = array('Job'=>$job);
        return $job;
    }
    
    /**
     * Checks if user wants to cancel the wizard.
     *
     * If they hit cancel submit button, clears session, resets wizard, 
     * and redirects to jobs index page.
     */
    private function checkForCancel() {
        if (!empty($this->request->data['Cancel'])) {
            $this->Wizard->resetWizard();
            $this->redirect(array('controller'=>'jobs', 'action'=>'index'));
        }
    }
}
