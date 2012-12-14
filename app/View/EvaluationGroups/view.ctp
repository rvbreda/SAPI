<div class="evaluationGroups view">
<h2><?php  echo __('Evaluation Group');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($evaluationGroup['EvaluationGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($evaluationGroup['EvaluationGroup']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Default'); ?></dt>
		<dd>
			<?php echo h($evaluationGroup['EvaluationGroup']['default']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($evaluationGroup['EvaluationGroup']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($evaluationGroup['EvaluationGroup']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Evaluation Group'), array('action' => 'edit', $evaluationGroup['EvaluationGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Evaluation Group'), array('action' => 'delete', $evaluationGroup['EvaluationGroup']['id']), null, __('Are you sure you want to delete # %s?', $evaluationGroup['EvaluationGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluation Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users');?></h3>
	<?php if (!empty($evaluationGroup['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Surname'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('CPF'); ?></th>
		<th><?php echo __('CpfEmailConfirm'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($evaluationGroup['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['group_id'];?></td>
			<td><?php echo $user['name'];?></td>
			<td><?php echo $user['surname'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['CPF'];?></td>
			<td><?php echo $user['cpfEmailConfirm'];?></td>
			<td><?php echo $user['created'];?></td>
			<td><?php echo $user['modified'];?></td>
			<td><?php echo $user['active'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
