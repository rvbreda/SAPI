<h1>Propostas Pendentes</h1>
<?php if (!empty($pp)) { ?>
<table cellpadding="0" cellspacing="0" id="rounded-corner">
	<tr>
			<th>ID</th>
			<th>Nome do Projeto</th>
			<th>Enviada em</th>
                        <th>Por</th>
                        <th>Na área</th>
			<th class="actions"></th>
	</tr>
        <?php
	foreach ($pp as $proposal): ?>
	<tr>
		<td><?php echo h($proposal['p']['id']); ?>&nbsp;</td>
		<td><?php echo $proposal['p']['description']; ?></td>
		<td><?php echo $proposal['p']['created']; ?></td>
                <td><?php echo $proposal['u']['name'] . " " . $proposal['u']['surname']; ?></td>
                <td><?php echo $proposal['a']['description']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Avaliar'), array('action' => 'view_for_evaluate', $proposal['p']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php } else { ?>
    Nenhuma proposta encontrada
<?php } ?>
