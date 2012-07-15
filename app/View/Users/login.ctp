<h1>Login</h1>

<p>Please login using the form below.</p>
<?php 
echo $this->Form->create();
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end('Login');
?>
