<div class="projects form">
<?php echo $this->Form->create('Project'); ?>
	<fieldset>
		<legend><?php echo __('Edit Project'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('proposal_id');
		echo $this->Form->input('project_status_id');
		echo $this->Form->input('teacher_name_coparticipant');
		echo $this->Form->input('objectives');
		echo $this->Form->input('ethics_committee_name');
		echo $this->Form->input('ethics_committee_protocol');
		echo $this->Form->input('executive_summary');
		echo $this->Form->input('justification');
		echo $this->Form->input('methodology');
		echo $this->Form->input('expected_results');
		echo $this->Form->input('goals');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('specification');
		echo $this->Form->input('execution_plan');
	?>
	</fieldset>
<?php echo $this->Form->end(__('ENVIAR')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Project.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Project.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?></li>
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
