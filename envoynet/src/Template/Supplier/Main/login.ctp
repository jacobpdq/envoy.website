<?php echo $this->Form->create('Supplier',array('url'=>array('controller'=>'main','action'=>'login','prefix' => 'supplier')));?>
    <!--Start Login screen content /-->

    <!--Hippo Logo /-->
    <div id="Login_Logo_Holder">
       <?php echo $this->Html->image("assets/site_logos/main_hippo_logo.png",array('alt'=>"Hippo Express"));?>
    </div>
    <!--End Hippo Logo /-->

    <!--Start Login screen content /-->

    <div id="Suppier_Login_Holder">
      <div id="Account_Login_Text">
        <?php //echo $this->Html->image("assets/header_files/account_login_for_suppliers_only.png",array('alt'=>"Account Login for Suppliers Only"));?>
      </div>
      <div class="form_content_field_left">
        <div class="Base_txt" id="User_Name_Form_Holder"><?php echo __('User Name'); ?>:</div>
        <div class="blank_form_holder_bg2">
          <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'Form_holder_style2')) ?>
        </div>
      </div>

      <div class="form_content_field_left">
        <div class="Base_txt" id="User_Name_Form_Holder"><?php echo __('Password'); ?>:</div>
        <div class="blank_form_holder_bg2">
          <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'Form_holder_style2')) ?>
        </div>
      </div>

        <button id="Submit_btn" type="submit"><?php echo __('Submit'); ?></button>

      <br clear="all" />
      <div class="Hippo_Disclaimer" id="Disclaimer_Holder"><?php echo __('Disclaimer: This site is intended only for Travel Industry Professionals only'); ?>.
      </div>

    </div>

    <!--End Login screen content /-->

    <!--Start Register content /-->
    <div id="Register_Content_Holder" class="Hippo_Copyright_Line">
      <!--&nbsp;&nbsp;<a href="#forgotPassword2" id="fPassword2" class="suppilerBottomFoot iframe-link">Register</a>&nbsp;&nbsp;I-->
      <!--&nbsp;&nbsp;<a href="#forgotPassword" id="fPassword" class="suppilerBottomFoot iframe-link">Forgot Password</a>&nbsp;&nbsp;I-->
      &nbsp;&nbsp;<a href="<?php echo $this->Url->build(array('controller' => 'main', 'action' => 'contact', 'prefix' => false)); ?>" id="contact"  class="suppilerBottomFoot iframe-link"><?php echo __('Contact'); ?></a>&nbsp;&nbsp;|
      &nbsp;&nbsp;<a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'frameDisplay','privacy','prefix'=>false)); ?>" id="privacy" class="suppilerBottomFoot iframe-link"><?php echo __('Privacy Policy'); ?></a>&nbsp;&nbsp;|
      &nbsp;&nbsp;<a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'frameDisplay','terms','prefix'=>false)); ?>" id="terms" class="suppilerBottomFoot iframe-link"><?php echo __('Terms &amp; Conditions'); ?></a>&nbsp;</div>





    <!--End Register content /-->



    <!--Start copyright Line content /-->

   <br style="clear:both" />
<section class="" id="footer">
  <div class="section__content">
    
    <a href="http://travelweek.ca" target="_blank"><?php echo $this->Html->image('assets/site_logos/logoTravelWeekGroup.svg',array('alt'=>'Travel Week - A Travel Week Company'));?> </a>
    <p>© Copyright Envoy Networks Inc. <?php echo date("Y"); ?></p>
</a>
  </div>
  </section>

</div>
    <!--End copyright Line content /-->


<?php echo $this->Form->end();?>