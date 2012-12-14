<div class="grid_12">
    <h1>Cadastrar novo usuário</h1>
</div>
<?php echo $this->Form->create('User');?>
	<?php
                echo $this->Form->input('group_id',
                    array('label' => 'Selecione o perfil do usuário', 'options' => $groups,
                        'empty' => 'Selecione','div' => array(
                        'class'=>'grid_4 prefix_2'),));
		echo $this->Form->input('name',array('div' => array(
                    'class'=>'grid_4 prefix_2'), 'class' => 'fill', 'label' => 
                    'Nome'));
		echo $this->Form->input('surname',array('div' => array(
                    'class'=>'grid_4 sufix_2'), 'class' => 'fill', 'label' => 
                    'Sobrenome'));
		echo $this->Form->input('CPF',array('div' => array(
                    'class'=>'grid_4 prefix_2 sufix_6'), 'class' => 'fill','label' => 
                    'CPF (somente números)'));
                echo $this->Form->input('email',array('div' => array(
                    'class'=>'grid_4 prefix_2'), 'class' => 'fill', 'label' => 
                    'E-mail'));
                echo $this->Form->input('email_confirm',array('div' => array(
                    'class'=>'grid_4 sufix_2'), 'class' => 'fill', 'label' => 
                    'Confirmação E-mail'));
		echo $this->Form->input('password',array('div' => array(
                    'class'=>'grid_4 prefix_2'), 'class' => 'fill', 'label' => 
                    'Senha (entre 6 e 8 caracteres)', 'maxlength' => 8));
                echo $this->Form->input('password_confirm',array('div' => array(
                    'class'=>'grid_4 sufix_2'), 'class' => 'fill', 'type' => 'password', 'label' => 
                    'Confirmação Senha (entre 6 e 8 caracteres)', 'maxlength' => 8));
		echo $this->Form->hidden('active', array('value' => '1'));
              	?>
<div class="grid_2 prefix_9 alpha">
    <?php echo $this->Form->end(__('ENVIAR'));?>
</div>

<script type="text/javascript">
    $('.usu_adicionar').addClass('active');
    $('.usu_adicionar').siblings().removeClass('active');
</script>