<div class="evaluationGroups form">
<?php echo $this->Form->create('EvaluationGroup');?>
	<fieldset>
		<legend><?php echo __('Edit Evaluation Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
		echo $this->Form->input('default');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('ENVIAR'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EvaluationGroup.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EvaluationGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluation Groups'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
