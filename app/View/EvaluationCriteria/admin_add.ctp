<div class="grid_12">
    <h1>Adicionar critério de avaliação.</h1>
</div>
    <?php echo $this->Form->create('EvaluationCriterium'); ?>
    <fieldset>

        <?php
        echo $this->Form->input('description', array('div' => array(
                    'class' => 'grid_6 prefix_3 sufix_3'
                ),'class' => 'fill','label' => 'Nome do Critério'));
        echo $this->Form->input('weight', array('div' => array(
                    'class' => 'grid_6 prefix_3 sufix_3'
                ),'class' => 'fill','label' => 'Peso (Ex: 9,5 ou 9)', 'min' => 1, 'max' => 10, 'step' => 'any'));
        echo $this->Form->hidden('distribution', array('value' => '0'));
        echo $this->Form->hidden('active', array('value' => '1'));
        ?>
    </fieldset>
    <div class="grid_3 prefix_8 sufix_1 alpha">
    <?php
    $options = array(
        'label' => 'ENVIAR',
        'class' => 'aplha fill omega',
    );?>
    <?php echo $this->Form->end($options); ?>
</div>

