<div class="grid_4 prefix_2 sufix_6 bottom20 top20">
        <?php 
echo $this->Html->link(
    'Voltar',
    array('controller' => 'users', 'action' => 'login'),
    array('class' => 'button-link')
);
?>
</div>

<div class="grid_12">
    <h1>Cadastro Usuário</h1>
</div>

<?php echo $this->Form->create('User');?>
	<?php
		echo $this->Form->hidden('group_id', array('value' => '4'));
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
		
              	?>
<div class="grid_3 prefix_7 omega">
    <?php
    $options = array(
        'label' => 'ENVIAR ',
        'class' => 'grid_3 bottom20',
    );?>
    <?php echo $this->Form->end($options); ?>
</div>