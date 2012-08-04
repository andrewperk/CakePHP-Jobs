<h1>Developers Profiles</h1>

<table id="devs">
<tr>
    <th>Name</th>
    <th>Experience</th>
    <th>Location</th>
    <th>Actions</th>
</tr>
<?php foreach($users as $user): ?>
	<span class="dev">
    <tr>
        <td><?php echo h($user['User']['firstname']); ?> <?php echo h($user['User']['lastname']); ?></td>
        <td><?php echo h($user['User']['experience']); ?> years</td>
        <td>
            <?php echo h($user['User']['country']); ?> 
        </td>
        <td>
        	<?php echo $this->Html->link('View Profile', array('controller'=>'users', 'action'=>'view', h($user['User']['id']))); ?>
        </td>
    </tr>
    </span>
<?php endforeach; ?>
</table>
