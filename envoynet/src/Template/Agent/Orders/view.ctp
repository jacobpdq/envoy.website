<div class="inner-content-wrapper" style="clear:both" />


<div id="order_column_05" >
    <div id="confirm_data_holder" class="Base_red_form_txt">
    
        <span class="data_Headers_Bl_txt"><?php echo __('Delivery Address'); ?></span>

        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Order Number'); ?> </span><span class="data_Headers_Bl_txt"><?php echo $order['id']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Company Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_company']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('First Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_firstname']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Last Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_lastname']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Address1'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_address1']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Address2'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_address2']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('City'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_city']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('Province'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_province']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('Postal Code'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_postalcode']; ?></span><br>
    </div>
 </div>
</div>
<div id="order_column_06">
    <div id="confirm_data_holder" class="Base_red_form_txt">         
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Tel: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_phonenumber']; ?></span><br></div>
    <!--    <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Fax: </span><span class="data_Headers_Bl_txt"></span><br></div>  -->
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('Email'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_email']; ?></span><br></div>
   <!--     <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Delivery Type: </span><span class="data_Headers_Bl_txt"><?php echo $order['priority']; ?></span><br></div>  -->
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Order Comments'); ?>:</span><span class="data_Headers_Bl_txt"><?php echo $order['order_comments']; ?></span><br></div>
    </div>
</div>
  
<div id="order_column_07">

  <div id="Confirm_order_inset_Holder"><span class="data_Headers_Bl_txt"><?php echo __('Order Details'); ?></span></div>
	
	<?php if (!empty($order['order_items'])):?>
	<table class="index2" style="width:100%;">
	<tr>
	
	
		<th><?php echo __('Brochure Name'); ?></th> 
        <th><?php echo __('Language'); ?></th> 
		<th><?php echo __('Qty Ordered'); ?></th>
		<th><?php echo __('Qty Shipped'); ?></th>
        <th><?php echo __('Status'); ?></th>
        <th><?php echo __('Shipped Via'); ?></th>
        <th><?php echo __('Tracking num'); ?></th>

        		
	</tr>
	<?php
		$i = 0;

		foreach ($order['order_items'] as $orderItem):


			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>

			
            <td><?php echo $orderItem->brochure['name'];?></td>
            <td><?php if ($orderItem->brochure['is_french'] == 1) {echo __('French');} else {echo __('English');}?></td>
			<td><?php echo $orderItem['qty_ordered'];?></td>
			<td><?php echo $orderItem['qty_shipped'];?></td>
            <td><?php echo $order_item_statuses[$orderItem['status']];?></td>
            <td><?php echo $shipvia[$orderItem['shipped_via']];?></td>
            <td><?php echo $orderItem['tracking_number'];?></td>
     			
		</tr>
	<?php endforeach; ?>
	</table>
    <br style="clear:both" />
<?php endif; ?>
<br style="clear:both" />
</div> 
<br style="clear:both" />
</div>
<br style="clear:both" />
</div>
</div>
<br style="clear:both" />