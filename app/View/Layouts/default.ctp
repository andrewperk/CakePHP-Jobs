<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        
		echo $this->Html->css(array(
		    'reset','main'
	    ));

		echo $scripts_for_layout;
	?>
	<?php echo $this->Html->script('jquery-1.7'); ?>
	<?php echo $this->Html->script('wizard'); ?>
	<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link('CakePHP Jobs', array('controller'=>'jobs', 'action'=>'index')); ?></h1>
		</div>
		<div id="nav">
			<ul>
				<?php if (AuthComponent::user()): ?>
					<li><?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout')); ?></li>
					<li><?php echo $this->Html->link('Edit Profile', array('controller'=>'users', 'action'=>'edit')); ?></li>
					<li><?php echo $this->Html->link('View Profile', array('controller'=>'users', 'action'=>'view', AuthComponent::user('id'))); ?></li>
				<?php else: ?>
					<li><?php echo $this->Html->link('Developer Profiles', array('controller'=>'developers', 'action'=>'index')); ?></li>
				<?php endif; ?>
				<li><?php echo $this->Html->link('Contact', array('controller'=>'pages', 'action'=>'display', 'contact')); ?></li>
				<li><?php echo $this->Html->link('Jobs', array('controller'=>'jobs', 'action'=>'index')); ?></li>
			</ul>
		</div>
		<div id="main">
			<div id="content">
	
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Session->flash('auth'); ?>
	
				<?php echo $content_for_layout; ?>
	
			</div>
		</div>
		<div id="sidebar">
		    <?php 
		    // Display the Wizard Progress bar only on Wizard pages.
		    if ($this->params['controller'] == 'jobs' && $this->action == 'wizard'): ?>
                <div id="wizard">
                	<?php  echo $this->Wizard->progressMenu(array('personalinfo'=>'Personal Info', 'jobinfo'=>'Job Info', 'review'=>'Review')); ?>
                </div>
            <?php 
            // Else display Post a Job Link on all other pages.
            else: ?>
                <?php echo $this->Html->link('Post a Job', array('controller'=>'jobs', 'action'=>'wizard'), array('id'=>'post-job')); ?>
            <?php endif; ?>
            
            <?php
            // If on developers pages display login and search developers filters
            if ($this->params['controller'] == 'users'): ?>
            	<?php if (AuthComponent::user()): ?>
            		<p>You are logged in as <?php echo AuthComponent::user('username'); ?>. </p>
        		<?php else: ?>
	            	<p>Developers can <?php echo $this->Html->link('create a profile', array('controller'=>'users', 'action'=>'add')); ?> 
	            		or <?php echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login')); ?> here</p>
        		<?php endif; ?>
            <?php endif; ?>
	        <?php 
            // Display job filter options on jobs index page.
	        if ($this->params['controller'] == 'jobs' && $this->action == 'index'): ?>
	            <?php echo $this->element('filter-jobs'); ?>
		    <?php endif; ?>
		</div>

		<div id="footer">
			&copy; Cakephp Jobs <?php echo date('Y'); ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>

</body>
</html>
