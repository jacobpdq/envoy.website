<!-- Top Navigation Bar -->
  <header id="top-header">
    <nav >

         <section id="login" class="tabs mobile ">
                  <span><?php echo __('Login As'); ?>:</span>
                   <div class="tabs__tabItem">
                       <input type="radio" id="tab-one" name="tab-group-one">
                       <label for="tab-one"><?php echo __('Travel Agent'); ?></label>
                       
                <div class="tabs__content">

                  <?php

                  $number1 = rand(1,10); 
                  $number2 = rand(1,10); 
                  $answer = MD5($number1+$number2);


                  ?>
                  <form target="_parent"  name="loginform" id="loginform" action="http://www.travelweek.ca/wp-login.php" method="post">
                    <input type="hidden" name="support_nonce" value="<?php echo $answer; ?>" id="support_nonce">
                    <input type="hidden" name="support_question" value="<?php echo ($number1+$number2); ?>" id="support_question">
                    <input type="hidden" value="http://www.envoynetworks.ca/" name="redirect_to">
                    <input type="hidden" name="redirect_broker" id="redirect_broker" value="http://www.envoynetworks.ca/">
                      <?php echo $this->Form->input('log',array('div'=>false,'label'=>false,'type'=>'text','class'=>'', 'placeholder'=>__('Email'))) ?>
                      <?php echo $this->Form->input('pwd',array('div'=>false,'label'=>false,'type'=>'password', 'placeholder'=>__('Password'))) ?>
                      <a class="registerAccount" href="<?php echo $this->Url->build(array('controller' => 'agents', 'action' => 'sso_register','prefix'=>'agent')); ?>"><?php echo __('Register an Account'); ?></a>
                    <a href="<?php echo $this->Url->build(array('controller' => 'password', 'action' => 'forgot','prefix'=>'agent')); ?>"><?php echo __('Forgot Password?'); ?></a>
                    <input class="button" type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php echo __('Login'); ?>" />
                  </form>
                      
                  <?php /*
                  <?php echo $this->Form->create('LoginData', array('url' => array('controller'=>'main', 'action' => 'login', 'prefix' => 'agent'), 'id' => 'agent-login')); ?>
                  <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'', 'placeholder'=>__('Email'))) ?>
                  <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'type'=>'password', 'placeholder'=>__('Password'))) ?>
                  <a class="registerAccount" href="<?php echo $this->Url->build(array('controller' => 'agents', 'action' => 'sso_register','prefix'=>'agent')); ?>"><?php echo __('Register an Account'); ?></a>
                  <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'language','prefix'=>'agent')); ?>"><?php echo __('Forgot Password?'); ?></a>
                  <button class="button" type="submit"><?php echo __('Login'); ?></button>
                  <?php echo $this->Form->end(); ?>
                  */ ?>   
    
                  </div> 
                   </div>
                    
                    <div class="tabs__tabItem">

                       <input type="radio" id="tab-two" name="tab-group-one">
                       <label for="tab-two"><?php echo __('Supplier'); ?></label>
                     
                       <div class="tabs__content">


                        <?php echo $this->Form->create('Supplier',array('url'=>array('controller'=>'main','action'=>'login','prefix' => 'supplier')));?>

                        <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text', 'placeholder'=>__('Username'))) ?>

                        <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'placeholder'=>__('Password'))) ?>

                        <button class="button" type="submit"><?php echo __('Login'); ?></button>

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
        <li class="gray-text">TORONTO    ETOBICOKE    RICHMOND<br /><a href="tel:9058310006">(905)831-0006</a> &nbsp; <a href="mailto:mail@envoynetworks.ca">mail@envoynetworks.ca</a></li>
      </ul>

    </nav> 
  </header>

