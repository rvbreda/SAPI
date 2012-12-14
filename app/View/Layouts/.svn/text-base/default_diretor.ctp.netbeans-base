<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset("UTF-8"); ?>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('reset');
        echo $this->Html->css('text');
        echo $this->Html->css('grid/960');
        echo $this->Html->css('style');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css');
        
        echo $this->Html->script('modernizr.placeholder');
        echo $this->Html->script('placeholder.min');
        echo $this->Html->script('jquery.180.min');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('http://code.jquery.com/ui/1.9.1/jquery-ui.js');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <!-- HEAD -->
        <div id="header" class="header">
            <div class="container_12">
                <?php echo $this->Html->image('../img/logos/inscer-header.png', array('alt' => 'InsCer', 'class' => 'logo-header')) ?>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="container_12">
            <div class="grid_2 btn-group top20 bottom20">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    Projetos
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="proj_portfolio"><?php echo $this->Html->link('Portfólio', array('controller' => 'projects', 'action' => 'portfolio_projects')) ?></li>
                    <li class="proj_list"><?php echo $this->Html->link('Aprovados pela comissão', array('controller' => 'projects', 'action' => 'validate_project_list')) ?></li>
                </ul>
            </div>
                    
            <div class="grid_2 btn-group top20 bottom20">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php echo $current_user['name'] ?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="usu_alterar_senha"><?php echo $this->Html->link('Alterar Senha', array('controller' => 'users', 'action' => 'change_researcher_password', $current_user['id'])) ?></li>
                    <li class="usu_sair"><?php echo $this->Html->link('Sair', array('controller' => 'users', 'action' => 'logout')) ?></li>
                </ul>
                
                
            </div>
            <div class="grid_12" id="container">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>

        <!-- FOOTER -->
        <div id="footer"></div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
