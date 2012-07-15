<h1>Create Your CakePHP Job Listing - Job Info</h1>
<?php
echo $this->Form->create('Job', array('id'=>'JobinfoForm'));
?>
<fieldset>
    <legend>Your Job Details</legend>
<?php
echo $this->Form->input('jobtype', array(
    'options'=>array(
        'Full-time'=>'Full-time', 'Part-time'=>'Part-time', 
        'Freelance'=>'Freelance', 'Contract'=>'Contract',
        'Internship'=>'Internship'
    ),
    'empty'=>'Select a Job Type',
    'label'=>'Job Type'
));
echo $this->Form->input('jobtitle', array('label'=>'*Job Title'));
echo $this->Form->input('joblocation', array('label'=>'*Job Location'));
echo $this->Form->input('companyname', array('label'=>'Your Company Name (optional)'));
echo $this->Form->input('companyurl', array('label'=>'Your Company URL (optional)'));
echo $this->Form->input('jobsalary', array('label'=>'Your Job\'s Salary (optional)'));
echo $this->Form->input('jobdesc', array('label'=>'*Job Description', 'class'=>'ckeditor'));
?>
</fieldset>
<fieldset>
    <legend>How To Apply</legend>
    <p>Instruct applicants how/where they should apply for this job.</p>
<?php
echo $this->Form->input('applyemail', array('label'=>'By Email (optional)'));
echo $this->Form->input('applyurl', array('label'=>'By URL (optional)'));
?>
</fieldset>
<?php
echo $this->Form->submit('Continue', array('div'=>false, 'class'=>'button'));
echo $this->Form->submit('Cancel', array('div'=>false, 'name'=>'Cancel', 'class'=>'button'));
echo $this->Form->end();
?>
<?php echo $this->Html->script('jquery-1.7'); ?>
	<?php echo $this->Html->script('wizard'); ?>
	<?php echo $this->Html->script('ckeditor/ckeditor'); ?>


