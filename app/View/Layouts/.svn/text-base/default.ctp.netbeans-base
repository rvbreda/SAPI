<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
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

        echo $this->Html->script('jquery.180.min');
        echo $this->Html->script('bootstrap.min');
        
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div id="header" class="header">
            <div class="container_12">
                <?php echo $this->Html->image('../img/logos/inscer-header.png', array('alt' => 'InsCer', 'class' => 'logo-header')) ?>
                <?php if ($logado) { ?>
                    Bem vindo(a) <?php echo $current_user['name'] ?> <?php echo $this->Html->link('sair', '/users/logout'); ?>
                <?php } else { ?>
                    <?php echo $this->Html->link(
                        'CADASTRE-SE',
                        array('controller' => 'users', 'action' => 'add'),
                        array('class' => 'button-link right top20')
                    );?>
                <?php } ?>
            </div>
        </div>
        <div class="container_12">
            <div class="grid_12" id="container">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Session->flash('auth'); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <div id="footer"></div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
