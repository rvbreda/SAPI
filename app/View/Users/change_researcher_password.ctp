<div class="grid_12">
    <h1>Alterar senha.</h1>
</div>
<?php echo $this->Form->create('User', array('action' => 'change_researcher_password'));?>
	<fieldset>
	<?php
		echo $this->Form->input('old_password', array('div' => array(
                    'class' => 'grid_4 prefix_2 sufix_6'
                ),'class' => 'fill', 'type' => 'password', 'label' => 'Senha Atual'));
                echo $this->Form->input('new_password', array('div' => array(
                    'class' => 'grid_4 prefix_2'
                ),'class' => 'fill', 'type' => 'password' ,'label' => 'Nova Senha'));
		echo $this->Form->input('new_password_confirm',array('div' => array(
                    'class' => 'grid_4 '
                ),'class' => 'fill', 'type' => 'password', 'label' => 'Confirmar nova senha'));
	?>
	</fieldset>
<div class="grid_3 prefix_9">
    <?php
    $options = array(
        'label' => 'ENVIAR',
        'class' => '',
    );?>
    <?php echo $this->Form->end($options); ?>
</div>
<script type="text/javascript">
    $('.usu_alterar_senha').addClass('active');
    $('.usu_alterar_senha').siblings().removeClass('active');
</script>