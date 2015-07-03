<div class="orderItems index">
	<h2><?php echo __('Receipts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('brochure_id');?></th>
			<th><?php echo $this->Paginator->sort('qty');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('carrier');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($receipts as $receipt):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $receipt['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($receipt['brochue']['name'], array('controller' => 'brochures', 'action' => 'view', $receipt['brochure_id'])); ?>
		</td>
		<td><?php echo $receipt['qty']; ?>&nbsp;</td>
		<td><?php echo $receipt['date']; ?>&nbsp;</td>
        <td><?php echo $receipt['carrier']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $receipt['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $receipt['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $receipt['id']), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $receipt['id'])]); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}')
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Receipt'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Brochures'), array('controller' => 'brochures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brochure'), array('controller' => 'brochures', 'action' => 'add')); ?> </li>
	</ul>
</div>