<div id="wrapper">
  <input id="toggle" type="checkbox">

  <div class="content "> 
      
    <style type="text/css" media="screen">
    .sso_alert {
      border: 1px solid transparent;
        border-radius: 4px;
        margin: 20px;
        padding: 15px;
      font-size:16px;
      line-height: 28px;
    }
    .sso_alert div {
      margin: 0px 0;
    }
    .sso_error {
      background-color: #f2dede;
        border-color: #a94442;
        color: #a94442;
    }
    .sso_error a { color: #a94442; text-decoration:underline; }
    .sso_error a:hover { color: #a94442; text-decoration:underline; }
    </style>
    <?php
    
  if( isset( $_REQUEST['sso_failed'] ) ){
    
    if( $_REQUEST['sso_failed'] == 'sso701' ){
      
      echo '<div class="sso_error sso_alert" style="position:relative">__("Your username/email or password was incorrect. If you are having issues logging in using your username then please use your email.<br/>If you have forgotten your password, please <a href="/agent/password/forgot">click here</a> to reset.<br/>If you are having multiple issues accessing the website then <a href="http://' . SSO_PARENT . '/sso-support/">click here to submit a support request</a>").</div>';
    
    }elseif( $_REQUEST['sso_failed'] == 'sso702' ){
      
      echo '<div class="sso_error sso_alert">__("Your IP has been blocked due to multiple invalid login attempts. Please contact support for assistance in removing this block.")<br/><a href="http://' . SSO_PARENT . '/sso-support/">__("Click here to submit a support request").</a></div>';
    
    }elseif( $_REQUEST['sso_failed'] == 'sso703' ){
      
      echo '<div class="sso_error sso_alert">__("Please make sure you enter a valid username/email and a valid password").</div>';
    
    }elseif( $_REQUEST['sso_failed'] == 'sso704' ){
      
      echo '<div class="sso_error sso_alert">__("Please confim that you are human by entering the correct value in the field below").</div>';
  
    }else{
      
      echo '<div class="sso_error sso_alert">__("An unknown error occured").</div>';
      
    }

  }
  
    ?>
      <header id="main-header" class="section__content " >
      
      <?php echo $this->Html->image(__('languageLogoAsset'), array( 'id'=>'logo'));?> 
          
          <label for="toggle"> <?php echo $this->Html->image('assets/menu-button.png', array( 'id'=>'menu-button'));?> </label>

      
        <nav class="menu">
          <ul>
            <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'logistics','prefix'=>'agent')); ?>"><?php echo __('Logistics'); ?></a></li> 
            <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'digital','prefix'=>'agent')) ?>"><?php echo __('Digital Support'); ?></a></li> 
            <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'marketing','prefix'=>'agent')) ?>"><?php echo __('Marketing Solutions'); ?></a></li> 
          </ul>
        </nav>

      </header>

            <section id="masthead" class="section__content ">



              <div class="tabs desktop">
                  
                 <div class="tabs__tabItem">

                      <input type="radio" id="tab-1" name="tab-group-1" checked>
                      <label for="tab-1"><?php echo __('Travel Agent'); ?></label>
                     
                      <div class="tabs__content">

                        <form target="_parent"  name="loginform" id="loginform" action="http://www.travelweek.ca/wp-login.php" method="post">
                          <input type="hidden" name="support_nonce" value="<?php echo $answer; ?>" id="support_nonce">
                          <input type="hidden" name="support_question" value="<?php echo ($number1+$number2); ?>" id="support_question">
                          <input type="hidden" value="http://www.envoynetworks.ca/" name="redirect_to">
                          <input type="hidden" name="redirect_broker" id="redirect_broker" value="http://www.envoynetworks.ca/">
                            <?php echo $this->Form->input('log',array('div'=>false,'label'=>false,'type'=>'text','class'=>'', 'placeholder'=>__('Email'))) ?>
                            <?php echo $this->Form->input('pwd',array('div'=>false,'label'=>false,'type'=>'password', 'placeholder'=>__('Password'))) ?>
                            <a class="registerAccount" href="<?php echo $this->Url->build(array('controller' => 'agents', 'action' => 'sso_register','prefix'=>'agent')); ?>"><?php echo __('Register an Account'); ?></a>
                          <a href="<?php echo $this->Url->build(array('controller' => 'password', 'action' => 'forgot','prefix'=>'agent')); ?>"><?php echo __('Forgot Password'); ?></a>
                          <input class="button" type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php echo __('Login'); ?>" />  
                        </form>

                        <?php /*
                        <?php echo $this->Form->create('LoginData', array('url' => array('controller'=>'main', 'action' => 'login', 'prefix' => 'agent'), 'id' => 'agent-login')); ?>
                        <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'', 'placeholder'=>__('Email'))) ?>
                        <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'type'=>'password', 'placeholder'=>__('Password'))) ?>
                        <a class="registerAccount" href="<?php echo $this->Url->build(array('controller' => 'agents', 'action' => 'sso_register','prefix'=>'agent')); ?>"><?php echo __('Register an Account'); ?></a>
                        <a href="<?php echo $this->Url->build(array('controller' => 'password', 'action' => 'forgot','prefix'=>'agent')); ?>"><?php echo __('Forgot Password'); ?></a>
                        <button class="button" type="submit"><?php echo __('Login'); ?></button>
                        <?php echo $this->Form->end(); ?>
                        */ ?>

                      </div> 
                 </div>
                  
                  <div class="tabs__tabItem">

                     <input type="radio" id="tab-3" name="tab-group-1">
                     <label for="tab-3"><?php echo __('Supplier'); ?></label>
                   
                     <div class="tabs__content">

                      <?php echo $this->Form->create('Supplier',array('url'=>array('controller'=>'main','action'=>'login','prefix' => 'supplier')));?>
                      <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text', 'placeholder'=>__('Username'))) ?>
                      <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'placeholder'=>__('Password'))) ?>

                      <button class="button" type="submit"><?php echo __('Login'); ?></button>

                       <?php echo $this->Form->end(); ?>

                     </div> 
                  </div>
                  
              </div>

              <div class="section__content">
                  <h2>
                    <?php echo __('HomePopupLeftCol1') ?>
                  </h2>

                  <button class="button button--green">
                    <a href="<?php echo $this->Url->build(array('controller' => 'agents', 'action' => 'register','prefix'=>'agent')); ?>">
                      <span><?php echo __('BECOME A PART OF THE NETWORK') ?></span>
                    </a>
                  </button>

              </div>

          </section>
          
          <section class="box box__blue overview">
            
             <?php echo $this->Html->image('assets/mastheadBgVans.png');?> 
              
              <div class="section__content ">
                <p>
                  <?php echo __('ENVOY is a distribution and fulfillment company that specializes in providing the travel industry with ') ?><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'marketing')); ?>"><br/><?php echo __('custom marketing solutions') ?></a>.
                </p>
                <h5><?php echo __('Our business is built on:') ?></h5>

                <ul>
                  <li><?php echo __('Partnerships') ?></li>
                  <li><?php echo __('Intelligence') ?></li>
                  <li><?php echo __('Reach') ?></li></ul>
          
                <button class="button button--white button--full-width "> <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'overview')); ?>">
                <?php echo __('THE ENVOY OVERVIEW') ?></a></button>
                <br style="clear:both" />
              </div>
          </section>
          
          <section id="green-circle" class="section__content">
                      
                      <p class=" white-text " id="third-section-paragraph"><?php echo __('With significant investments in equipment, vehicles, infrastructure and technology. Envoy represents its modern position by exceeding the requirements of the Travel & Tourism industry.') ?></p>
          </section>


          <section  class="section__content">
            <h3 class="blue-text about-heading"><?php echo __('About ENVOY') ?></h3>
            <p class="gray-text font-large" class="section__content"><?php echo __('Envoy specializes in providing the Travel & Tourism industry with custom programs to deliver marketing campaigns that facilitate successful transactions. By leveraging it\'s extensive partnerships in Travel & Tourism, unparalleled reach is achieved to consumer & retail outlets.') ?></p>


          </section>

      



 <!--Start copyright Line content /-->

 <section class="" id="partners">
