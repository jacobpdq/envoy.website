<div class="orderItems form">
  <?php echo $this->Form->create('OrderItem'); ?>
  <fieldset>
    <legend><?php echo __('Admin Edit Order Item'); ?></legend>
    <ol>
      <li><?php echo $this->Form->input('id',array('type' => 'text', 'readonly' => true)); ?></li>
      <li><?php echo $this->Form->input('order_id', array('type' => 'text', 'readonly' => true)); ?></li>
      <li><?php echo $this->Form->input('brochure_id'); ?></li>
      <li><?php echo $this->Form->input('qty_ordered'); ?></li>
      <li><?php echo $this->Form->input('qty_shipped'); ?></li>
      <li><?php echo $this->Form->input('status',array('options'=>$order_item_statuses)); ?></li>
      <li><?php echo $this->Form->input('ontario'); ?></li>
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
    <li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('OrderItem.id')), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('OrderItem.id'))]); ?></li>
  </ul>
</div>