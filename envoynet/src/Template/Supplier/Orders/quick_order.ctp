<div class="inner-content-wrapper">
    <?php echo $this->Form->create('Order',array('url'=>array('controller'=>'Orders','action'=>'processOrder','prefix' => 'supplier')));?>
    <table class="index4">
        <tbody>
            <tr>
                <th width="300px"><?php echo __("Description");?></th>
                <th width="50px"><?php echo __("Category");?></th>
                <th width="50px"><?php echo __("SKU");?></th>
                <th width="50px"><?php echo __("Quantity");?></th>
                <th width="200px"><?php echo __("Items per box or bundle");?></th>
                <th width="200px"><?php echo __("Qty in stock");?></th>
            </tr>

        <?php if(!empty($brochures)):?>
            <?php foreach($brochures  as $id=>$brochure):?>
            <tr>
                <td id="brochure_name"><?php echo $brochure['name'];?></td>
               <td>    <?php echo $brochure_categorys[$brochure['category']];?> </td>
                   <td>    <?php echo $brochure['sku'];?> </td>
                    <?php echo $this->Form->input('order_items.'.$id.'.brochure_id',array('value'=>$brochure['id'],'type'=>'hidden'));?>
                 <td>   <?php echo $this->Form->input('order_items.'.$id.'.qty_ordered',array('label'=>''));?></td>
                    
               <td>     <?php echo $brochure['qty_box'];?> </td>
               <td>    <?php echo $brochure['inv_balance'];?> </td>
                 
                
            </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>


</div>

<div class="inner-content-wrapper">

    <div id="profile_info">
      
        <div id="Profile_form_holder" class="Base_red_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt">Company Information</span></div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">Company name:</div>
            <?php echo $this->Form->input('shipping_company', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>

        <div class="form_content_field_left">
            <div class="User_Name_Form_Holder" class="Base_txt">&nbsp;</div>
            <div id="agent-search-btn">Search agent in database</div>
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
            <?php echo $this->Form->input('shipping_address1', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
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
      <span class="data_Headers_Bl_txt">Order Delivery Type</span></div>
      <ul class="form_radio_btns">
      <?php echo $this->Form->input('Order.priority',array(
                      'type'=>'radio',
                      'options'=>array('0'=>'<span class="Base_red_txt" &quot;="">&nbsp;&nbsp;"Normal"</span>','1'=>'<span class="Base_red_txt" &quot;="">&nbsp;&nbsp;"Rush"</span>'),
                      'legend'=>false,
                      'default'=>'0',
                      'before' => '<li>',
                      'after' => '</li>',
                      'escape' => false,
                      //'between' => ''
                      'separator' => '</li><li>'
                  )
              );?>
       </ul>

        <div id="form_content_discription_left">
          <div id="User_Name_Form_Holder" class="Base_txt">
            <span class="data_Headers_Bl_txt">Order Must Arrive by:</span>
          </div>
          <div class="blank_form_holder_bg2">
            <input type="text" size="6" placeholder="Click to view Calendar" name="data[Order][arrival_due_date]"  class="date Form_holder_style2">
          </div>
        </div>

      <div id="Profile_form_holder" class="Base_red_form_txt">
        <span class="data_Headers_Bl_txt">Add Comments About Your Order</span>
      </div>

      <div id="form_content_discription_left">
        <div class="blank_form_holder_bg9"><input type="textarea" id="Form_holder_style_short" name="data[Order][order_comments]"></div>
        <div id="profile_submit_Holder"><button ref="submit" type="submit" id="Submit_btn"></button></div>
      </div>
    </div>

    <?php echo $this->Form->end(); ?>
</div>

<div class="popup" id="agent-search-popup">
  <?php echo $this->Form->create('Agent',array('url'=>'#','id'=>'ajax-agent-search-form'));?>
  <fieldset>
    <legend>Company information</legend>
    <ol>
       <li><?php echo $this->Form->input('company',array('label'=>'Company name'));?></li>
       <!--
       <li><?php echo $this->Form->input('address');?></li>
       <li><?php echo $this->Form->input('city');?></li>
       <li><?php echo $this->Form->input('province');?></li>
       <li><?php echo $this->Form->input('postalcode');?></li>  
       <li><?php echo $this->Form->input('phonenumber');?></li>
      --> 
      <li><br><br>Use the percent (%) sign to represent any group of characters.<br>
      For example to find ABC Travel Professionals, you could enter %travel%.</li>
    </ol>
  </fieldset> 
  <?php echo $this->Form->end();?>
  <div id="agent-ajax-result">
    
  </div>
</div>

<script type="text/javascript" >
  $(document).ready(function() {
    $( "#agent-search-popup" ).dialog({
        autoOpen: false,
        height: 600,
        width: 900,
        modal: true,
        title: "<?php echo __('Search agent in database');?>",
        buttons: {
            "Search": function() {

               var submitData = $( "#ajax-agent-search-form" ).serialize();
               
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->Url->build(array('controller'=>'Orders','action'=>'searchAgent','prefix' => 'supplier'));?>',
                    data: submitData,
                    success: function (data) {
                      //alert(data);
                      $('#agent-ajax-result').html(data);                   
                    }
                  });
                
            },
            Close: function() {
                $( this ).dialog( "close" );
            }
        },
        close: function() {
            allFields.val( "" ).removeClass( "ui-state-error" );
        }
    });
    
    $( "#agent-search-btn" )
    .button()
    .click(function() {
        $( "#agent-search-popup" ).dialog( "open" );

    });
 });

 function update(data)
 {
 
   var obj = $.parseJSON(data); 

   $("#shipping-company").val(obj.company);
   $("#shipping-firstname").val(obj.firstname);
   $("#shipping-lastname").val(obj.lastname);
   $("#shipping-address1").val(obj.address);
   $("#shipping-address2").val(obj.address2);
   $("#shipping-city").val(obj.city);
   $("#shipping-province").val(obj.province);
   $("#shipping-postalcode").val(obj.postalcode);
   $("#shipping-email").val(obj.email);
   $("#shipping-phonenumber").val(obj.phonenumber);
   
   alert("Order Form was filled with "+obj.company+" data");

   $( "#agent-search-popup" ).dialog( "close" );

   
 }

</script>