<div class="grid_12">
    <h1>Visualizar Proposta de projeto</h1>
</div>
<div class="proposals view">
    <dl>
        <div class="grid_10 prefix_1 suffix_1 bottom20">
            <dt><?php echo __('Nome do projeto'); ?></dt>
            <dd>
                <?php echo $proposal['Proposal']['description']; ?>
                &nbsp;
            </dd>
        </div>
        <div class="grid_10 prefix_1 suffix_1 bottom20">
            <dt><?php echo __('Área'); ?></dt>
            <dd>
                <?php echo $proposal['Area']['description']; ?>
                &nbsp;
            </dd>
        </div>
        <div class="grid_10 prefix_1 suffix_1 bottom20">
            <dt><?php echo __('Proposta'); ?></dt>
            <dd>
                <?php echo h($proposal['Proposal']['proposal']); ?>
                &nbsp;
            </dd>
        </div>
        <div class="grid_10 prefix_1 suffix_1 bottom20">
            <dt><?php echo __('Data de criação'); ?></dt>
            <dd>

                <?php echo $this->Time->format('d/m/Y', h($proposal['Proposal']['created'])); ?>
                &nbsp;
            </dd>
        </div>
        <div class="grid_10 prefix_1 suffix_1 bottom20">
            <?php
                echo $this->Html->link(
                        'Voltar', array('action' => 'index'), array('class' => 'button-link')
            );?>
        </div>
    </dl>
</div>
