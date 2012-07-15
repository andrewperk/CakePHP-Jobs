<h1>Create Your CakePHP Job Listing - Personal Info</h1>
<?php echo $this->Form->create('Job', array('id'=>'PersonalinfoForm')); ?>
<fieldset>
    <legend>Your Personal Information</legend>
<?php
echo $this->Form->input('firstname', array('label'=>'*First Name'));
echo $this->Form->input('lastname', array('label'=>'*Last Name'));
echo $this->Form->input('email', array('label'=>'*Email Address'));
echo $this->Form->input('phone', array('label'=>'*Phone Number'));
?>
</fieldset>
<?php
echo $this->Form->submit('Continue', array('div'=>false, 'class'=>'button'));
echo $this->Form->submit('Cancel', array('div'=>false, 'name'=>'Cancel', 'class'=>'button'));
echo $this->Form->end();
?>

