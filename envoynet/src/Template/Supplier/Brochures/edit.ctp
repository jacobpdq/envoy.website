<div class="inner-content-wrapper">
  <?php echo $this->Form->create('Brochure', array('url' => array('controller' => 'Brochure', 'action' => 'edit', 'prefix' => 'supplier'))); ?>
  <div id="profile_info">

    <div class="form_content_field_left2">
      <div class="User_Name_Form_Holder"><label for="title"><span class="Base_red_form_txt"><em></em></span> <?php echo __('Title'); ?>:</label></div>
      <?php echo $this->Form->input('name', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'disabled' => true)); ?>
    </div>

    <div class="form_content_field_left1">
      <div class="User_Name_Form_Holder"><label for="title"><span class="Base_red_form_txt"><em></em></span> <?php echo __('Brochure Language'); ?>:</label></div>
      <?php echo $this->Form->input('is_french', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'disabled' => true)); ?>
    </div>


    <div id="form_content_discription_left">
      <div class="User_Name_Form_Holder" class="Base_txt"><label for="title"><span class="Base_red_form_txt"><em></em></span> <?php echo __('Brochure Description'); ?> :</label></div>
      <?php echo $this->Form->input('description', array('label' => false, 'div' => 'blank_form_holder_bg9', 'class' => 'Form_holder_style2', 'disabled' => true)); ?>
    </div>

   <div class="form_content_field_left1">
      <div class="User_Name_Form_Holder"><?php echo __('Max order'); ?>:</div>
      <?php echo $this->Form->input('max_order', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'disabled' => true)); ?>
   </div>



<!-- added by glen -->
    <div class="form_content_field_left2">
      <div class="User_Name_Form_Holder"><?php echo __('Brochures per box'); ?>:</div>
      <?php echo $this->Form->input('qty_box', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'disabled' => true)); ?>
    </div>
   
    
    <div class="form_content_field_left2">
      <div class="User_Name_Form_Holder"><?php echo __('Notify me when my inventory reaches'); ?>:</div>
      <?php echo $this->Form->input('inv_notif_threshold', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'disabled' => true)); ?>
    </div>
 
  <div class="form_content_field_left2">
</div>
 
<!-- end of added by glen -->
    <div class="form_content_field_left1">
      <div class="User_Name_Form_Holder"><?php echo __('Total Inventory'); ?>:</div>
      
  <?php echo $this->Form->input('inv_balance', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'disabled' => true)); ?> 

    <!--       <a href="<?php echo $this->Url->build(array('controller'=>'brochures','action'=>'edit',$brochure['Brochure']['id'],'prefix' => 'supplier'));?>"><div id="Edit_Product_btn">View Details</div></a>
         <a href="/supplier/deleteProduct?productId33=595"><div id="Delete_Product_btn"></div></a>     -->
        </div>
     
         <div class="form_content_field_left1">
      <div class="User_Name_Form_Holder"><?php echo __('Ontario Inventory'); ?>:</div>
       <?php echo $this->Form->input('Ontario_inventory', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'disabled' => true)); ?> 
        </div>  
        
                 <div class="form_content_field_left1">
          </div>  
        
                 <div class="form_content_field_left1">
      <div class="User_Name_Form_Holder"><?php echo __('BC Inventory'); ?>:</div>
      <?php echo $this->Form->input('BC_inventory', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2', 'disabled' => true)); ?> 
        </div> 

              
 
  </div>

  <div id ="edit_brochure_info_right">
    <div id="edit_profile_image">

      <div id="Profile_form_holder" class="Base_view_form_txt"> &nbsp;&nbsp;<span class="data_Headers_Bl_txt"><?php echo __('Product Image'); ?></span></div>

      <div id="edit_content_holder">
 <!-- glen      <?php echo $this->Html->image('brochures/' . $this->request->data['Image']['filename']); ?> <a class="suppiler_product single_image"title="<?php echo $brochure['Brochure']['name'];?>" href="<?php echo $this->Url->build("/img/brochures/".$brochure['Image']['filename']);?>">
  -->   
               <?php echo $this->ImageResize->resize('brochures/' . $this->request->data['image']['filename'], 187, 260, false);?>
       
      </div>
 <div class="form_content_field_left1">
 <br> <br> <br>
    <small><?php echo __('Note: Should you wish to change any of these settings, please send request to <a href="mail@envoynetworks.ca">mail@envoynetworks.ca</a> or phone 905-831-0006'); ?></small>
          </div>
    </div>
  </div>



</div>

<br style="clear:both" />
<!--  
<div class="brochures form">
<?php echo $this->Form->create('Brochure'); ?>
                <fieldset>
                  <legend><?php echo __('Edit Brochure'); ?></legend>
                  <ol>
                    <li><?php echo $this->Form->input('name'); ?> </li>
                    <li><?php echo $this->Form->input('description'); ?> </li>
                    <li><?php echo $this->Form->input('max_order'); ?> </li>
                    <li><?php echo $this->Form->input('inv_balance'); ?> </li>
                    <li><?php echo $this->Form->input('inv_notif_treshold'); ?> </li>
                  </ol>
                </fieldset>
                <fieldset class="submit">
<?php echo $this->Form->end(__('Submit')); ?>
  </fieldset>
</div>
-->
