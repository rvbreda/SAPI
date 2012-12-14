<div class="grid_12">
    <h1>Administrar projetos.</h1>
</div>
<table cellpadding="0" cellspacing="0" id="rounded-corner">
    <tr>
        <th><?php echo $this->Paginator->sort('Proposal.description', 'Nome do projeto'); ?></th>
        <th><?php echo $this->Paginator->sort('ProjectStatus.status_name', 'Status'); ?></th>
        <th><?php echo $this->Paginator->sort('created', 'Data de envio'); ?></th>
        <th class="actions"><?php echo __('Ações'); ?></th>
    </tr>
    <?php foreach ($projects as $project): ?>
        <tr>
            <td>
                <?php echo $project['Proposal']['description']; ?>
            </td>
            <td>
                <?php echo $project['ProjectStatus']['status_name']; ?>
            </td>
            <td><?php echo $this->Time->format('d/m/Y h:m A', h($project['Project']['created'])); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('Visualizar'), array('action' => 'admin_view', $project['Project']['id'])); ?>
                <?php echo $this->Form->postLink(__('Concluir'), array('action' => 'admin_set_concluded', $project['Project']['id']), null, __('Você deseja marcar este projeto como concluído?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} ao total, iniciando no registro {:start}, e terminando {:end}')
    ));
    ?>	</p>

<div class="paging">
    <?php
    echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
    echo " ";
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('próximo') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
</div>

<script type="text/javascript">
    $('.proj_administrar').addClass('active');
    $('.proj_administrar').siblings().removeClass('active');
</script>