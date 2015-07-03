<div class="agents index">
	<h2><?php echo __('Agents');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('phonenumber');?></th>
			<th><?php echo $this->Paginator->sort('company');?></th>
			<th><?php echo $this->Paginator->sort('firstname');?></th>
			<th><?php echo $this->Paginator->sort('lastname');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($agents as $agent):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $agent['phonenumber']; ?>&nbsp;</td>
		<td><?php echo $agent['company']; ?>&nbsp;</td>
		<td><?php echo $agent['firstname']; ?>&nbsp;</td>
		<td><?php echo $agent['lastname']; ?>&nbsp;</td>
		<td><?php echo $user_statuses[ $agent['status']]; ?>&nbsp;</td>
		<td><?php echo $agent['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $agent['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $agent['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $agent['id']),  ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $agent['id'])]); ?>
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
      <?php echo $this->Paginator->prev('<div id="Prev_btn"></div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
      <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
      </div>
      <?php echo $this->Paginator->next('<div id="Next_btn"></div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
      </div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Agent'), array('action' => 'add')); ?></li>
	</ul>
</div>