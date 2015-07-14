<div class="orderItems index">
	<h2><?php echo __('Order Items');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('order_id');?></th>
			<th><?php echo $this->Paginator->sort('brochure_id');?></th>
			<th><?php echo $this->Paginator->sort('qty_ordered');?></th>
			<th><?php echo $this->Paginator->sort('qty_shipped');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($orderItems as $orderItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $orderItem['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orderItem['order_id'], array('controller' => 'orders', 'action' => 'view', $orderItem['order_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($orderItem['brochure']['name'], array('controller' => 'brochures', 'action' => 'view', $orderItem['brochure']['id'])); ?>
		</td>
		<td><?php echo $orderItem['qty_ordered']; ?>&nbsp;</td>
		<td><?php echo $orderItem['qty_shipped']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orderItem['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orderItem['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $orderItem['id']), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $orderItem['id'])]); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
        echo $this->Paginator->counter( __('Page {{page}} of {{pages}}'));
	?>	</p>

	<div class="paging">
<?php 
          echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>',[
            'escape' => false,
            'disabledTitle' => '<span class="disabled"><div id="Prev_btn">'.__('Previous').'</div></span>'
            ]); 
          ?>
              <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
            </div>
        <?php 
          echo $this->Paginator->next('<div id="Next_btn">'.__('Next').'</div>',[
            'escape' => false,
            'disabledTitle' => '<span class="disabled"><div id="Next_btn">'.__('Next').'</div></span>'
          ]); 
        ?>
</div>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Order Item'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brochures'), array('controller' => 'brochures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brochure'), array('controller' => 'brochures', 'action' => 'add')); ?> </li>
	</ul>
</div>