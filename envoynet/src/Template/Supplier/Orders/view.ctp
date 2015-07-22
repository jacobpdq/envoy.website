<div class="inner-content-wrapper">

<div id="Welcome_inset_Header_orders">
  <div id="Welcome_inset_text" class="Welcome_txt"><img width="136" height="15" alt="Order Information" src="../img/assets/header_files/Order-Information.png"></div>
</div>

<div id="Profile_inset_orders">

<div id="order_column_05">
    <div id="confirm_data_holder" class="Base_red_form_txt">
    <span class="data_Headers_Bl_txt"><?php echo __('Delivery Address'); ?></span>

        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Order Id'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['id']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Company Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_company']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('First Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_firstname']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Last Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_lastname']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Address'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_address1']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Address2'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_address2']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('City'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_city']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('Province'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_province']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('Postal Code'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_postalcode']; ?></span><br></div>
       </div> 
        </div>
        
 
<div id="order_column_06">
    <div id="confirm_data_holder" class="Base_red_form_txt">        
    <br>         
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('Tel'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_phonenumber']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> <?php echo __('Email'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_email']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Order Source: </span><span class="data_Headers_Bl_txt"><?php echo $order_owners[$order['owner_type']]; ?></span><br></div> 
  <?php if($order['priority']=='1'):?>              
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Delivery Type: </span><span class="data_Headers_Bl_txt">Rush</span><br></div>
   <?php elseif($order['priority']=='0'):?> 
         <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Delivery Type: </span><span class="data_Headers_Bl_txt">Normal</span><br></div>
  <?php endif;?>      
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Order Comments'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['order_comments']; ?></span><br></div>
    </div>
</div>

<div id="order_column_07">


   <?php $supplierId222 = $this->request->session()->read('Auth.User.id');?>   

  <div id="Confirm_order_inset_Holder"><span class="data_Headers_Bl_txt"><?php echo __('Order Details'); ?></span></div>
  <?php if(!empty($order['order_items'])):?>

  <table class="index2", cellpadding="0", cellspacing="0">
	<tr>
	
	
		<th><?php echo __('Brochure Name'); ?></th> 
		<th><?php echo __('Qty Ordered'); ?></th>
		<th><?php echo __('Qty Shipped'); ?></th>
        <th><?php echo __('Status'); ?></th>
        <th><?php echo __('Shipped Via'); ?></th>
        <th><?php echo __('Tracking num'); ?></th>	
	</tr>
	<?php
		$i = 0;
		$allow_add_to_order = '0';

		foreach ($order['order_items'] as $orderItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
         
      <?php 
	  if(!empty ($orderItem['brochure']['supplier'])) {
		  $mastersupplier = $orderItem['brochure']['supplier']['master_supplier'];
		  }
	  if(($orderItem['brochure']['supplier_id']==$supplierId) OR ($mastersupplier==$supplierId)):?>
			
<td><?php  echo $orderItem['brochure']['name'] ;?></td>

			<td> 
			<?php if(($orderItem['brochure']['poa']=='1') && ($orderItem['status']=='1')): ?>
			 <div class="order-item-edit">
			 <?php /*echo $this->Form->create('OrderItem',array('url'=>array('controller'=>'OrderItems','action'=>'edit','prefix' => 'supplier',$orderItem['id']))); */
        echo $this->Form->create($orderItem,array('url'=>array('controller'=>'OrderItems','action'=>'edit','prefix' => 'supplier',$orderItem['id'])));?>
          <?php echo $this->Form->input('id',array('value'=>$orderItem['id'],'label'=>false,'hidden'=>true));?>
			  <?php echo $this->Form->input('qty_ordered',array('label'=>'','value'=>$orderItem['qty_ordered']));?>
			<?php echo $this->Form->submit('Change');?>
			 <?php echo $this->Form->end();?>
			<div>
		 <?php else:?>
		<?php echo $orderItem['qty_ordered'];?>  
	  <?php endif;?>
			</td>
			<td><?php echo $orderItem['qty_shipped'];?></td>
            <td>     <?php 
			
			if($orderItem['status']=='1'):?>
   <!--       <span style="color:red">Awaiting approval</span>  -->
    <div class="order-item-edit">
           <?php $allow_add_to_order = '1';
		   	      echo $this->Html->link("Cancel", array('controller'=>'OrderItems','action'=>'unapprove', $orderItem['id'],'prefix' => 'supplier'),
                  array('class'=>'order-item-delete'),
                  sprintf(__('Are you sure you want to cancel this order item \n %s?'), $orderItem['brochure']['name'])); ?>
   

    <?php echo $this->Html->link("Approve", array('controller'=>'OrderItems','action'=>'approve', $orderItem['id'],'prefix' => 'supplier'),
                  array('class'=>'order-item-delete'),
                  sprintf(__('Are you sure you want to approve order item \n %s?'), $orderItem['brochure']['name'])); ?>
       <div>           
<!--added by glen-->
        <?php elseif($orderItem['status']=='3'):
		?>
          <span style="color:green">Out for delivery</span>

        <?php elseif($orderItem['status']=='2'):
		$allow_add_to_order = '1';
		?>
          <span style="color:red">Back ordered</span>

        <?php elseif($orderItem['status']=='4'):
		?>
          <span style="color:red">Cancelled</span>

 <!--added by glen end-->  
          <?php elseif($orderItem['status']=='0'):
		  $allow_add_to_order = '1';
		  ?>
         Approved
  <?php endif;?>         
          </td>
            <td><?php echo $shipvia[$orderItem['shipped_via']];?></td>
            <td><?php echo $orderItem['tracking_number'];?></td>
            
           </tr> 
     

  			
		
	  <?php endif;?>	
	<?php endforeach; ?>
    
    
    
    <?php if ($allow_add_to_order == '1'): ?>
    <tr>

    <td class='addbrochure'><br /><br /><b>Add Another Brochure To This Order</b> </td>

    </tr>
       
    <tr>
    <?php echo $this->Form->create('',array('url'=>array('controller'=>'OrderItems','action'=>'add','prefix' => 'supplier'))); ?>
    <td class='addbrochure'> <?php echo $this->Form->input('brochure_id',array('label'=>false, 'style'=>'width:230px'));?>	</td>
    <td class='addbrochure'> <?php echo $this->Form->input('qty_ordered',array('escape'=>false, 'style'=>'width:50px', 'placeholder' => 'Qty'));?>	</td>
    <?php echo $this->Form->input('status',array('type'=>'hidden', 'value'=>'0'));?>
    <?php echo $this->Form->input('shipped_via',array('type'=>'hidden', 'value'=>'N/A'));?>
    <?php echo $this->Form->input('tracking_number',array('type'=>'hidden', 'value'=>'N/A'));?>
    <?php echo $this->Form->input('order_id',array('type'=>'hidden', 'value'=>$order['id']));?>
  <td class='addbrochure'>  <?php echo $this->Form->submit('Add to Order');?></td>
			 <?php echo $this->Form->end();?>
    
    </tr>
    
   <?php endif;?>
    
	</table>
	
<br style="clear:both" />
	
</div>

<br style="clear:both" />
</div>

<br style="clear:both" />
</div>

<br style="clear:both" />
  <?php endif;?>
</div>

<br style="clear:both" />
