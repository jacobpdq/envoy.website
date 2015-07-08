<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>
      <?php echo __('ENVOY'); ?>
      |
      <?php echo $title_for_layout; ?>
    </title>
    <?php
      echo $this->Html->meta('icon');
      echo $this->Html->css('main');
      echo $this->Html->css('layout_agent');
      echo $this->Html->css('layout_supplier');
      echo $this->Html->css('layout');
      echo $this->Html->css('typography');
      echo $this->Html->css('navbar');
      echo $this->Html->css('common');
      echo $this->Html->css('col_grid');
      echo $this->Html->css('advanced_search');
      echo $this->Html->css('new_btn');
      echo $this->Html->css('jquery.jscrollpane');
      echo $this->Html->css('jquery.jscrollpane.lozenge');
      echo $this->Html->css('jquery.fancybox-1.3.4');
       echo $this->Html->css('jquery.ui');


      echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js');
      echo $this->Html->script('jquery.ui-1.8.11.min.js');
      echo $this->Html->script('jquery.mousewheel-3.0.4.pack.js');
      echo $this->Html->script('jquery.fancybox-1.3.4.pack.js');
      echo $this->Html->script('jquery.easing-1.3.pack.js');
      echo $this->Html->script('jquery.jscrollpane.min.js');

      echo $this->Html->script('jquery.validate.min.js');
      echo $this->Html->script('main.js');
    ?>
  
    <?= $this->fetch('script') ?>
</head>
    <body>
      <!--Site Header /-->
  <div id="Main_content_Holder">

    <!--Start Login screen content /-->

    <!--Envoy Logo /-->
         <div id="Logo_Menu_Holder">
  
           
             
          <a href="<?php echo $this->Url->build(array('controller'=>'main','action'=>'index','prefix' => 'supplier'));?>">
              <?php echo $this->Html->image("assets/site_logos/main_envoy_logo.png");?>
          </a>
       
    

     <div id="Search_Interface">
      
       <ul id="navbar">
       <li>
        <a><?php echo __('Services'); ?></a> 
        <ul>
           <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'logistics','prefix' => false)); ?>"><?php echo __('Logistics'); ?></a></li> 
            <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'digital','prefix' => false)) ?>"><?php echo __('Digital Support'); ?></a></li> 
<li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'marketing','prefix' => false)) ?>"> <?php echo __('Marketing Solutions'); ?></a></li> 
        </ul>
    </li>

    <li>
      <a> <?php echo __('About Us'); ?></a>
        <ul>
            <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'overview','prefix' => false)); ?>"><?php echo __('Overview'); ?></a></li>

            <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'meettheteam','prefix' => false)); ?>"><?php echo __('Meet the Team'); ?></a></li>
        </ul>
    </li>

     <li id="last">
        <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'contactus','prefix' => false)); ?>"><?php echo __('Contact Us'); ?></a> 
    </li> 
      </ul>
      
     </div>
    
  </div>

      <!--End Site Header /-->

      <!--Site navbar /-->
      
         <div id="Main_Navbar_Interface">
<?php if ($this->request->session()->check('Auth.User.id') && $this->request->session()->check('Auth.User.role') == 'supplier'): ;?>
    <div id="Welcome_holder"><?php echo __('Welcome'); ?>,  <?php echo $suppliername; ?> </div> 
    
     <ul id="Main_Navbar_Holder">
     
     <li>    <a href="<?php echo $this->Url->build(array('controller' => 'suppliers', 'action' => 'profile', 'prefix' => 'supplier')); ?>"><?php echo __('My Profile'); ?></a>  </li>
      <li>  <a href="<?php echo $this->Url->build(array('controller' => 'brochures', 'action' => 'index', 'prefix' => 'supplier')); ?>"><?php echo __('Brochures'); ?></a> </li>
     <li>   <a href="<?php echo $this->Url->build(array('controller' => 'orders', 'action' => 'index', 'prefix' => 'supplier')); ?>"><?php echo __('My Orders'); ?></a>  </li>
     <li>   <a href="<?php echo $this->Url->build(array('controller' => 'receipts', 'action' => 'index', 'prefix' => 'supplier')); ?>"><?php echo __('My Receipts'); ?></a>  </li>
           <li> </a><a href="<?php echo $this->Url->build(array('controller'=>'main','action'=>'logout','prefix' => 'supplier'));?>"><?php echo __('Logout'); ?></a> </li>
      
