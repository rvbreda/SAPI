<div class="areas view">
<h2><?php  echo __('Area');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($area['Area']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($area['Area']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($area['Area']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Area'), array('action' => 'edit', $area['Area']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Area'), array('action' => 'delete', $area['Area']['id']), null, __('Are you sure you want to delete # %s?', $area['Area']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proposals'), array('controller' => 'proposals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proposal'), array('controller' => 'proposals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Proposals');?></h3>
	<?php if (!empty($area['Proposal'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Area Id'); ?></th>
		<th><?php echo __('Proposal'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($area['Proposal'] as $proposal): ?>
		<tr>
			<td><?php echo $proposal['id'];?></td>
			<td><?php echo $proposal['user_id'];?></td>
			<td><?php echo $proposal['area_id'];?></td>
			<td><?php echo $proposal['proposal'];?></td>
			<td><?php echo $proposal['created'];?></td>
			<td><?php echo $proposal['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'proposals', 'action' => 'view', $proposal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'proposals', 'action' => 'edit', $proposal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'proposals', 'action' => 'delete', $proposal['id']), null, __('Are you sure you want to delete # %s?', $proposal['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Proposal'), array('controller' => 'proposals', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
