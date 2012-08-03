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
            <strong><?php echo $this->Html->link($job['Job']['jobtitle'], array('action'=>'view', $job['Job']['id'])); ?></strong>
            <?php echo (!empty($job['Job']['companyname'])) ? '<br />'.$job['Job']['companyname'] : '<br />Confidential'; ?>
        </td>
        <td>
            <?php echo $job['Job']['joblocation']; ?> 
            (<?php echo $job['Job']['jobtype']; ?>)
        </td>
    </tr>
    </span>
<?php endforeach; ?>
</table>
