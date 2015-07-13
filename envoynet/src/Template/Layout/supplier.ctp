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
  echo $this->Html->meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']);
     echo $this->Html->css('http://fonts.googleapis.com/css?family=Raleway:400,300,600', ['plugin' => false]);
     echo $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,700,400,500,600', ['plugin' => false]);
     echo $this->Html->css('../dist/css/style.css');

      echo $this->Html->script('jquery.validate.min.js');
    echo $this->Html->script('jquery.autotab-1.1b.js');
      echo $this->Html->script('main.js');
    ?>

    
  
    <?= $this->fetch('script') ?>
</head>
<body class="<?php echo $this->request->session()->read('language'); ?>">

<script type="text/javascript">
  if (/language/.test(window.location.href)) {
  window.location = document.referrer;
}
</script>



<!-- Top Navigation Bar -->
  <header id="top-header">
    <nav >

         <section id="login" class="tabs mobile ">
                  <span><?php echo __('Login'); ?></span>
                   <div class="tabs__tabItem">
                       <input type="radio" id="tab-one" name="tab-group-one">
                       <label for="tab-one"><?php echo __('Travel Agent'); ?></label>
                       
                <div class="tabs__content">


          <?php echo $this->Form->create('LoginData', array('url' => array('controller'=>'main', 'action' => 'login', 'prefix' => 'agent'), 'id' => 'agent-login')); ?>

          <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'', 'placeholder'=>"Username")) ?>

          <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'type'=>'password', 'placeholder'=>"Password")) ?>


          <button class="button" type="submit"><?php echo __(' Login'); ?></button>
          <?php echo $this->Form->end(); ?>

                       </div> 
                   </div>
                    
                    <div class="tabs__tabItem">

                       <input type="radio" id="tab-two" name="tab-group-one">
                       <label for="tab-two"><?php echo __('Supplier'); ?></label>
                     
                       <div class="tabs__content">


                        <?php echo $this->Form->create('Supplier',array('url'=>array('controller'=>'main','action'=>'login','prefix' => 'supplier')));?>

                        <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text', 'placeholder'=>"Username")) ?>

                        <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'placeholder'=>"Password")) ?>

                        <button class="button" type="submit"><?php echo __('Login'); ?></button>

                         <?php echo $this->Form->end(); ?>

                       </div> 
                   </div>
                    
                </section>

       

            <ul class="language">
        <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'language','prefix'=>'supplier')); ?>">Language: <span class="english">EN</span><span class="french">FR</span></a></li>
      </ul>
      
      <ul class="desktop">
        <li class="gray-text">1800 IRON STONE MANOR, PICKERING, ON L1W 3J9</li>
        <li class="gray-text"><u><a href="tel:9058310006">(905)831-0006</a></u></li>
        <li class="white-text"><u><a href="mailto:INFO@ENVOYNETWORKS.CA"></u>INFO@ENVOYNETWORKS.CA</a></li>
      </ul>




      
    </nav> 
  </header>


      <!--Site navbar /-->




  <input id="toggle" type="checkbox">
 
   <div class="content">
      
      <header id="main-header" class="section__content " >

       <?php if ($this->request->session()->check('Auth.User.id') && $this->request->session()->check('Auth.User.role') == 'agent'): ;?>   
           <a href="<?php echo $this->Url->build(array('controller' => 'brochures', 'action' => 'index', 'prefix' => 'agent')); ?>">
            <?php echo $this->Html->image('assets/envoy-logo.svg', array( 'id'=>'logo'));?> </a>
           <?php else: ?>
           <a href="<?php echo $this->Url->build(array('controller' => 'main', 'action' => 'index', 'prefix' => false)); ?>">
           <?php echo $this->Html->image('assets/envoy-logo.svg', array( 'id'=>'logo'));?> </a>
           <?php endif; ?>
      
      
          
          <label for="toggle"> <?php echo $this->Html->image('assets/menu-button.png', array( 'id'=>'menu-button'));?> </label>

      
        <nav class="menu">
          <ul>
            <li><a href="#"><?php echo __('Services'); ?></a>
              <ul>
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'logistics','prefix'=>'agent')); ?>"><?php echo __('Logistics'); ?></a></li> 
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'digital','prefix'=>'agent')) ?>"><?php echo __('Digital Support'); ?></a></li> 
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'marketing','prefix'=>'agent')) ?>"><?php echo __('Marketing Solutions'); ?></a></li> 
              </ul>

            </li>
            <li><a href="#"><?php echo __('About Us'); ?></a>
              <ul>
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'overview','prefix'=>'agent')); ?>"><?php echo __('Overview'); ?></a></li>
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'meettheteam','prefix'=>'agent')); ?>"><?php echo __('Meet the Team'); ?></a></li>
              </ul>
            </li>
            <li>  <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'contactus','prefix'=>'agent')); ?>"><?php echo __('Contact Us'); ?></a> 
   </li>
            </ul>
        </nav>

      </header>

    
    
    <div id="Main_content_Holder">

    <!--Start Login screen content /-->

    <!--Envoy Logo /-->
         <div id="Logo_Menu_Holder">
  
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

 <br style="clear:both" />
<section class="" id="footer">
  <div class="section__content">
    
    <a href="http://travelweek.ca" target="_blank"><?php echo $this->Html->image('assets/site_logos/logoTravelWeekGroup.svg',array('alt'=>'Travel Week - A Travel Week Company'));?> </a>
    <p>© Copyright Envoy Network Inc. 2015</p>
</a>
  </div>
  </section>

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