<div id="Main_content_Holder">

    <!--Start Login screen content /-->

    <!--Envoy Logo /-->
    <div id="Logo_Menu_Holder">
	 <div id="Logo_Holder">
	<?php echo $this->Html->image('assets/site_logos/main_envoy_logo.png');?>
    </div>
     <div id="Search_Interface">
      <ul id="navbar">
       <li>
        <a>Services1</a> 
        <ul>
           <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'logistics','prefix'=>'agent')); ?>">Logistics</a></li> 
            <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'digital','prefix'=>'agent')) ?>">Digital support</a></li> 
<li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'marketing','prefix'=>'agent')) ?>">Marketing solutions</a></li> 
        </ul>
    </li>

    <li>
      <a> About Us</a>
        <ul>
            <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'overview','prefix'=>'agent')); ?>">Overview</a></li>

            <li><a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'meettheteam','prefix'=>'agent')); ?>">Meet the Team</a></li>
        </ul>
    </li>

     <li id="last">
        <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'contactus','prefix'=>'agent')); ?>">Contact Us</a> 
    </li> 
      </ul>
      
     </div>
    
  </div>
    <!--End Envoy Logo /-->

    <!--Start Login screen content /-->
 
  <!--rotating images/login start /-->  
 <?php echo $this->Flash->render(); ?> 
 
 
  <div id="login_image_holder"> 
  
  <!--rotating image start/-->
    <div id="rotating_image_holder">

    
 <ul class="bxslider">
  <li><?php echo $this->Html->image('bg_images/branding.jpg');?></li>
  <li><?php echo $this->Html->image('bg_images/branding2.jpg');?></li>
  <li><?php echo $this->Html->image('bg_images/branding3.jpg');?></li>
  </ul>
    
    </div>
    <!--rotating image end/-->     
    
     <!--agent login start/-->
         <div id="agent_login_holder">
   <?php /*if ($this->request->session()->check('Message.auth')): ?>
    <?php echo $this->request->session()->flash('auth'); ?>
    <?php endif; */ ?> 
    
    <?php echo $this->Form->create('LoginData', array('url' => array('controller'=>'main', 'action' => 'login', 'prefix' => 'agent'), 'id' => 'agent-login')); ?>
      <h1 id="agent-login-text">Travel Agent Login</h1>
          <div class="form_content_field_left5">
      
        <div class="blank_form_holder_bg5">
          <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'Form_holder_style5', 'placeholder'=>"Username")) ?>
        </div>
      </div>

      <div class="form_content_field_left5">
       
        <div class="blank_form_holder_bg5">
          <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'Form_holder_style5', 'placeholder'=>"Password")) ?>
        </div>
      </div>
<!--
    <ul id="phone-input">
      <li>
        <?php /* echo $this->Form->input('digits1', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'3', 'MAXLENGTH' => '3','class'=>"required number", 'placeholder'=>"123")) ?>
      </li>
    
      <li>
        <?php echo $this->Form->input('digits2', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'3', 'MAXLENGTH' => '3','class'=>"required number", 'placeholder'=>"123")) ?>
      </li>
    
      <li>
        <?php echo $this->Form->input('digits3', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'4', 'MAXLENGTH' => '4','class'=>"required number", 'placeholder'=>"1234")) */ ?>
      </li>
    </ul>
      <div id="agent-login-instructions">
 (Enter your phone number)
  </div>
-->

        <div id="profile_submit_Holder">
          <button class="button" type="submit">Login</button>
       <!--    <?php echo $this->Html->link('Register',array('controller' => 'agents', 'action' => 'register','prefix' => 'agent'));?> /-->
        </div>


    <?php echo $this->Form->end(); ?>
        </div>
          <!--agent login end/-->
          
          <!--supplier login start/-->  
         <div id="supplier_login_holder">
          <h1 id="agent-login-text">Supplier Login</h1>
   <?php echo $this->Form->create('Supplier',array('url'=>array('controller'=>'main','action'=>'login','prefix' => 'supplier')));?>
   
    <div class="form_content_field_left5">
      
        <div class="blank_form_holder_bg5">
          <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'Form_holder_style5', 'placeholder'=>"Username")) ?>
        </div>
      </div>

      <div class="form_content_field_left5">
       
        <div class="blank_form_holder_bg5">
          <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'Form_holder_style5', 'placeholder'=>"Password")) ?>
        </div>
      </div>
<div id="profile_submit_Holder">
      <button class="button" type="submit">Login</button>
    </div>
    
    
       <div id="estore_logo_holder">
        <a href="http://v2.printsys.net/register.aspx?tokenid=BBGAAY872" target="_blank">
       <?php echo $this->Html->image('assets/site_logos/ENVOYeSTORE_ClickPrint_RGB.jpg');?>
       </a>
       </div>
    
    
    
        </div>
         <!--supplier login end/-->
      
      
    
       
       
  </div>
<!--rotating images/login end /-->  


  
   
</div>

 <!--Start copyright Line content /-->

    <div class="Hippo_Copyright_Line" id="Main_copyright_Holder">© Copyright Envoy Network Inc. 2013
      <div id="Travelweek_Holder">
	  <a href="http://travelweek.ca" target="_blank">
	  <?php echo $this->Html->image('assets/site_logos/travel_week_logo.png',array('alt'=>'Travel Week - A Travel Week Company'));?> </a>
      </div>
    </div>
    <!--End copyright Line content /-->

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
