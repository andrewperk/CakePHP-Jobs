<h1>Create Your Developer Profile</h1>

<p>Create your own developer profile below to allow potential employers to locate you.</p>

<?php
echo $this->Form->create();
echo $this->Form->input('email', array('label'=>'*Email'));
echo $this->Form->input('username', array('label'=>'*Username'));
echo $this->Form->input('password', array('label'=>'*Password'));
echo $this->Form->input('password_confirmation', array('label'=>'*Confirm Password', 'type'=>'password'));
echo $this->Form->input('firstname', array('label'=>'*First Name'));
echo $this->Form->input('lastname', array('label'=>'*Last Name'));
echo $this->Form->input('skills', array('label'=>'*Skillset (your strengths)', 'class'=>'ckeditor'));
echo $this->Form->input('experience', array('label'=>'*Years of Experience'));
echo $this->Form->input('country', array('label'=>'*Country'));
echo $this->Form->end('Create Profile');
?>