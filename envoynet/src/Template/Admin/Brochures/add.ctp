<div class="brochures form">
  <?php echo $this->Form->create('Brochure', array('type'=>'file')); ?>
  <fieldset>
    <legend><?php echo __('Add Brochure'); ?></legend>
    <ol>
      <li><?php echo $this->Form->input('supplier_id'); ?> </li>
      <li><?php echo $this->Form->input('sku'); ?> </li>
      <li><?php echo $this->Form->input('name'); ?> </li>
      <li><?php echo $this->Form->input('category',array('options'=> $brochure_categorys)); ?> </li>
      <li><?php echo $this->Form->input('description'); ?> </li>
      <li><?php echo $this->Form->input('image_id'); ?> </li>
      <li><?php echo $this->Form->input('qty_skid'); ?> </li>
      <li><?php echo $this->Form->input('qty_box'); ?> </li>
      <li><?php echo $this->Form->input('weight'); ?> </li>
       <li><?php echo $this->Form->input('max_order'); ?> </li>
       <li><?php echo $this->Form->input('max_order_a'); ?> </li>
       <li><?php echo $this->Form->input('max_order_b'); ?> </li>
       <li><?php echo $this->Form->input('max_order_c'); ?> </li>
       <li><?php echo $this->Form->input('max_order_d'); ?> </li>
       <li><?php echo $this->Form->input('Ontario_inventory'); ?> </li>
      <li><?php echo $this->Form->input('BC_inventory'); ?> </li>
      <li><?php echo $this->Form->input('inv_balance'); ?> </li>
      <li><?php echo $this->Form->input('inv_notif_threshold'); ?> </li>
      <li><?php echo $this->Form->input('display_on_agent_page'); ?> </li>
      <li><?php echo $this->Form->input('ontario'); ?></li>
      <li><?php echo $this->Form->input('poa',array('options'=>$poa_options)); ?></li>
      <li><?php echo $this->Form->input('image',array('type'=>'file')); ?></li>
      <li><?php echo $this->Form->input('status',array('options'=>$brochure_statuses)); ?></li>
      <li><?php echo $this->Form->input('ebrochure'); ?></li>
   
    </ol>
  </fieldset>
  <fieldset class="submit">
    <?php echo $this->Form->submit(__('Submit')); ?>
  </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('List Brochures'), array('action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
  </ul>
</div>