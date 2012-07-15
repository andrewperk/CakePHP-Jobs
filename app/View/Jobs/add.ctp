<h1>Create Your Cakephp Job Listing</h1>
<?php echo $this->Form->create('Job'); ?>
<fieldset>
    <legend>Your Personal Information</legend>
<?php
echo $this->Form->input('firstname', array('label'=>'First Name'));
echo $this->Form->input('lastname', array('label'=>'Last Name'));
echo $this->Form->input('email', array('label'=>'Email Address'));
echo $this->Form->input('phone', array('label'=>'Phone Number'));
?>
</fieldset>
<fieldset>
    <legend>Your Job Details</legend>
<?php
echo $this->Form->input('jobtype', array(
    'options'=>array(
        'fulltime'=>'Full Time', 'parttime'=>'Part Time', 
        'freelance'=>'Freelance', 'contract'=>'Contract',
        'internship'=>'Internship'
    ),
    'empty'=>'Select a Job Type',
    'label'=>'Job Type'
));
echo $this->Form->input('jobtitle', array('label'=>'Job Title'));
echo $this->Form->input('joblocation', array('label'=>'Job Location'));
echo $this->Form->input('companyname', array('label'=>'Your Company Name (optional)'));
echo $this->Form->input('companyurl', array('label'=>'Your Company URL (optional)'));
echo $this->Form->input('jobsalary', array('label'=>'Your Job\'s Salary (optional)'));
echo $this->Form->input('jobdesc', array('label'=>'Job Description', 'class'=>'ckeditor'));
?>
</fieldset>
<fieldset>
    <legend>How To Apply</legend>
    <p>Instruct applicants how/where they should apply for this job.</p>
<?php
echo $this->Form->input('applyemail', array('label'=>'By Email (optional)'));
echo $this->Form->input('applyurl', array('label'=>'By URL (optional)'));
echo $this->Form->input('created');
?>
</fieldset>
<?php echo $this->Form->end('Submit Job'); ?>

<?php echo $this->Html->script('jquery-1.7'); ?>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
