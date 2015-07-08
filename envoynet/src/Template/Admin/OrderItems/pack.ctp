<div class="orderItems form">
<h2><?php echo __('Package Order');?></h2>
<?php  $orderItem= $this->request->data  ?>
<?php  $brochure= $this->request->data['brochure'];  ?>
<?php  $order= $this->request->data['order'];  ?>

<div id="Profile_inset_orders2">

<div id="order_column_05">
    <div id="confirm_data_holder" class="Base_red_form_txt">
    <span class="data_Headers_Bl_txt">Order Details</span>

        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Order Id'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['id']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Company Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_company']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('First Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_firstname']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"> <span class="Base_txt"><?php echo __('Last Name'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_lastname']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Address1'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_address1']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Address2'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_address2']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('City'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_city']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Province'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_province']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Postal Code'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_postalcode']; ?></span><br></div>
       </div> 
        </div>
        
 
<div id="order_column_06">
    <div id="confirm_data_holder" class="Base_red_form_txt">        
    <br>    
    <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Date'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['created']; ?></span></div>     
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Tel'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_phonenumber']; ?></span></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"><?php echo __('Email'); ?>: </span><span class="data_Headers_Bl_txt"><?php echo $order['shipping_email']; ?></span><br></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Order Source: </span><span class="data_Headers_Bl_txt"><?php echo $order_owners[$order['owner_type']]; ?></span></div> 
  <?php if($order['priority']=='1'):?>              
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Delivery Type: </span><span class="data_Headers_Bl_txt">Rush</span><br></div>
   <?php elseif($order['priority']=='0'):?> 
         <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Delivery Type: </span><span class="data_Headers_Bl_txt">Normal</span><br></div>
  <?php endif;?>   
     <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Must Arrive By: </span><span class="data_Headers_Bl_txt"><?php echo $order['arrival_due_date']; ?></span></div>
        <div id="Confirm_order_inset_Holder"><span class="Base_txt"> Order Comments: </span><span class="data_Headers_Bl_txt"><?php echo $order['order_comments']; ?></span><br></div>
    </div>
</div>


<div id="order_column_08">
<div id="confirm_data_holder">
<span class="data_Headers_Bl_txt">Order Item Details</span>

  <?php echo $this->Form->create('OrderItem'); ?>

    <ol>
        <li><?php echo $this->Form->input('id', array('value'=>$orderItem['id'], 'hidden'=>'hidden','label'=>false));?></li>
     
     
     <?php if ($orderItem['status'] == 0) {  ?> 
       <li><div id="Confirm_order_inset_Holder"><?php echo $this->Form->input('barcodes', array('label' => 'Scan barcode', 'name' => 'barcodes','autofocus' => 'autofocus')); ?></div><br><br /></li>
    <?php } ?>
      
      <li><div id="Confirm_order_inset_Holder"><?php  echo $this->Form->input('brochure.name', array('label'=>'Brochure name', 'value'=>$brochure['name'], 'readonly'=>'readonly'));?></div><br><br /></li>
      
 
            
      <li> <div id="Confirm_order_inset_Holder"><?php  echo $this->Form->input('brochure.sku', array('label'=>'Sku', 'value'=>$brochure['sku'], 'readonly'=>'readonly'));?></div><br><br /></li>
      <li><div id="Confirm_order_inset_Holder"><?php if ($orderItem['qty_shipped'] == 0) {
	  echo $this->Form->input('qty_shipped', array('label'=>'Qty shipped','value'=>$orderItem['qty_ordered'])); } 
	  else {
	   echo $this->Form->input('qty_shipped', array('label'=>'Qty shipped','value'=>$orderItem['qty_shipped'])); }
       ?></div><br><br/></li>
        <li> <div id="Confirm_order_inset_Holder"><?php  echo $this->Form->input('brochure.location', array('label'=>'Location', 'value'=>$brochure['location'], 'readonly'=>'readonly'));?></div><br><br /></li>
     
      <li><div id="Confirm_order_inset_Holder"><?php if ($orderItem['status'] == 6) {
	  echo $this->Form->input('statusfordisplay',array('label'=>'Status','value'=>$order_item_statuses[$orderItem['status']], 'class'=>'green', 'readonly'=>'readonly')); }
	  else {
	  echo $this->Form->input('statusfordisplay',array('label'=>'Status','value'=>$order_item_statuses[$orderItem['status']], 'readonly'=>'readonly')); } ?> 
      </div><br><br /></li>
      
      <li><?php echo $this->Form->input('status',array('type'=>'hidden', 'value'=>$orderItem['status'] ));?></li>
      
      <li>   <div id="Confirm_order_inset_Holder"><label>Brochure Image</label>  <a class="suppiler_product single_image"  title="<?php echo $brochure['name'];?>" href="<?php echo $this->Url->build("/img/brochures/".$brochure['image']['filename']);?>">
                  <?php 
                    if(!empty($brochure['image']['filename'])){
                      echo $this->ImageResize->resize('brochures' . DS . $brochure['image']['filename'], 69, 95, false);
                      }
                    ?>
            </a> </div></li><br><br /><br><br /><br><br />
    </ol>
  
  <fieldset class="submit">
     <?php if ($orderItem['status'] == 0) {
	  echo $this->Form->submit(__('Verify barcode')); }
	  else if ($orderItem['status'] == 6) {
	  echo $this->Form->submit(__('Update Quantity Shipped')); } ?>
  </fieldset>
 <?php echo $this->Form->end(); ?>
 
  
  <div class="paging">
      <div id="paginate_btn" class="paginate_data_txt">
        <?php
            echo $this->Paginator->counter(__('Page {{page}} of {{pages}}'));
        ?>
      </div>
      <?php echo $this->Paginator->prev('<div id="Prev_btn"></div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
      <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
      </div>
      <?php echo $this->Paginator->next('<div id="Next_btn"></div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
      </div>
  
  
</div>
</div>
 

  
</div>



 <?php echo $this->Html->link(
    'Ship Order',
     array(
    'controller' => 'orders', 'action' => 'ship', $orderItem['order_id']),
    array('class' => 'button'));  ?>
    

<script type="text/javascript" >
    $(document).ready(function() {

	/* This is basic - uses default settings */

	$("a.single_image").fancybox({
            'padding'		: 20,
            'titlePosition':'inside'
        });

});

</script>

