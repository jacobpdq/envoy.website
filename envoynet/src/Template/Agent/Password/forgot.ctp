<!-- Top Navigation Bar -->
  <header id="top-header">
    <nav >



         <section id="login" class="tabs mobile ">
                  <span>Login As:</span>
                   <div class="tabs__tabItem">
                       <input type="radio" id="tab-one" name="tab-group-one">
                       <label for="tab-one"><?php echo __('Travel Agent'); ?></label>
                       
                <div class="tabs__content">


          <?php echo $this->Form->create('LoginData', array('url' => array('controller'=>'main', 'action' => 'login', 'prefix' => 'agent'), 'id' => 'agent-login')); ?>

          <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'', 'placeholder'=>"Username")) ?>

          <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'type'=>'password', 'placeholder'=>"Password")) ?>

          <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'language','prefix'=>'agent')); ?>">Forgot Password</a>




          <button class="button" type="submit"><?php echo __('Login'); ?></button>
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

                        <a href="<?php echo $this->Url->build(array('controller' => 'password', 'action' => 'forgot','prefix'=>'supplier')); ?>">Forgot Password</a>

                         <?php echo $this->Form->end(); ?>

                       </div> 
                   </div>
                    

                </section>

      <ul class="language desktop">
        <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'language','prefix'=>'agent')); ?>">
          <span class="english fontsize14 bold">
            <button class="lang--button button--white">English</button>
          </span>
          <span class="french fontsize14 bold">
            <button class="lang--button button--white">Français</button>
          </span>
        </a>
      </ul>
      <ul class="topnav">
        <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'overview','prefix'=>'agent')); ?>"><?php echo __('About Us'); ?></a></li>
        <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'meettheteam','prefix'=>'agent')); ?>"><?php echo __('Meet the Team'); ?></a></li>
        <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'contactus','prefix'=>'agent')); ?>"><?php echo __('Contact Us'); ?></a></li>
      </ul>
      <ul class="desktop" style="margin-top:-7px !important;">
        <li class="gray-text">TORONTO    ETOBICOKE    RICHMOND<br /><a href="tel:+19058310006">(905)831-0006</a> &nbsp; <a href="mailto:mail@envoynetworks.ca">mail@envoynetworks.ca</a></li>
      </ul>
    </nav> 
  </header>

<div id="wrapper">
  <input id="toggle" type="checkbox">

  <div class="content "> 
      
      <header id="main-header" class="section__content " >
      
      <a href="/">
      <?php echo $this->Html->image('assets/envoy-logo.svg', array( 'id'=>'logo'));?> 
      </a>
          
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

      <div class="section__content" style="padding-top:0;">

      <h1>
      <?php echo __('Password Retrieval'); ?>
      </h1>
      <?php 
      if (isset($success)) { 
	     if ($success) { 
      ?>
      <p>
      <?php echo __('Your password has been sent. Please check your email.'); ?>
      </p>
      <?php
       	} else { 
      ?>
      <p>
      <?php echo __('We couldn\'t find your email address. Please try entering again or Regsiter as a new user.'); ?></p>
      <?php
       	}
      }?>
      <?php 
      if (!isset($success) || !$success) { 
      ?>
        <?php echo $this->Form->create('Password',array('url'=>array('controller'=>'Password','action'=>'forgot','prefix' => 'agent')));?>

        <div  style="margin-right:10px; display:inline-block;">
        <?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'type'=>'text', 'placeholder'=>__('Email Address'))) ?>
        </div>
        <br style="clear:both" />

        <button style="margin-top:40px" class="button button--green" type="submit"><?php echo __('Send Password'); ?></button>

         <?php echo $this->Form->end(); 
       }
       ?>

         <br /><br /><br />
    
         </div>



 <!--Start copyright Line content /-->


  <section class="" id="footer">
  <div class="section__content">
    
      <div id="Travelweek_Holder">
   <a href="http://travelweek.ca" target="_blank"><?php echo $this->Html->image('assets/site_logos/logoTravelWeekGroup.svg',array('alt'=>'Travel Week - A Travel Week Company'));?> </a>
    <p>© Copyright Envoy Network Inc. 2015</p>
</a>
  </div>
  </section>


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

<script type="text/javascript" >
$(document).ready(function() {
	$('#LoginDataDigits1, #LoginDataDigits2, #LoginDataDigits3').autotab_magic().autotab_filter('numeric');
})

</script>