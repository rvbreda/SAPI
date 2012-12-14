<div class="grid_4 prefix_4 sufix_4 bottom20 top20">
        <?php 
echo $this->Html->link(
    'Voltar',
    array('controller' => 'users', 'action' => 'login'),
    array('class' => 'button-link')
);
?>
</div>
<div class="grid_12">
    <h1>Solicitar nova senha</h1>
</div>
<?php echo $this->Form->create('User', array('action' => 'recover_password')); ?>
<?php
echo $this->Form->input('CPF', array('div' => array(
        'class' => 'grid_4 prefix_4 sufix_4'), 'class' => 'fill', 'label' =>
    'CPF (somente números)'));
echo $this->Form->input('email', array('div' => array(
        'class' => 'grid_4 prefix_4'), 'class' => 'fill', 'label' =>
    'E-mail'));
?>
<div class="grid_2 prefix_7 sufix_2 alpha bottom20">
<?php echo $this->Form->end(__('ENVIAR')); ?>
</div>