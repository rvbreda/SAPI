<div class="evaluationGroups index">
	<h2><?php echo __('Evaluation Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('default');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($evaluationGroups as $evaluationGroup): ?>
	<tr>
		<td><?php echo h($evaluationGroup['EvaluationGroup']['id']); ?>&nbsp;</td>
		<td><?php echo h($evaluationGroup['EvaluationGroup']['description']); ?>&nbsp;</td>
		<td><?php echo h($evaluationGroup['EvaluationGroup']['default']); ?>&nbsp;</td>
		<td><?php echo h($evaluationGroup['EvaluationGroup']['created']); ?>&nbsp;</td>
		<td><?php echo h($evaluationGroup['EvaluationGroup']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evaluationGroup['EvaluationGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evaluationGroup['EvaluationGroup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evaluationGroup['EvaluationGroup']['id']), null, __('Are you sure you want to delete # %s?', $evaluationGroup['EvaluationGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Evaluation Group'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
