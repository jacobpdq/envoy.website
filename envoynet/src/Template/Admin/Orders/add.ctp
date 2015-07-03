<div class="orders form">
  <?php echo $this->Form->create('Order'); ?>
  <fieldset>
    <legend><?php echo __('Create new order'); ?></legend>
    <ol>
      <li><?php echo $this->Form->input('owner_id'); ?></li>
      <li><?php echo $this->Form->input('owner_type', array('options' => $order_owners)); ?></li>
      <li><?php echo $this->Form->input('shipping_company'); ?></li>
      <li><?php echo $this->Form->input('shipping_firstname'); ?> </li>
      <li><?php echo $this->Form->input('shipping_lastname'); ?></li>
      <li><?php echo $this->Form->input('shipping_address1'); ?></li>
      <li><?php echo $this->Form->input('shipping_address2'); ?></li>
      <li><?php echo $this->Form->input('shipping_province'); ?></li>
      <li><?php echo $this->Form->input('shipping_city'); ?></li>
      <li><?php echo $this->Form->input('shipping_postalcode'); ?></li>
      <li><?php echo $this->Form->input('shipping_email'); ?></li>
      <li><?php echo $this->Form->input('shipping_phonenumber'); ?></li>
      <li><?php echo $this->Form->input('order_comments'); ?></li>
      <li><?php echo $this->Form->input('priority', array('options' => $order_priorities)); ?></li>
      <li><?php echo $this->Form->input('status', array('options' => $order_statuses)); ?></li>
      <li><?php echo $this->Form->input('shipped_via'); ?></li>
      <li><?php echo $this->Form->input('tracking_number'); ?></li>
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

    <li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>

  </ul>
</div>