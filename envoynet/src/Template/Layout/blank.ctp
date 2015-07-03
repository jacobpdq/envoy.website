<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>
      <?php echo __('Envoy'); ?>
     
    </title>
    <?php
      echo $this->Html->meta('icon');
      echo $this->Html->css('main');
      echo $this->Html->css('admin');
      echo $this->Html->css('layout');
      echo $this->Html->css('layout_agent');
      echo $this->Html->css('layout_supplier');
      echo $this->Html->css('typography');
      echo $this->Html->css('navbar');
      echo $this->Html->css('common');
      echo $this->Html->css('col_grid');
      echo $this->Html->css('advanced_search');
      echo $this->Html->css('new_btn');
       echo $this->Html->css('jquery.ui');

      echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js');
      echo $this->Html->script('jquery.ui-1.8.11.min.js');
      echo $this->Html->script('main.js');
      //echo $this->Html->script('jquery.mousewheel-3.0.4.pack.js');
     // echo $this->Html->script('jquery.fancybox-1.3.4.js');
      //echo $this->Html->script('jquery.easing-1.3.pack.js');
     // echo $this->Html->script('jquery.jscrollpane.min.js');
    ?>
    
    <?= $this->fetch('script') ?>
    </head>
    <body>
         <div id="admin">
      <div  class="inner-content-wrapper">
          <div>&nbsp;</div>
        <?php echo $this->Flash->render(); ?>
        <?= $this->fetch('content') ?>

      
      </div>
      </div>

<script type="text/javascript" language="javascript">
        $(".iframe-link").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
</script>
  </body>
</html>