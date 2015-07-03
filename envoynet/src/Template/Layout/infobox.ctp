<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo __('HippoExpress'); ?>
            |
            <?php echo $title_for_layout; ?>
        </title>
        <?php
            echo $this->Html->meta('icon');
            echo $this->Html->css('main');
            echo $this->Html->css('layout');
            echo $this->Html->css('typography');
            echo $this->Html->css('navbar');
            echo $this->Html->css('common');
            echo $this->Html->css('col_grid');
            echo $this->Html->css('advanced_search');
            echo $this->Html->css('new_btn');

            echo $scripts_for_layout;
        ?>
        </head>
        <body style="background: none;">
        <?php echo $this->Flash->render(); ?>

        <?= $this->fetch('content') ?>

        <?php //echo $this->element('sql_dump'); ?>
    </body>
</html>