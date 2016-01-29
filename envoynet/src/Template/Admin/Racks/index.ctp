<div class="orderItems index">
	<h2><?php echo __('Racks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('brochure_id');?></th>
			<th><?php echo $this->Paginator->sort('rack_number');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($racks as $rack):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $rack['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($rack['brochure']['name'], array('controller' => 'brochures', 'action' => 'view', $rack['brochure_id'])); ?>
		</td>
		<td><?php echo $rack['rack_number']; ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rack['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rack['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $rack['id']), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $rack['id'])]); ?>
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


      <div class="paging" id="pagnate_top_Header">
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Rack'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Brochures'), array('controller' => 'brochures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brochure'), array('controller' => 'brochures', 'action' => 'add')); ?> </li>
	</ul>
</div>