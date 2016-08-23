<!--
<div id="Welcome_intro_Header">
  <div class="Welcome_txt" id="Welcome_inset_intro"><img src="index_files/hippoexpress_is_txt.png" alt="HIPPO EXPRESS IS..." height="24" width="225"><br>
    <span class="Base_txt_let_18">A distribution and fulfillment company which specializes<br>
    in providing the travel industry with custom programs to<br>
    deliver marketing that facilitate transactions.</span><br>
    <br>


  </div>
</div>
-->



<!--Start Inventory Overview /-->
<div id="Current_Inventory_Overview">
    <div id="Over_view_header">
      <h5><?php echo __('Overview'); ?></h5>
    </div>
   
     <div id="Inventory_content" class="inner-content-wrapper"> 
      <table class="index3" cellpadding="0" cellspacing="0">
     
       <thead> <tr>
          <th><?php echo __('Brochure SKU'); ?></th>
          <th><?php echo __('Brochure name'); ?></th>
          <th><?php echo __('Language'); ?></th>
          <th><?php echo __('Ontario Inventory'); ?></th>
          <th><?php echo __('BC Inventory'); ?></th>
          <th><?php echo __('Total Inventory'); ?></th>
        </tr> </thead>
           <tbody> <?php foreach($brochures as $brochure):?>
        <tr>
          <td><?php echo $brochure['sku'];?></td>
          <td id="brochure_name"><?php echo $brochure['name'];?></td>
          <td><?php if ($brochure['is_french'] == 1) {echo __('French');} else {echo __('English');}?></td>
          <td><?php echo $brochure['Ontario_inventory'];?></td>
          <td><?php echo $brochure['BC_inventory'];?></td>
          <td><?php echo $brochure['inv_balance'];?></td>
        </tr>
        <?php endforeach;?> </tbody>
       
      </table>
       </div>
</div> 
 


<div id="dotted_line"></div>
<!--Start Orders Overview /-->
<div id="Current_Orders_Overview">
  <h5><?php echo __('Current Orders Overview'); ?>  <a href="<?php echo $this->Url->build(array('controller'=>'orders','action'=>'index','prefix'=>'supplier'));?>"><div id="View_orders_btn"><?php echo __('View All Orders'); ?></a></h5>
 
  </div>
   <!--Start  Orders  colum_01 /-->
 <?php $supplierId = $this->request->session()->read('Auth.User.id');?>
   <div id="Overview_content" class="inner-content-wrapper">
        <table class="index" cellpadding="0" cellspacing="0">
          <tr>
            <th><?php echo __('Order Received Date'); ?></th>
            <th><?php echo __('Company Information'); ?></th>
            <th><?php echo __('Order Source'); ?></th>
            <th><?php echo __('Qty Ordered'); ?></th>
            <th><?php echo __('Order Status'); ?></th>
          </tr>
         
          <?php foreach($orders as $order):
		   $brochurecount = 0;
		   $brochurecount1 = 0;
		   
		  foreach ($order['order_items'] as $orderItem):

        if(!empty ($orderItem['brochure']['supplier'])) {
  		    $mastersupplier = $orderItem['brochure']['supplier']['master_supplier'];
  		  } else {
          $mastersupplier = -1;
        }

  		  if(($orderItem['brochure']['supplier_id']==$supplierId) OR ($mastersupplier==$supplierId)):
  	
  	
          $brochurecount1 = $orderItem['qty_ordered'];
  	      $brochurecount = $brochurecount1 + $brochurecount;

		    endif;

		  endforeach;

		  
		   ?>
          <tr>
            <td><?php echo $order['created'];?></td>
            <td id="brochure_name"><?php echo $order['shipping_company'];?></td>
            <td><?php echo $order_owners[$order['owner_type']];?></td>
            <td><?php echo $brochurecount;?></td>
             <td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller'=>'orders','action' => 'view', $order['id'])); ?>		
		</td>
          </tr>
          <?php endforeach;?>
        </table>
  </div>
</div>


<script type="text/javascript">

        $(document).ready(function()
        {
            // this initialises the demo scollpanes on the page.
            $('#Inventory_content').jScrollPane(
              {
                showArrows: true,
                animateScroll: true
              } );
        });

</script>