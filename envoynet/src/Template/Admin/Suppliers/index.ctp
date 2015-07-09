<div class="suppliers index">
	<h2><?php __('Suppliers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
            <th><?php echo $this->Paginator->sort('phonenumber');?></th>
			<th><?php echo $this->Paginator->sort('company');?></th>
            <th><?php echo $this->Paginator->sort('contact_firstname');?></th>
			<th><?php echo $this->Paginator->sort('contact_lastname');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($suppliers as $supplier):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
        <td><?php echo $supplier['phonenumber']; ?>&nbsp;</td>
		<td><?php echo $supplier['company']; ?>&nbsp;</td>
        <td><?php echo $supplier['contact_firstname']; ?>&nbsp;</td>
		<td><?php echo $supplier['contact_lastname']; ?>&nbsp;</td>
		<td><?php echo $user_statuses[$supplier['status']]; ?>&nbsp;</td>
		<td><?php echo $supplier['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $supplier['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $supplier['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $supplier['id']), ['confirm' => sprintf(__('Are you sure you want to delete # %s?', true), $supplier['id'])]); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
      <div id="paginate_btn" class="paginate_data_txt">
        <?php
            echo $this->Paginator->counter(__('Page {{page}} of {{pages}}'));
        ?>
      </div>
      <?php echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
      <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
      </div>
      <?php echo $this->Paginator->next('<div id="Next_btn">'.__('Next').'</div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
      </div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Supplier', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Brochures', true), array('controller' => 'brochures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brochure', true), array('controller' => 'brochures', 'action' => 'add')); ?> </li>
	</ul>
</div>