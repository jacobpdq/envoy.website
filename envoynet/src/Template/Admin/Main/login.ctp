
    <?php echo $this->Form->create('Admin',array('url'=>array('controller'=>'main','action'=>'login','prefix' => 'admin')));?>
    <!--Start Login screen content /-->

    <!--Hippo Logo /-->
    <div id="Login_Logo_Holder" style="padding:10px">
<a href="<?php echo $this->Url->build(array('controller' => 'Main', 'action' => 'index')); ?>">
      <?php echo $this->Html->image('assets/envoy-logo.svg', array( 'id'=>'logo'));?> 
      </a>
    </div>
    <!--End Hippo Logo /-->

    <!--Start Login screen content /-->

    <div id="Suppier_Login_Holder">
      <div id="Account_Login_Text">
        <?php //echo $this->Html->image("assets/header_files/account_login_for_suppliers_only.png",array('alt'=>"Account Login for Suppliers Only"));?>
      </div>
      <div class="form_content_field_left">
        <div class="Base_txt" id="User_Name_Form_Holder">User Name:</div>
        <div class="blank_form_holder_bg2">
          <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'type'=>'text','class'=>'Form_holder_style2')) ?>
        </div>
      </div>

      <div class="form_content_field_left">
        <div class="Base_txt" id="User_Name_Form_Holder">Password:</div>
        <div class="blank_form_holder_bg2">
          <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'Form_holder_style2')) ?>
        </div>
      </div>

      <button id="Submit_btn" type="submit">Submit</button>

      
    </div>

    <!--End Login screen content /-->

    <!--Start Register content /-->
    



    <!--End Register content /-->



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
  

<?php echo $this->Form->end();?>


