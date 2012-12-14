<div class="grid_7 top20">
    <ul class="" style="list-style:none;">
        <li>
            <h4>SAPI: Sistema de Apoio à Tomada de Decisão de Alocação de Projetos de Pesquisas Científicas no InsCer</h4>
        </li>
        <li>
            Este sistema de informação disponibiliza, a todos pesquisadores que desejam desenvolver projetos no InsCer, uma forma rápida e centralizada de submeter projetos científicos para avaliação.
        </li>
    </ul>
    
</div>
<div class=" grid_4 signin-box">
    <h2>Login</h2>
<?php
echo $this->Form->create('User', array('action' => 'login'));
echo $this->Form->input('email', array('class' => 'login_input'));
echo $this->Form->input('password', array('class' => 'login_input', 'type' => 'password', 'label' => 'Senha'));
echo $this->Html->link('Esqueci minha senha', array('controller' => 'users', 'action' => 'recover_password'));
echo $this->Form->end('Login');
?>

</div>