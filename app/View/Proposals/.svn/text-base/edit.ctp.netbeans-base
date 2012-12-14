<div class="proposals form">
<?php echo $this->Form->create('Proposal');?>
	<fieldset>
		<legend><?php echo __('Edit Proposal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('area_id');
		echo $this->Form->input('proposal');
	?>
	</fieldset>
<?php echo $this->Form->end(__('ENVIAR'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Proposal.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Proposal.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Proposals'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
	</ul>
</div>
