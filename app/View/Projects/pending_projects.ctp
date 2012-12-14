<h1>Projetos Pendentes</h1>
<?php if (!empty($projects)) { ?>
<table cellpadding="0" cellspacing="0" class="fill" id="rounded-corner">
	<tr>
			<th>Nome do Projeto</th>
			<th>Enviada em</th>
                        <th>Por</th>
                        <th>Na área</th>
			<th class="actions"></th>
	</tr>
        <?php
	foreach ($projects as $pp): ?>
	<tr>
		
		<td><?php echo $pp['proposals']['Proposal.description']; ?></td>
		<td><?php echo $this->Time->format('d/m/Y G:i', $pp['projects']['Project.created']); ?>&nbsp;</td>
                <td><?php echo $pp['users']['User.name'] . " " . $pp['users']['User.surname']; ?></td>
                <td><?php echo $pp['areas']['Area.description']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Avaliar'), array('action' => 'evaluate', $pp['projects']['Project.id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php } else { ?>
    Nenhum projeto encontrado.
<?php } ?>