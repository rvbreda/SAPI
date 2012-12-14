<div class="grid_12">
    <h1>Minhas propostas submetidas</h1>
</div>
<div class="proposals index">
    <table class="fill" cellpadding="0" cellspacing="0" id="rounded-corner">
        <tr>
            <th>ID</th>
            <th>Área</th>
            <th>Descrição</th>
            <th>Enviada em</th>
            <th>Percentual Avaliado</th>
            <th>Avaliação</th>
            <th>Ações</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($proposals as $proposal): ?>
            <tr>
                <td><?php echo h($proposal['Proposal']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $proposal['Area']['description']; ?>
                </td>
                <td><?php echo h($proposal['Proposal']['description']); ?>&nbsp;</td>
                <td><?php echo $this->Time->format('d/m/Y G:i', h($proposal['Proposal']['created'])); ?>&nbsp;</td>
                <td><div title="<?php echo $proposal['Proposal']['percentage'] ?>%" class="progressbar" style="height: 17px;" rel="<?php echo $proposal['Proposal']['percentage'] ?>"></div></td>
                <td><?php echo h($proposal['Proposal']['evaluation']); ?>&nbsp;</td>
                <td>
                    <?php
                    echo $this->Html->link(__('Ver'), array('action' => 'view', $proposal['Proposal']['id']));
                    ?>
                </td>
                <td>
                    <?php
                    if ($proposal['Proposal']['evaluation'] == 'APROVADA') {
                        echo $this->Html->link('Enviar projeto', array('controller' => 'projects', 'action' => 'add', $proposal['Proposal']['id']));
                    }
                    if ($proposal['Proposal']['evaluation'] == 'REANALISE') {
                        echo $this->Html->link('Reenviar proposta', array('controller' => 'proposals', 'action' => 'resend', $proposal['Proposal']['id']));
                    }
                    ?>
                </td>
            </tr>   
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} , iniciando no registro {:start}, terminando em {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
        echo "&nbsp";
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('próximo') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<script type="text/javascript">
    $('.prop_submetidas').addClass('active');
    $('.prop_submetidas').siblings().removeClass('active');
    
    $("div.progressbar").each (function () {
        var element = this;

        $(element).progressbar({
            value: parseInt($(element).attr("rel"))
        });
    });
</script>
