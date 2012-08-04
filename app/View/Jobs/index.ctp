<h1>Job Listings</h1>

<table id="jobs">
<tr>
    <th>Posted</th>
    <th>Job Info</th>
    <th>Location</th>
</tr>
<?php foreach($jobs as $job): ?>
	<span class="job">
    <tr>
        <td><?php echo date('M d', strtotime($job['Job']['created'])); ?></td>
        <td>
            <strong><?php echo $this->Html->link(h($job['Job']['jobtitle']), array('action'=>'view', h($job['Job']['id']))); ?></strong>
            <?php echo (!empty($job['Job']['companyname'])) ? '<br />'.h($job['Job']['companyname']) : '<br />Confidential'; ?>
        </td>
        <td>
            <?php echo h($job['Job']['joblocation']); ?> 
            (<?php echo h($job['Job']['jobtype']); ?>)
        </td>
    </tr>
    </span>
<?php endforeach; ?>
</table>
