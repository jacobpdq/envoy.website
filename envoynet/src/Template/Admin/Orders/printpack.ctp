
<div class="orders view">

 <?php 
if ($order['owner_type'] == 1) {
if ($adminId == 3) {
echo ("<b>".$order['Supplier']['company']."</b></br>");
echo ("c/o 1800 Ironstone Manor</br>");
echo ("Pickering, ON  L1W 3J9</br>");
echo ("Ph: 905-831-0006");
}
else {
echo ("<b>".$order['Supplier']['company']."</b></br>");
echo ("c/o 155-6260 Graybar Rd</br>");
echo ("Richmond, BC  V6W 1H6</br>");
echo ("Ph: 604-278-1020");
}}
else{
echo $this->Html->image("assets/site_logos/ENVOY_return_address.jpg");
}
?>


</br></br>

<h2><?php echo __('Packing Slip');?></h2>
	<div id="Profile_inset_orders2">

<div id="order_column_09">
    <div id="confirm_data_holder" class="Base_red_form_txt">
    

<h4>     

       </div> 
        </div>
        
 
<div id="order_column_10">
    <div id="confirm_data_holder" class="Base_red_form_txt">        
    <br>  
   <div id="Confirm_order_inset_Holder"><span class="data_Headers_Bl_big_txt"><?php echo $order['id']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="data_Headers_Bl_big_txt"><?php echo $order['shipping_company']; ?></span><br></div>
         <?php if (!empty($order['shipping_firstname'])) { ?>
        <div id="Confirm_order_inset_Holder"><span class="data_Headers_Bl_big_txt"><?php echo $order['shipping_firstname'].'&nbsp'.$order['shipping_lastname']; ?></span></div>
        <?php } ?>
        <div id="Confirm_order_inset_Holder"><span class="data_Headers_Bl_big_txt"><?php echo $order['shipping_address1']; ?></span><br></div>
        <?php if (!empty($order['shipping_address2'])) { ?>
        <div id="Confirm_order_inset_Holder"><span class="data_Headers_Bl_big_txt"><?php echo $order['shipping_address2']; ?></span><br></div>
        <?php } ?>
        <div id="Confirm_order_inset_Holder"><span class="data_Headers_Bl_big_txt"><?php echo $order['shipping_city'].'&nbsp&nbsp'.$order['shipping_province']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="data_Headers_Bl_big_txt"><?php echo $order['shipping_postalcode']; ?></span><br></div>

<br></div></h4>
    </div>
</div>

</div>
<div id="order_column_08">
<div class="related">
	
	<?php if (!empty($order['order_items'])):?>
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
		foreach ($order['order_items'] as $orderItem):
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


<script type="text/javascript" >
function printpackslip() {
    window.print();
	//window.close();
}
printpackslip();
</script>