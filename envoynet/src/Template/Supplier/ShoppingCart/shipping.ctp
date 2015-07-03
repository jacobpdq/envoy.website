<div class="inner-content-wrapper">

    <div id="profile_info">
        <?php echo $this->Form->create('Order',array('url'=>array('controller'=>'ShoppingCart','action'=>'processOrder','prefix' => 'supplier'))); ?>


        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt">Company Information</span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Company name:</div>
            <?php echo $this->Form->input('shipping_company', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt">Personal Information</span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">First name:</div>
            <?php echo $this->Form->input('shipping_firstname', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Last name:</div>
            <?php echo $this->Form->input('shipping_lastname', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt">Mailing Information</span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Address:</div>
            <?php echo $this->Form->input('shipping_address', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Address2:</div>
            <?php echo $this->Form->input('shipping_address2', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">City:</div>
            <?php echo $this->Form->input('shipping_city', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Province:</div>
            <?php echo $this->Form->input('shipping_province', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Postal code:</div>
            <?php echo $this->Form->input('shipping_postalcode', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt">Contact Information</span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Email:</div>
            <?php echo $this->Form->input('shipping_email', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Tel:</div>
            <?php echo $this->Form->input('shipping_phonenumber', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>


    </div>
    <div id="profile_info_shipping">
    <div id="Profile_form_holder" class="Base_red_form_txt">
    <span class="data_Headers_Bl_txt">Add Comments About Your Order</span></div>

    <div id="form_content_discription_left">
    <div id="blank_form_holder_bg9"><input type="text" id="Form_holder_style_short" name="data[Order][order_comments]"></div>
    <div id="profile_submit_Holder"><button ref="submit" type="submit" id="Submit_btn"></button></div>
    </div>
    </div>

    <?php echo $this->Form->end(); ?>
</div>

