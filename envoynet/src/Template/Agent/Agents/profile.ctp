<div class="inner-content-wrapper">

    <div id="profile_info">
        <?php echo $this->Form->create('AgentProfile',[]); ?>


        <?php echo $this->Form->input('id',['hidden'=>'hidden','label'=>false]); ?>

        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt">Company Information</span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Company name:</div>
            <?php echo $this->Form->input('company', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt">Contact Information</span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Email:<?php echo $this->request->data['email']; ?></div>
            
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Main Travel Agency Phone Number:</div>
            <ul id="profile-phone-input">
              <li>
                <?php echo $this->Form->input('digits1', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'3', 'MAXLENGTH' => '3','class'=>"required number")) ?>
              </li>
              <li>
                <?php echo $this->Form->input('digits2', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'3', 'MAXLENGTH' => '3','class'=>"required number")) ?>
              </li>
              <li>
                <?php echo $this->Form->input('digits3', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'4', 'MAXLENGTH' => '4','class'=>"required number")) ?>
              </li>
            </ul>
        </div>


        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt">Personal Information</span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">First name:</div>
            <?php echo $this->Form->input('firstname', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Last name:</div>
            <?php echo $this->Form->input('lastname', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt">Mailing Information</span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Address:</div>
            <?php echo $this->Form->input('address', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Address2:</div>
            <?php echo $this->Form->input('address2', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">City:</div>
            <?php echo $this->Form->input('city', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Province:</div>
            <?php echo $this->Form->input('province', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Postal code:</div>
            <?php echo $this->Form->input('postalcode', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Country:</div>
            <?php echo $this->Form->input('country', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        
    
        
        
    </div>
    <div id="profile_info2">
        <div id="profile_submit_Holder">
            <button type="submit" id="Submit_btn"></button>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
