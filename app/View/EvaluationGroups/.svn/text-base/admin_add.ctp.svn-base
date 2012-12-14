<div class="grid_12">
    <h1>Administrar comissão de avaliadores.</h1>
</div>
<div class="grid_7 alpha">
    <?php echo $this->Form->create('EvaluationGroup'); ?>
    <?php
    echo $this->Form->input('User', array('div' => array(
            'class' => 'grid_7'
        ), 'class' => 'fill', 'style' => 'height: 300px;', 'label' => 'Selecione os membros.', 'name' => 'data[EvaluationGroup][User]'));
    ?>
    <?php
    echo $this->Form->end(array(
        'label' => 'ENVIAR',
        'class' => 'grid_2',
        'div' => array('class' => 'grid_2 prefix_5')));
    ?>

</div><!--form-->

<div class="grid_5 omega">
    <h4>Lista atual de pesquisadores.</h4>
        <?php foreach ($group as $g) { ?>
            <?php echo $g['User']['name'] . "  " . $g['User']['surname']; ?>
            <br />
        <?php } ?>
</div><!--lista-->