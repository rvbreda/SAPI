<div class="grid_12">
    <h1>Critérios de avaliação</h1>
</div>
<table cellpadding="0" class="fill" cellspacing="0" id="rounded-corner">
    <tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('description', 'Descrição'); ?></th>
        <th><?php echo $this->Paginator->sort('weight', 'Peso'); ?></th>
        <th><?php echo $this->Paginator->sort('active', 'Ativo'); ?></th>
        <th class="actions"><?php echo __('Ações'); ?></th>
    </tr>
    <?php foreach ($evaluationCriteria as $evaluationCriterium): ?>
        <tr>
            <td><?php echo h($evaluationCriterium['EvaluationCriterium']['id']); ?>&nbsp;</td>
            <td><?php echo h($evaluationCriterium['EvaluationCriterium']['description']); ?>&nbsp;</td>
            <td><?php echo h($evaluationCriterium['EvaluationCriterium']['weight']); ?>&nbsp;</td>
            <td><?php echo h($evaluationCriterium['EvaluationCriterium']['active'] == 1 ? "Sim" : "Não" ); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $evaluationCriterium['EvaluationCriterium']['id'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} , começando no registro {:start}, terminando em {:end}')
    ));
    ?>	</p>

<div class="paging">
    <?php
    echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('Próximo') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
</div>
