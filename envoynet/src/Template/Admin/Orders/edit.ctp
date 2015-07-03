<div class="orders form">
    <?php echo $this->Form->create('Order'); ?>
    <fieldset>
        <legend><?php echo __('Edit Order'); ?></legend>
        <ol>
            <li><?php echo $this->Form->input('id',array('type'=>'text','label'=>'Order Number','disabled'=>'true')); ?></li>
            <li><?php echo $this->Form->input('owner_id',array('type'=>'text','label'=>'Owner Id','disabled'=>'true')); ?></li>
            <li><?php echo $this->Form->input('owner_type', array('options' => $order_owners,'disabled'=>'true')); ?></li>
            <li><?php echo $this->Form->input('shipping_company'); ?></li>
            <li><?php echo $this->Form->input('shipping_firstname'); ?> </li>
            <li><?php echo $this->Form->input('shipping_lastname'); ?></li>
            <li><?php echo $this->Form->input('shipping_address1'); ?></li>
            <li><?php echo $this->Form->input('shipping_address2'); ?></li>
            <li><?php echo $this->Form->input('shipping_province'); ?></li>
            <li><?php echo $this->Form->input('shipping_city'); ?></li>
            <li><?php echo $this->Form->input('shipping_postalcode'); ?></li>
            <li><?php echo $this->Form->input('shipping_email'); ?></li>
            <li><?php echo $this->Form->input('shipping_phonenumber'); ?></li>
            <li><?php echo $this->Form->input('order_comments'); ?></li>
            <li><?php echo $this->Form->input('priority', array('options' => $order_priorities)); ?></li>
            <li><?php echo $this->Form->input('status', array('options' => $order_statuses,'disabled'=>true)); ?></li>         
        </ol>
    </fieldset>
    <fieldset class="submit">
        <?php echo $this->Form->submit(__('Update order details')); ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>


<div class="related">
	<h3><?php echo __('Related Order Items');?></h3>
	<?php if (!empty($this->request->data['order_items'])):?>
    <?php echo $this->Form->create('OrderItems',array('url'=>array('controller'=>'orderItems','action'=>'bulkUpdate','prefix' => 'admin'),'id'=>'form-table'));?>
    <?php echo $this->Form->input('Orders.id',array('value'=>$this->request->data['id'],'type'=>'hidden'));?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Brochure Name'); ?></th>
		<th><?php echo __('Qty Ordered'); ?></th>
		<th><?php echo __('Qty Shipped'); ?></th>
        <th><?php echo __('Status'); ?></th>
        <th><?php echo __('Shipped via'); ?></th>
        <th><?php echo __('Tracking #'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($this->request->data['order_items'] as $orderItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			
              <?php echo $this->Form->input('OrderItem.'.$orderItem['id'].'.id',array('label'=>false,'value'=>$orderItem['id']));?>
          
		<td><?php  echo $orderItem['brochure']['name'];?></td>
			<td><?php echo $orderItem['qty_ordered'];?></td>
			<td><?php echo $this->Form->input('OrderItem.'.$orderItem['id'].'.qty_shipped',array('label'=>false,'value'=>$orderItem['qty_ordered'],'class'=>'smallinput'));?></td>
            <td><?php echo $this->Form->input('OrderItem.'.$orderItem['id'].'.status',array('options'=>$order_item_statuses,'label'=>false,'selected'=>$orderItem['status']));?></td>
            <td><?php echo $this->Form->input('OrderItem.'.$orderItem['id'].'.shipped_via',array('options'=>$shipvia,'label'=>false,'selected'=>$orderItem['shipped_via']));?></td>
            <td> 
           
			 <?php if ($orderItem['shipped_via'] == 0) { ?>
			 <a href="<?php echo ("http://www.canpar.com/en/track/TrackingAction.do?locale=en&type=0&reference=".$orderItem['tracking_number']); ?> ">
		<?php	 echo $this->Form->input('OrderItem.'.$orderItem['id'].'.tracking_number',array('label'=>false,'value'=>$orderItem['tracking_number'],'class'=>'autoinput')); ?>
		      </a>
		<?php	    }
				   else if ($orderItem['shipped_via'] == 1) { ?>
			 <a href="<?php echo ("http://wwwapps.ups.com/WebTracking/track?HTMLVersion=5.0&loc=en_CA&Requester=UPSHome&WBPM_lid=homepage%2Fct1.html_pnl_trk&trackNums=".$orderItem['tracking_number'].'&track.x=Track'); ?> ">
		<?php	 echo $this->Form->input('OrderItem.'.$orderItem['id'].'.tracking_number',array('label'=>false,'value'=>$orderItem['tracking_number'],'class'=>'autoinput')); ?>
		      </a>
		<?php		  }
				   else if ($orderItem['shipped_via'] == 3) {
				   $tracknum = substr($orderItem['tracking_number'], -21, 16); ?>
			 <a href="<?php echo ("http://www.canadapost.ca/cpotools/apps/track/personal/findByTrackNumber?trackingNumber=".$tracknum."&track.x=Track"); ?> ">
		<?php	 echo $this->Form->input('OrderItem.'.$orderItem['id'].'.tracking_number',array('label'=>false,'value'=>$orderItem['tracking_number'],'class'=>'autoinput')); ?>
		      </a>
		<?php	       }
				   else {
				 echo $this->Form->input('OrderItem.'.$orderItem['id'].'.tracking_number',array('label'=>false,'value'=>$orderItem['tracking_number'],'class'=>'autoinput'));
				   }
				   ?>
                   
             </td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'order_items', 'action' => 'view', $orderItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'order_items', 'action' => 'edit', $orderItem['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'order_items', 'action' => 'delete', $orderItem['id']), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $orderItem['id'])]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
    
    <?php echo $this->Form->submit(__("Update order items"));?>
    <?php echo $this->Form->end();?>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order Item'), array('controller' => 'order_items', 'action' => 'add', $this->request->data['id']));?> </li>
		</ul>
	</div>
</div>