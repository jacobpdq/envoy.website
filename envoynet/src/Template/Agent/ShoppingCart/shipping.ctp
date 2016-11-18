<div class="inner-content-wrapper">

    <div id="profile_info">
        <?php echo $this->Form->create($orderForm,['id'=>'CartAgentIndexForm','url'=>array('controller'=>'ShoppingCart','action'=>'processOrder','prefix' => 'agent')]); ?>


        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt"><?php echo __('Company Information'); ?></span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('Company Name'); ?>:</div>
            <?php echo $this->Form->input('shipping_company', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt"><?php echo __('Personal Information'); ?></span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('First Name'); ?>:</div>
            <?php echo $this->Form->input('shipping_firstname', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('Last Name'); ?>:</div>
            <?php echo $this->Form->input('shipping_lastname', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt"><?php echo __('Mailing Information'); ?></span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('Address1'); ?>:</div>
            <?php echo $this->Form->input('shipping_address1', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'required' => true)); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('Address2'); ?>:</div>
            <?php echo $this->Form->input('shipping_address2', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('City'); ?>:</div>
            <?php echo $this->Form->input('shipping_city', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'required' => true)); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('Province'); ?>:</div>
            <?php echo $this->Form->input('shipping_province', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'required' => true)); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('Postal Code'); ?>:</div>
            <?php echo $this->Form->input('shipping_postalcode', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'required' => true)); ?>
        </div>

        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt"><?php echo __('Contact Information'); ?></span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('Email'); ?>:</div>
            <?php echo $this->Form->input('shipping_email', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('Tel'); ?>:</div>
            <?php echo $this->Form->input('shipping_phonenumber', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>


    </div>
    <div id="profile_info_shipping">
    <div id="Profile_form_holder" class="Base_red_form_txt">
    <span class="data_Headers_Bl_txt"><?php echo __('Order Comments'); ?></span></div>

    <div id="form_content_discription_left">
    <div id="blank_form_holder_bg9"><input type="text" id="Form_holder_style_short" name="order_comments"></div>
    <div id="profile_submit_Holder"><button ref="submit" type="submit" id="Submit_btn"><?php echo __('Submit'); ?></button></div>
    </div>
    </div>

    <?php echo $this->Form->end(); ?>
</div>