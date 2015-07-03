<div class="orders view">
<h2><?php echo __('Select Delivery Mode');?></h2>
	<div id="Profile_inset_orders3">

<div id="order_column_09">
    <div id="confirm_data_holder" class="Base_red_form_txt">
    <span class="data_Headers_Bl_txt">Order Details</span>

<h4>        <div id="Confirm_order_inset_Holder"> <span class="Base_txt">Order Id: </span><span class="data_Headers_Bl_txt"><?php echo $order['id']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt">Company Name: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_company']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt">First Name: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_firstname']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt">Last Name: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_lastname']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt">Address1: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_address1']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Address 2: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_address2']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> City: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_city']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Province: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_province']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Postal Code: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_postalcode']; ?></span><br></div>
       </div> 
        </div>
        
 
<div id="order_column_10">
    <div id="confirm_data_holder" class="Base_red_form_txt">        
    <br>    
    <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Order Date: </span><span class="data_Headers_Bl_txt"><?php echo $order['created']; ?></span></div>     
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Tel: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_phonenumber']; ?></span></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Email: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_email']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Order Source: </span><span class="data_Headers_Bl_txt"><?php echo $order_owners[$order['owner_type']]; ?></span></div> 
  <?php if($order['priority']=='1'):?>              
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Delivery Type: </span><span class="data_Headers_Bl_txt">Rush</span><br></div>
   <?php elseif($order['priority']=='0'):?> 
         <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Delivery Type: </span><span class="data_Headers_Bl_txt">Normal</span><br></div>
  <?php endif;?>   
     <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Must Arrive By: </span><span class="data_Headers_Bl_txt"><?php echo $order['arrival_due_date']; ?></span></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Order Comments: </span><span class="data_Headers_Bl_txt"><?php echo $order['order_comments']; ?></span><br></div></h4>
    </div>
</div>

</div>
<div id="order_column_08">
<div class="related">
	
	<?php 
      $orderItemID = '';
  if (!empty($this->request->data['order_items'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Brochure Name'); ?></th>
		<th><?php echo __('Qty Ordered'); ?></th>
		<th><?php echo __('Qty Shipped'); ?></th>
        <th><?php echo __('Status'); ?></th>
        <th><?php echo __('Weight (kg)'); ?></th>
		<th><?php echo __('Ship via'); ?></th>
	</tr>
	<?php
		$i = 0;
		$package_weight = 0;

		foreach ($this->request->data['order_items'] as $orderItem):
		  if ($orderItem['status'] == 6 or $orderItem['status'] == 0) {
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			
		?>
		<tr<?php echo $class;?>>
			<td><?php  echo $orderItem['brochure']['name'];?></td>
			<td><?php echo $orderItem['qty_ordered'];?></td>
			<td><?php echo $orderItem['qty_shipped'];?></td>
           
		  <?php if ($orderItem['status'] == 0) {
            $colourclass = ' class="red"';
			  }
			  else {
			  $colourclass = null;} ?>
             
		 <td <?php echo $colourclass;?> >
		 <?php  echo $order_item_statuses[$orderItem['status']];?>
            </td>
        <?php    if ($orderItem['status'] == 6) {
		          $line_weight = $orderItem['brochure']['weight'] * $orderItem['qty_shipped'] / 1000;
				  } 
				  else {
				  $line_weight = 0;
				  }
		          $package_weight = $package_weight + $line_weight; ?>
		<td>
		 <?php  echo $line_weight;?>
            </td>	
            <td>
		 <?php  echo $shipvia[$orderItem['shipped_via']];?>
            </td>
		</tr>  
        <?php } ?>
	<?php endforeach; ?>
    <tr><td class="blankrow"></td><td class="blankrow"></td><td class="blankrow"></td><td class="blankrow"></td><td class="blankrow"></td><td class="blankrow"></td></tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
     <td><?php echo "Total Weight";?></td>
     <td><?php echo $package_weight;?></td>
     <td></td>
    </tr>
	</table>
<?php endif; ?>

</div>
<fieldset class="deliverymode">
 <legend>Select Delivery Mode</legend>
<?php echo $this->Form->create('Order'); ?>
 
          <?php echo $this->Form->input('OrderItem.id', array('value'=>$orderItemID, 'hidden'=>'hidden', 'label'=>false));?>
        
       <ul class="form_radio_btns">   
     
          <?php echo $this->Form->input('shipped_via',array(
                      'type'=>'radio',
                      'options'=>array(
                        '0'=>'<span class="Base_red_txt" &quot;="">&nbsp;&nbsp;Canpar</span>',
                        '1'=>'<span class="Base_red_txt" &quot;="">&nbsp;&nbsp;UPS</span>',
                        '2'=>'<span class="Base_red_txt" &quot;="">&nbsp;&nbsp;Purolator</span>',
                        '3'=>'<span class="Base_red_txt" &quot;="">&nbsp;&nbsp;Canada Post</span>',
                        '4'=>'<span class="Base_red_txt" &quot;="">&nbsp;&nbsp;Envoy</span>'
                      ),
                      'default'=>'0',
					             'before' => '<br><li class="deliverymode">',
                      'between' => '',
                      'separator' => '</li><li class="deliverymode">',
                      'escape' => false
                  )
              );?>
          </ul>
            </fieldset>  
          <?php echo $this->Form->submit(__('Select Delivery Mode'));  ?>
          <?php echo $this->Form->end();  ?>

</div>


<?php echo $this->Html->link(
    'Print Packing Slip',
     array(
    'controller' => 'orders', 'action' => 'printpack', $order['id']),
    array('class' => 'button', 'target' => '_blank'));  ?>
    
     <br>
	<br />
	
<?php echo $this->Html->link(
    'Back',
     array(
    'controller' => 'order_items', 'action' => 'pack', $order['id']),
    array('class' => 'button')); ?>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
    <?php echo $this->Html->link(
    'Next',
     array(
    'controller' => 'orders', 'action' => 'ship2', $order['id']),
    array('class' => 'button'));  ?>