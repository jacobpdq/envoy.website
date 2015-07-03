<div class="orderItems form">
  <?php echo $this->Form->create('OrderItem'); ?>
  <fieldset>
    <legend><?php echo __('Admin Add Order Item'); ?></legend>
    <ol>
      <li><?php echo $this->Form->input('order_id', array('default' => $id, 'type' => 'text')); ?> </li>
      <li><?php echo $this->Form->input('brochure_id'); ?></li>
      <li><?php echo $this->Form->input('qty_ordered'); ?></li>
      <li><?php echo $this->Form->input('qty_shipped'); ?></li>
      <li><?php echo $this->Form->input('status',array('options'=>$order_item_statuses)); ?></li>
      <li><?php echo $this->Form->input('ontario'); ?></li>
    </ol>
  </fieldset>
  <fieldset class="submit">
    <?php echo $this->Form->end(__('Submit')); ?>
  </fieldset>
</div>
