<div class="suppliers view">

<h2><?php echo __('Supplier');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['username']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['decrypted_password']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['company']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Address1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['address1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Address2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['address2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('City'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['city']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Province'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['province']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Postal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['postal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Country'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['country']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Phone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['phonenumber']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Contact Firstname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['contact_firstname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Contact Lastname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['contact_lastname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['Supplier']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Supplier'), array('action' => 'edit', $supplier['Supplier']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Supplier'), array('action' => 'delete', $supplier['Supplier']['id']), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $supplier['Supplier']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Brochures');?></h3>
     
    <?php echo $this->Form->create('Supplier');?>
  <fieldset>
    <legend>Filter Brochure Status</legend>
    <ol>
       <li><?php 
	   $options = array(0 => 'All', 1 => 'Active', 2 => 'Inactive');
	   echo $this->Form->select('activebroch',$options, array('label' => false, 'default' => $this->request->data['Supplier']['activebroch']));?></li>
       <li><?php echo $this->Form->input('id',array('default' => $supplier['Supplier']['id']));?></li>
       
        </ol>
  
 <?php echo $this->Form->end('Submit');  ?>
 <br />
    </fieldset> 
    
	<?php if (!empty($brochures)):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('sku'); ?></th>
        <th><?php echo $this->Paginator->sort('name'); ?></th>
        <th><?php echo $this->Paginator->sort('max_order'); ?></th>
        <th><?php echo $this->Paginator->sort('qty_skid'); ?></th>
        <th><?php echo $this->Paginator->sort('qty_box'); ?></th>
        <th><?php echo $this->Paginator->sort('weight'); ?></th>
        <th><?php echo $this->Paginator->sort('inv_balance'); ?></th>
        <th><?php echo $this->Paginator->sort('status'); ?></th>
        <th><?php echo $this->Paginator->sort('Agent Page', 'display_on_agent_page'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($brochures as $brochure):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $brochure['Brochure']['id'];?></td>
			<td><?php echo $brochure['Brochure']['sku'];?></td>
			<td class="brochure_name"><?php echo $brochure['Brochure']['name'];?></td>
			<td><?php echo $brochure['Brochure']['max_order'];?></td>
			<td><?php echo $brochure['Brochure']['qty_skid'];?></td>
			<td><?php echo $brochure['Brochure']['qty_box'];?></td>
			<td><?php echo $brochure['Brochure']['weight'];?></td>
			<td><?php echo $brochure['Brochure']['inv_balance'];?></td>
            <td><?php echo $brochure['Brochure']['status'];?></td>
			<td><?php echo $brochure['Brochure']['display_on_agent_page'];?></td>
			<td><?php echo $brochure['Brochure']['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'brochures', 'action' => 'view', $brochure['Brochure']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'brochures', 'action' => 'edit', $brochure['Brochure']['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'brochures', 'action' => 'delete', $brochure['Brochure']['id']), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $brochure['Brochure']['id'])]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Brochure'), array('controller' => 'brochures', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
