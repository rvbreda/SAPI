<div class="projects index">
	<h2><?php echo __('Projects'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('proposal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('teacher_name_coparticipant'); ?></th>
			<th><?php echo $this->Paginator->sort('objectives'); ?></th>
			<th><?php echo $this->Paginator->sort('ethics_committee_name'); ?></th>
			<th><?php echo $this->Paginator->sort('ethics_committee_protocol'); ?></th>
			<th><?php echo $this->Paginator->sort('executive_summary'); ?></th>
			<th><?php echo $this->Paginator->sort('justification'); ?></th>
			<th><?php echo $this->Paginator->sort('methodology'); ?></th>
			<th><?php echo $this->Paginator->sort('expected_results'); ?></th>
			<th><?php echo $this->Paginator->sort('goals'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('specification'); ?></th>
			<th><?php echo $this->Paginator->sort('execution_plan'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($projects as $project): ?>
	<tr>
		<td><?php echo h($project['Project']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($project['Proposal']['id'], array('controller' => 'proposals', 'action' => 'view', $project['Proposal']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($project['ProjectStatus']['id'], array('controller' => 'project_statuses', 'action' => 'view', $project['ProjectStatus']['id'])); ?>
		</td>
		<td><?php echo h($project['Project']['teacher_name_coparticipant']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['objectives']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['ethics_committee_name']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['ethics_committee_protocol']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['executive_summary']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['justification']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['methodology']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['expected_results']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['goals']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['specification']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['execution_plan']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $project['Project']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Proposals'), array('controller' => 'proposals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proposal'), array('controller' => 'proposals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Statuses'), array('controller' => 'project_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Status'), array('controller' => 'project_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Financial Resources'), array('controller' => 'financial_resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Financial Resource'), array('controller' => 'financial_resources', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inscer Resources'), array('controller' => 'inscer_resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inscer Resource'), array('controller' => 'inscer_resources', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Researchers Trainings'), array('controller' => 'researchers_trainings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Researchers Training'), array('controller' => 'researchers_trainings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Technical Teams'), array('controller' => 'technical_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Technical Team'), array('controller' => 'technical_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
