<div class="suppliers view">

<h2><?php   echo __('Supplier');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['username']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['decrypted_password']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['company']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Address1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['address1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Address2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['address2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('City'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['city']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Province'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['province']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Postal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['postal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Country'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['country']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Phone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['phonenumber']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Contact Firstname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['contact_firstname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Contact Lastname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['contact_lastname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php  echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplier['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php  echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link( __('Edit Supplier', true), array('action' => 'edit', $supplier['id'])); ?> </li>
		<li><?php echo $this->Html->link( __('Delete Supplier', true), array('action' => 'delete', $supplier['id']), ['confirm' => sprintf( __('Are you sure you want to delete # %s?', true), $supplier['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers', true), array('action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php  echo __('Related Brochures');?></h3>
     
    <?php echo $this->Form->create('BrochureFilter');?>
  <fieldset>
    <legend>Filter Brochure Status</legend>
    <ol>
       <li><?php 
	   $options = array(0 => 'All', 1 => 'Active', 2 => 'Inactive');
	   echo $this->Form->select('activebroch',$options, array('label' => false, 'default' => $this->request->data['activebroch']));?></li>
       <li><?php echo $this->Form->input('id',array('default' => $supplier['id'],'hidden'=>'hidden','label'=>false));?></li>
       
        </ol>
  
 <?php echo $this->Form->submit(__('Submit'));  ?>

 <?php echo $this->Form->end();  ?>
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
		<th class="actions"><?php  echo __('Actions');?></th>
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
			<td><?php echo $brochure['id'];?></td>
			<td><?php echo $brochure['sku'];?></td>
			<td class="brochure_name"><?php echo $brochure['name'];?></td>
			<td><?php echo $brochure['max_order'];?></td>
			<td><?php echo $brochure['qty_skid'];?></td>
			<td><?php echo $brochure['qty_box'];?></td>
			<td><?php echo $brochure['weight'];?></td>
			<td><?php echo $brochure['inv_balance'];?></td>
            <td><?php echo $brochure['status'];?></td>
			<td><?php echo $brochure['display_on_agent_page'];?></td>
			<td><?php echo $brochure['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link( __('View', true), array('controller' => 'brochures', 'action' => 'view', $brochure['id'])); ?>
				<?php echo $this->Html->link( __('Edit', true), array('controller' => 'brochures', 'action' => 'edit', $brochure['id'])); ?>
				<?php echo $this->Html->link( __('Delete', true), array('controller' => 'brochures', 'action' => 'delete', $brochure['id']), [sprintf( __('Are you sure you want to delete # %s?', true), $brochure['id'])]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link( __('New Brochure', true), array('controller' => 'brochures', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
