<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>
      <?php echo __('Envoy'); ?>
      |
        <?= $this->fetch('title') ?>
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
<body class="<?php echo $this->request->session()->read('language'); ?>">

<script type="text/javascript">
  if (/language/.test(window.location.href)) {
  window.location = document.referrer;
}
</script>

      <div id="Main_admin_logout_Holder">
        <div id="logout_Interface_admin">
          <a href="<?php echo $this->Url->build(array('controller'=>'main','action'=>'logout','prefix' => 'admin'));?>">
            <div id="logout_admin_btn">Logout</div>
          </a>
        </div>
      </div>
      <div id="Main_Navbar_Interface_admin">
        <a href="<?php echo $this->Url->build(array('controller'=>'suppliers','action'=>'index','prefix' => 'admin'));?>">
          <div id="admin_suppliers_btn">Suppliers</div>
        </a>
        <a href="<?php echo $this->Url->build(array('controller'=>'agents','action'=>'index','prefix' => 'admin'));?>">
          <div id="admin_agents_btn">Agents</div>
        </a>
        <a href="<?php echo $this->Url->build(array('controller'=>'brochures','action'=>'index','prefix' => 'admin'));?>">
          <div id="admin_brochures_btn">Brochures</div>
        </a>
        <a href="<?php echo $this->Url->build(array('controller'=>'orders','action'=>'index','prefix' => 'admin'));?>">
          <div id="admin_orders_btn">Orders</div>
        </a>
        <!--
        <a href="<?php echo $this->Url->build(array('controller'=>'invoices','action'=>'index','prefix' => 'admin'));?>">
          <div id="admin_invoices_btn"></div>
        </a>
          -->
        <a href="<?php echo $this->Url->build(array('controller'=>'orders','action'=>'pack','prefix' => 'admin'));?>">
          <div id="admin_shipping_btn"></div>
        </a>
         <a href="<?php echo $this->Url->build(array('controller'=>'receipts','action'=>'index','prefix' => 'admin'));?>">
         
         
         <br />
        Receipts
        </a>
        
        <br />
        <a href="<?php echo $this->Url->build(array('controller'=>'sso','action'=>'settings','prefix' => 'admin'));?>">
        SSO Settings
        </a>
      

      </div>
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