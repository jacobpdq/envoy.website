<div class="inner-content-wrapper">
<!-- <?php echo pr($this->request->data); ?> -->
  
  <div id="profile_info1">
  <BR>
   <div id="Company_Title">
  <?php  $brochurename=$this->request->data['brochname'];?>
        <span class="Company_Title_txt_lg"><?php echo $brochurename;?>
        </span>
   </div>
        
        
   <div id="Profile_form_holder1" class="Base_red_form_txt"> <BR><BR>&nbsp;&nbsp;&nbsp;<span class="data_Headers_Bl_txt">Please complete the following:</span></div>
  
  <?php echo $this->Form->create('Ebrochureorder',array('url'=>array('controller'=>'Ebrochureorders','action'=>'placeOrder','prefix' => 'agent'))); ?> 
   
   <?php echo $this->Form->input('id',array('label'=>false,'type'=>'hidden')); ?>
  <?php echo $this->Form->input('brochure_id',array('label'=>false,'type'=>'hidden')); ?>
  <?php echo $this->Form->input('supplierid',array('label'=>false,'type'=>'hidden')); ?>
  <?php echo $this->Form->input('agent_id',array('label'=>false,'type'=>'hidden')); ?>
  <?php echo $this->Form->input('brochname',array('label'=>false,'type'=>'hidden')); ?>
  <?php echo $this->Form->input('webaddress',array('label'=>false,'type'=>'hidden')); ?>
  
   <div class="form_content_field_full">
            <div class="User_Name_Form_Holder" class="Base_txt"><?php echo __('First Name'); ?>: </div>
            <?php echo $this->Form->input('agentfirst', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>
  
  <div class="form_content_field_full">
            <div class="User_Name_Form_Holder" class="Base_txt">Last Name: </div>
            <?php echo $this->Form->input('agentlast', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>
        
         <div class="form_content_field_full">
            <div class="User_Name_Form_Holder" class="Base_txt">E-mail: </div>
            <?php echo $this->Form->input('email', array('label' => false, 'div' => 'blank_form_holder_bg2', 'class' => 'Form_holder_style2')); ?>
        </div>
        <div id="profile_submit_Holder"><button ref="submit" type="submit" id="Submit_btn"></button></div>
      <?php echo $this->Form->end(); ?>    
  </div> 


</div>
