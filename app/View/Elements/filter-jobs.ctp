<div id="filter-jobs">
    <h3>Filter Jobs</h3>
    <?php echo $this->Form->create('Job', array('url'=>array_merge(array('controller'=>'jobs', 'action'=>'index'), $this->params['pass']))); ?>
    <?php //echo $this->Form->input('jobtype', array('label'=>'Job Type')); ?>
    <?php echo $this->Form->input('jobtype', 
        array(
            'type'=>'select', 
            'options'=>
                array(
                	''=>'',
                    'Full-time'=>'Full-time',
                    'Part-time'=>'Part-time',
                    'Freelance'=>'Freelance',
                    'Contract'=>'Contract',
                    'Internship'=>'Internship'
                    ),
            'label'=>'by job type')); ?>
    <?php echo $this->Form->input('joblocation', array('label'=>'by location')); ?>
    <?php echo $this->Form->input('jobtitle', array('label'=>'by job title')); ?>
    <?php echo $this->Form->input('companyname', array('label'=>'by company')); ?>
    <?php echo $this->Form->submit('Filter', array('div'=>false, 'class'=>'button')); ?>
    <?php echo $this->Html->link('Reset', array('controller'=>'jobs', 'action'=>'index'), array('class'=>'button')); ?>
    <?php echo $this->Form->end(); ?>
</div>

