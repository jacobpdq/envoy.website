
    <?php echo $this->Form->create('Admin',array('url'=>array('controller'=>'main','action'=>'login','prefix' => 'admin')));?>
    <!--Start Login screen content /-->

    <!--Hippo Logo /-->
    <div id="Login_Logo_Holder">
      <?php echo $this->Html->image('assets/site_logos/main_envoy_logo.png');?>
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

      <button id="Submit_btn" type="submit"></button>

      
    </div>

    <!--End Login screen content /-->

    <!--Start Register content /-->
    



    <!--End Register content /-->



    <!--Start copyright Line content /-->

    <div class="Hippo_Copyright_Line" id="Main_copyright_Holder">© Copyright Envoy Network Inc. 20013
      <div id="Travelweek_Holder"><?php echo $this->Html->image('assets/site_logos/travel_week_logo.png',array('alt'=>'Travel Week - A Travel Week Company'));?></div>
    </div>
    <!--End copyright Line content /-->
  

<?php echo $this->Form->end();?>