<div class="section__content">
 <h3 class="blue-text"><?php echo __('Some of Our Partners') ?></h3>
 </div>
 <div class="section__images section__content">
    <?php echo $this->Html->image('assets/partners/usa.png', array('alt' => '', 'style' =>  'max-width:216px;margin:25px;'));?>
    <?php echo $this->Html->image('assets/partners/g-adventures.png', array('alt' => '', 'style' =>  'max-width:216px;margin:25px;'));?>
    <?php echo $this->Html->image('assets/partners/travel-guard.png', array('alt' => '', 'style' =>  'max-width:216px;margin:25px;'));?>
    <?php echo $this->Html->image('assets/partners/star-clippers.png', array('alt' => '', 'style' =>  'max-width:216px;margin:25px;'));?>
    <?php echo $this->Html->image('assets/partners/resorts-of-ontario.png', array('alt' => '', 'style' =>  'max-width:216px;margin:25px;'));?>
    <?php echo $this->Html->image('assets/partners/ensemble.png', array('alt' => '', 'style' =>  'max-width:216px;margin:25px;'));?>
    <?php echo $this->Html->image('assets/partners/bahia-principe.png', array('alt' => '', 'style' =>  'max-width:216px;margin:25px;'));?>
    <?php echo $this->Html->image('assets/partners/travelbrands_logo_216px.png', array('alt' => '', 'style' =>  'max-width:216px;margin:25px;'));?>
    <?php echo $this->Html->image('assets/partners/WestJet_vacations_E_logo_cmyk_216px.png', array('alt' => '', 'style' =>  'max-width:216px;margin:25px;'));?>
  </div>
 </section>

  <section class="" id="footer">
  <div class="section__content">
    
      <div id="Travelweek_Holder">
   <a href="http://travelweek.ca" target="_blank"><?php echo $this->Html->image('assets/site_logos/logoTravelWeekGroup.svg',array('alt'=>'Travel Week - A Travel Week Company'));?> </a>
    <p>© Copyright Envoy Networks Inc. <?php echo date("Y"); ?></p>
