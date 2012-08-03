<h1>Edit Your Developer Profile</h1>

<p>You can make changes to your developer profile below.</p>

<?php
echo $this->Form->create();
echo $this->Form->input('email');
echo $this->Form->input('username');
echo $this->Form->input('firstname', array('label'=>'First Name'));
echo $this->Form->input('lastname', array('label'=>'Last Name'));
echo $this->Form->input('skills', array('label'=>'Skillset (your strengths)', 'class'=>'ckeditor'));
echo $this->Form->input('experience', array('label'=>'Years of Experience'));
echo $this->Form->input('country');
echo $this->Form->end('Update Profile');
?>
