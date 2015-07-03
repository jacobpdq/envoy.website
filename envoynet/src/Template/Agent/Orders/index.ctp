<div class="inner-content-wrapper">
	<table class="index" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','Order number');?></th>
			<th><?php echo $this->Paginator->sort('created','Date');?></th>
			<th><?php echo $this->Paginator->sort('shipping_company','Company');?></th>
                        <th><?php echo $this->Paginator->sort('shipping_firstname','First Name');?></th>
                        <th><?php echo $this->Paginator->sort('shipping_lastname','Last Name');?></th>
	<!--		<th><?php echo $this->Paginator->sort('owner_id','Agent');?></th>
                        <th>City</th>       
                        <th>Province</th>   
			<th><?php echo $this->Paginator->sort('status');?></th>   -->
			<th class="actions">View Order</th>
	</tr>
	<?php
	$i = 0;
	foreach ($orders as $order):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $order['id']; ?>&nbsp;</td>
		<td><?php echo $order['created']; ?>&nbsp;</td>
		<td>
			<?php echo $order['shipping_company'];?>
		</td>
		<td>
			<?php echo $order['shipping_firstname'];?>
		</td>
        <td>
			<?php echo $order['shipping_lastname']; ?>
		</td>
      <!--   <td>
			<?php echo $order['Agent']['province']; ?>
		</td>                                                     
		<td><?php echo $order_statuses[$order['status']]; ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['id'])); ?>		
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
</div>

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
