<h1><?php echo $job['Job']['jobtitle']; ?></h1>

<hr />
<p>Job located in: <?php echo h($job['Job']['joblocation']); ?></p>
<p><?php echo $job['Job']['jobtype']; ?></p>
<p><?php echo date('M d, Y', strtotime($job['Job']['created'])); ?></p>
<hr />

<?php echo $job['Job']['jobdesc']; ?>

<?php echo $this->Jobs->howToApply($job['Job']['applyemail'], $job['Job']['applyurl']); ?>