<?php else: ?>
         
          
          
        </ul>
        
        
        
<?php endif; ?>
       
 </div> 
      
      
      
  <!--    <div id="Main_Navbar_Interface">
      <?php if($this->request->session()->check('Auth.User.id')): ?>
      <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'display','aboutus','prefix' => 'supplier')); ?>"><div id="AboutUs"></div></a>
      <a href="<?php echo $this->Url->build(array('controller' => 'suppliers', 'action' => 'profile','prefix' => 'supplier')); ?>"><div id="Myprofile"></div></a>
      <?php
                  $allow_orders = $this->request->session()->read('Auth.User.allow_modify_orders');
                  $allow_brochures = $this->request->session()->read('Auth.User.allow_modify_brochures');
            ?>
      <?php if($allow_brochures == 1):?>
      <a href="<?php echo $this->Url->build(array('controller' => 'brochures', 'action' => 'index','prefix' => 'supplier')); ?>"><div id="agentBrochures"></div></a>
      <?php endif;?>
      <?php if($allow_orders == 1):?>
      <a href="<?php echo $this->Url->build(array('controller' => 'orders', 'action' => 'index','prefix' => 'supplier')); ?>"><div id="agentOrders"></div></a>
      <?php endif;?>
      <a href="#contact_box" id="contact" onclick="document.getElementsByName('darkBackgroundLayer')[0].style.display='';"><div id="Contact"></div></a>
      <?php else: ?>
      <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'display','aboutus','prefix' => 'supplier')); ?>"><div id="AboutUs"></div></a>
      <a href="#contact_box" id="contact" onclick="document.getElementsByName('darkBackgroundLayer')[0].style.display='';"><div id="Contact"></div></a>
      <?php endif; ?>
      </div>  -->


   <script type="text/javascript">
          //new FancyZoom('contact', {width:610, height:520});
      </script>
   <!--End Site navbar /-->


<div id="main-content">

    <div class="inner-content-wrapper">
      <h1><?php echo $title_for_layout; ?></h1>
      <?php if ($this->request->session()->check('Auth.User.id') && $this->request->session()->check('Auth.User.role') == 'supplier'): ?>
      <div id="Cart_Header_items">
        <!--
       <span class="Base_txt">Items in Cart: </span>
       <span class="Base_blue_txt" id="cartUpdate">
           <?php
                       /*
                        $cart = $this->request->session()->read('ShoppingCart');
                        $itemNr = sizeof($cart['Items']);
                        echo $itemNr." items"
            *
            */
                      ?>
       </span> &nbsp;&nbsp;

         <a class="Cart_items" href="<?php echo $this->Url->build(array('controller' => 'ShoppingCart', 'action' => 'index','prefix' => 'supplier')); ?>">View Cart</a>&nbsp;
        /-->
       </div>
      <?php endif; ?>
        
    </div>

    <?php echo $this->Flash->render(); ?>

    <?= $this->fetch('content') ?>

     
</div>



  <!--Start Footer content /-->

  <!--Start copyright Line content /-->

    <div class="Hippo_Copyright_Line" id="Main_copyright_Holder">© Copyright Envoy Network Inc. 2013
      <div id="Travelweek_Holder">
	 <a href="http://travelweek.ca" target="_blank"><?php echo $this->Html->image('assets/site_logos/logoTravelWeekGroup.svg',array('alt'=>'Travel Week - A Travel Week Company'));?> </a>
      </div>
    </div>
    <!--End copyright Line content /-->

<!--End Footer content /-->
<script type="text/javascript" language="javascript">
        $(".iframe-link").fancybox({
				'width'				: '45%',
				'height'			: '70%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
</script>
  </body>
</html>