<div class="grid_12">
    <h1>Configurações do sistema.</h1>
</div>
<?php echo $this->Form->create('Configuration'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->input('retention_percentage', array('div' => array(
                    'class' => 'grid_6 prefix_3 sufix_3'
                ),'class' => 'fill','label' => 'Percentual de retenção', 'min' => 1, 'max' => 100, 'step' => 1));
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