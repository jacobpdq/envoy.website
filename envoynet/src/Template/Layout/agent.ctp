<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>
      <?php echo __('ENVOY'); ?>
      |
        <?= $this->fetch('title') ?>
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
	  echo $this->Html->css('jquery.bxslider.css');

      echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js');
      echo $this->Html->script('jquery.ui-1.8.11.min.js');
      echo $this->Html->script('jquery.mousewheel-3.0.4.pack.js');
      echo $this->Html->script('jquery.fancybox-1.3.4.pack.js');
      echo $this->Html->script('jquery.easing-1.3.pack.js');
      echo $this->Html->script('jquery.jscrollpane.min.js');
      echo $this->Html->script('jquery.bxslider.min.js');


      echo $this->Html->script('jquery.validate.min.js');
	  echo $this->Html->script('jquery.autotab-1.1b.js');
      echo $this->Html->script('main.js');
?>
    <?= $this->fetch('meta') ?>

    <?= $this->fetch('css') ?>

    <?= $this->fetch('script') ?>
    <?php echo $sso_session_check; ?>
</head>
<body>



<!-- Top Navigation Bar -->
  <header id="top-header">
    <nav >

         <section id="login" class="tabs mobile ">
                  <span>Login</span>
                   <div class="tabs__tabItem">
                       <input type="radio" id="tab-one" name="tab-group-one">
                       <label for="tab-one">TRAVEL AGENT</label>
                       
                <div class="tabs__content">


          <?php echo $this->Form->create('LoginData', array('url' => array('controller'=>'main', 'action' => 'login', 'prefix' => 'agent'), 'id' => 'agent-login')); ?>

          <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'', 'placeholder'=>"Username")) ?>

          <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'type'=>'password', 'placeholder'=>"Password")) ?>


          <button class="button" type="submit">Login</button>
          <?php echo $this->Form->end(); ?>

                       </div> 
                   </div>
                    
                    <div class="tabs__tabItem">

                       <input type="radio" id="tab-two" name="tab-group-one">
                       <label for="tab-two">SUPPLIER</label>
                     
                       <div class="tabs__content">


                        <?php echo $this->Form->create('Supplier',array('url'=>array('controller'=>'main','action'=>'login','prefix' => 'supplier')));?>

                        <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text', 'placeholder'=>"Username")) ?>

                        <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'placeholder'=>"Password")) ?>

                        <button class="button" type="submit">Login</button>

                         <?php echo $this->Form->end(); ?>

                       </div> 
                   </div>
                    
                </section>

      <ul class="desktop">
        <li class="gray-text">1800 IRON STONE MANOR, PICKERING, ON L1W 3J9</li>
        <li class="gray-text"><u><a href="tel:9058310006">(905)831-0006</a></u></li>
        <li class="white-text"><u><a href="mailto:INFO@ENVOYNETWORKS.CA"></u>INFO@ENVOYNETWORKS.CA</a></li>
      </ul>
    </nav> 
  </header>



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
            <li><a href="#">Services</a>
              <ul>
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'logistics','prefix'=>'agent')); ?>">Logistics</a></li> 
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'digital','prefix'=>'agent')) ?>">Digital support</a></li> 
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'marketing','prefix'=>'agent')) ?>">Marketing solutions</a></li> 
              </ul>

            </li>
            <li><a href="#">About Us</a>
              <ul>
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'overview','prefix'=>'agent')); ?>">Overview</a></li>
              <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'meettheteam','prefix'=>'agent')); ?>">Meet the Team</a></li>
              </ul>
            </li>
            <li>  <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'contactus','prefix'=>'agent')); ?>">Contact Us</a> 
   </li>
            </ul>
        </nav>

      </header>

    
    
    <div id="Main_content_Holder">

    <!--Start Login screen content /-->

    <!--Envoy Logo /-->
         <div id="Logo_Menu_Holder">
  
           
  

    <!--Site navbar /-->
    <?php if ($this->request->session()->check('Auth.User.id') && $this->request->session()->check('Auth.User.role') == 'agent'): ;?>
   <div id="Main_Navbar_Interface">

    <div id="Welcome_holder">Welcome, <?php echo $agentname; ?> </div> 
    
     <ul id="Main_Navbar_Holder">
     
     <li>    <a href="<?php echo $this->Url->build(array('controller' => 'agents', 'action' => 'sso_profile', 'prefix' => 'agent')); ?>">My Profile</a>  </li>
      <li>  <a href="<?php echo $this->Url->build(array('controller' => 'brochures', 'action' => 'index', 'prefix' => 'agent')); ?>">Brochures</a> </li>
     <li>   <a href="<?php echo $this->Url->build(array('controller' => 'orders', 'action' => 'index', 'prefix' => 'agent')); ?>">My Orders</a>  </li>
           <li> </a><a href="<?php echo $this->Url->build(array('controller'=>'main','action'=>'logout','prefix' => 'agent'));?>">Logout</a> </li>
      

         
          
          
        </ul>
        
       
        
<?php endif; ?>
       
 </div>  






        <script type="text/javascript">
          //new FancyZoom('contact', {width:610, height:520});
        </script>
        <!--End Site navbar /-->

 <!--       <div id="main-content-top"></div>  -->
        <div id="main-content">

          <div class="inner-content-wrapper">
            <h1><?php echo $title_for_layout; ?></h1>
<?php if ($this->request->session()->check('Auth.User.id') && $this->request->session()->check('Auth.User.role') == 'agent'): ?>
              <div id="Cart_Header_items">
         <!--       <span class="Base_txt">Items in Cart: </span>
                <span class="Base_blue_txt" id="cartUpdate">  -->
 <?php
            $cart = $this->request->session()->read('ShoppingCart');
            $itemNr = sizeof($cart['Items']);
        //    echo $itemNr . "  "
?>
      <!--    </span> &nbsp;&nbsp;   -->

          <a class="Cart_items" href="<?php echo $this->Url->build(array('controller' => 'ShoppingCart', 'action' => 'index', 'prefix' => 'agent')); ?>">Checkout / View items in cart: <?php echo $itemNr;?></a>&nbsp;
        </div>
<?php endif; ?>
      </div>

<?php echo $this->Flash->render(); ?>
    <?= $this->fetch('content') ?>

      

          </div>
  
          
<br style="clear:both" />
          <section class="" id="footer">
  <div class="section__content">
    
    <a href="http://travelweek.ca" target="_blank"><?php echo $this->Html->image('assets/site_logos/travel_week_logo-white.png',array('alt'=>'Travel Week - A Travel Week Company'));?> </a>
    <p>© Copyright Envoy Network Inc. 2015</p>
</a>
  </div>
  </section>

</div>



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

<script type="text/javascript">
        $(document).ready(function(){
          $("#agent-login").validate();
        });
      </script>
      
      
      <!-- Google Code for Long List -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 955485625;
var google_conversion_label = "XU3ZCL3ZtlgQuZvOxwM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/955485625/?value=1.00&amp;currency_code=CAD&amp;label=XU3ZCL3ZtlgQuZvOxwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
      
  </body>
</html>