</a>
  </div>
  </section>

<!--POPUP 
<?php 
    echo $this->Html->css('jquery.smartModal');
    echo $this->Html->script('jquery.smartModal.min');
      echo $this->Html->script('jquery.cookie');
 ?>

<div class="smartmodal auto" style="    z-index: 999999;
    border-radius: 0px;
    color: rgb(0, 0, 0);
    padding: 47px;
    position: absolute;
    top: 191px !important;
    display: block;
    margin: 0px auto 0px;
    width: 984px !important;
    left: 50% !important;
    height: 418px !important;
    background: url(http://www.envoynetworks.ca/img/overlay.png) 100% 0% no-repeat;
    margin-left: -483px !important;
    cursor:pointer;
    border: medium solid black;
">
<a href="#" style="display:block;width:100%;position:fixed;
left:0;top:0;cursor:pointer;height:100%;z-index:10000;" class="close"></a>

<h2 style="width:50%;text-align:center;"><?php echo __('HomePopupLeftCol1') ?></h2>

<p style="
    width: 50%;
    box-sizing:border-box;
    text-align: center;
    line-height: 3rem;
    font-size: 80%;
    color: #333;
    border-top: 1px solid #ddd;
    padding-top: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 20px;
    padding-left:10px;
    padding-right:10px;
     color: #3C5991;
"><?php echo __('HomePopupLeftCol2') ?></p>

<p style="font-style: italic;
    font-size: 70%;
    width: 50%;
    text-align: center;
    font-weight: bold;
    font-size: 100%;"><?php echo __('HomePopupLeftCol3') ?></p>



<p style="
  position: absolute;
    right: 20px;
    width: 320px;
    font-size: 120%;
    top: 235px;
    text-align: center;
    padding: 39px;
    color: rgb(119,177,54);
    /* border-radius: 20px; */
   
    /* font-style: italic; */
    /* font-weight: bold; */
    line-height: 180%;
    /* font-weight: bold; */
"><?php echo __('HomePopupRightCol1') ?></p>
</div>

<style type="text/css">
  
    .smartmodal-overlay {

  background:rgba(255,255,255,0.3) !important;
  border-radius:0 !important;

    }

   .smartmodal {
    /*top: 194px !important;*/
    top: 166px !important;
    display: block;
    width: 984px !important;
    left: 50% !important;
  }


  @media screen and (max-width: 959px){
    .smartmodal, .smartmodal-overlay {
      display:none !important;
    }
}

</style>

<script type="text/javascript" language="javascript">
        $(".iframe-link').fancybox({
        'width'       : '45%',
        'height'      : '70%',
        'autoScale'     : false,
        'transitionIn'    : 'none',
        'transitionOut'   : 'none',
        'type'        : 'iframe'
      });
</script>

<script type="text/javascript" >
$(document).ready(function() {

    $.smartModal({
      clickClose:true
    });

  $('#LoginDataDigits1, #LoginDataDigits2, #LoginDataDigits3').autotab_magic().autotab_filter('numeric');
})

</script>
POPUP-->