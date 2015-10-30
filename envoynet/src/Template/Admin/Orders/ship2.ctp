<div class="orders view">
<h2><?php echo __('Export Waybill Data');?></h2>
	<div id="Profile_inset_orders3">

<div id="order_column_09">
    <div id="confirm_data_holder" class="Base_red_form_txt">
    <span class="data_Headers_Bl_txt">Order Details</span>

<h4>        <div id="Confirm_order_inset_Holder"> <span class="Base_txt">Order Id: </span><span class="data_Headers_Bl_txt"><?php echo $order['id']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Company Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_company']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('First Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_firstname']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Last Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_lastname']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt">Address1: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_address1']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Address 2: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_address2']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('City'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_city']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('Province'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_province']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('Postal Code'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_postalcode']; ?></span><br></div>
       </div> 
        </div>
        
 
<div id="order_column_10">
    <div id="confirm_data_holder" class="Base_red_form_txt">        
    <br>    
    <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Order Date: </span><span class="data_Headers_Bl_txt"><?php echo $order['created']; ?></span></div>     
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Tel: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_phonenumber']; ?></span></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('Email'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_email']; ?></span><br></div>
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
   <?php if ($order['shipped_via'] == 0) {
   $waybillexport = 'waybillExportcanpar';
   ?>
          <div class="tools2">
     <div id="csv-export-btn">Export data for waybill</div>
       </div>
  <?php }
  else if ($order['shipped_via'] == 1) {
   $waybillexport = 'waybillExportups';
   ?>
          <div class="tools2">
     <div id="csv-export-btn">Export data for waybill</div>
       </div>
  <?php }
  
  else {   ?>
   <div class="tools2">
     <div id="csv-export-btn2">Export only required for Canpar and UPS</div>
       </div>
<?php } ?>


<?php echo $this->Html->link(
    'Print Packing Slip',
     array(
    'controller' => 'orders', 'action' => 'printpack', $order['id']),
    array('class' => 'btn', 'target' => '_blank'));  ?>
    
     <br>
	<br />
	
<?php echo $this->Html->link(
    'Back',
     array(
    'controller' => 'orders', 'action' => 'ship', $order['id']),
    array('class' => 'btn'));  ?>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
    <?php echo $this->Html->link(
    'Next',
     array(
    'controller' => 'orders', 'action' => 'ship3', $order['id']),
    array('class' => 'btn'));  ?>
     
</div>





	
    <div class="popup" id="csv-report-popup">
  <?php echo $this->Form->create('Report',array('url'=>array('controller'=>'Reports','action'=>$waybillexport,'prefix' => 'admin'),'id'=>'orders-export-form'));?>
  <fieldset>
    <legend>Enter the Number of Packages</legend>
    <ol>
       <li><?php echo $this->Form->input('boxes',array('label'=>'Boxes'));?></li>
       <li><?php echo $this->Form->input('orderid',array('label'=>'Order Id','type'=>'hidden', 'value'=>$order['id']));?></li>
       <li><?php echo $this->Form->input('weight',array('label'=>'Weight','type'=>'hidden', 'value'=>$package_weight));?></li>
        </ol>
  </fieldset>
  <?php echo $this->Form->end();?>
  
  
  
</div>

<script type="text/javascript" >
  $(document).ready(function() {
    
    $( "#csv-report-popup" ).dialog({
        autoOpen: false,
        height: 300,
        width: 820,
        modal: true,
        title: "<?php echo __('Export to Excel');?>",
        buttons: {
            "Export": function() {

                    $('#orders-export-form').submit();
           
            },
            Close: function() {
                $( this ).dialog( "close" );
            }
        },
        close: function() {
            allFields.val( "" ).removeClass( "ui-state-error" );
        }
    });

    $( "#csv-export-btn" )
    .button()
    .click(function() {
        $( "#csv-report-popup" ).dialog( "open" );

    });
	
	 $( "#csv-export-btn2" )
    .button()
    .click(function() {
        $( "#csv-report-popup2" ).dialog( "open" );

    });


     $( "#filter-popup" ).dialog({
        autoOpen: false,
        height: 300,
        width: 520,
        modal: true,
        title: "<?php echo __('Filter orders by date');?>",
        buttons: {
            "Filter": function() {

                    $('#orders-filter-form').submit();

            },
            Close: function() {
                $( this ).dialog( "close" );
            }
        },
        close: function() {
            allFields.val( "" ).removeClass( "ui-state-error" );
        }
    });


    $( "#filter-btn" )
    .button()
    .click(function() {
        $( "#filter-popup" ).dialog( "open" );

    });
 });

</script>
