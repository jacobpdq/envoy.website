<!--Contact /-->
<div id="contact_box">
  <?php echo $this->Form->create('Contact',array('url'=>array('controller'=>'main','action'=>'contact')));?>
  <div id="contactus_Holder">
	<div id="forgotpasword_header_txt">
          <?php echo $this->Html->image("assets/header_files/contactus_header_txt.png",
                  array('alt'=>"",
                      'height'=>'96','width'=>'590')
                  );?>
        </div>


		<div class="form_content_field_left">
			<div class="Base_txt" id="User_Name_Form_Holder">Firstname:</div>
			<div id="blank_form_holder_bg"><input name="data[Contact][firstname]" id="Form_holder_style" type="text"/></div>
		</div>

		<div class="form_content_field_left">
			<div class="Base_txt" id="User_Name_Form_Holder">Lastname:</div>
			<div id="blank_form_holder_bg"><input name="data[Contact][lastname]" id="Form_holder_style" type="text"/></div>
		</div>

		<div class="form_content_field_left">
			<div class="Base_txt" id="User_Name_Form_Holder"><?php echo __('Email'); ?>:</div>
			<div id="blank_form_holder_bg"><input name="data[Contact][email]" id="Form_holder_style" type="text"/></div>
		</div>

		<div class="form_content_field_left">
			<div class="Base_txt" id="User_Name_Form_Holder">Tel:</div>
			<div id="blank_form_holder_bg"><input name="data[Contact][phonenumber]" id="Form_holder_style" type="text"/></div>
		</div>

		<div class="form_content_field_left">
			<div class="Base_txt" id="User_Name_Form_Holder">Comments:</div>
			<div id="blank_form_holder_comments"><textarea name="data[Contact][comments]" cols="10" rows="10" id="Form_holder_style_comments"></textarea></div>
		</div>



	</div>
     <button id="Submit_btn" type="submit"></button>
     <?php echo $this->Form->end();?>
    <table border="0" cellpadding="3" cellspacing="3" width="100%">
  <tbody><tr>
    <td valign="top" width="33%">
    <span class="contact_base_txt">
		Administative Office:<br/>
      122 Parliament St<br/>
      Toronto, ON<br/>
      M5A 2Y8<br/>
      Ph: 416-365-1500<br/>
      Fx: 416-365-1504<br/>
     <a href="mailto:mail@hippoexpress.ca">mail@hippoexpress.ca</a></span>
      </td>
    <td valign="top" width="33%">
    <span class="contact_base_txt">
    Eastern Warehouse:<br/>
      1800 Irontstone Manor<br/>
      Door 7<br/>
      Pickering, ON<br/>
      L1W 3J9<br/>
      Ph: 905-831-0006<br/>
      Fx: 905-831-8008<br/>
      <a href="mailto:eastwarehouse@hippoexpress.ca">eastwarehouse@hippoexpress.ca</a>      </span>
      </td>
    <td valign="top" width="33%">
    <span class="contact_base_txt">
    Western Warehouse:<br/>
      155-6260 Graybar Rd<br/>
      Richmond, BC<br/>
      V6W 1H6<br/>
      Ph: 604-278-1020<br/>
      Fx: 604-278-1716<br/>
      <a href="mailto:westwarehouse@hippoexpress.ca">westwarehouse@hippoexpress.ca</a>      </span></td>
    </tr>
</tbody></table>
</div>
<!-- end Contact /-->
