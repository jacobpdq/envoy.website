<div class="orderItems form">
  <?php echo $this->Form->create('Receipt'); ?>
  <fieldset>
    <legend><?php echo __('Admin Add Receipt'); ?></legend>
    <ol>
      <li><?php echo $this->Form->input('brochure_id'); ?></li>
      <li><?php echo $this->Form->input('qty'); ?></li>
     <li><?php echo $this->Form->input('date', array('label' => 'Date', 'type' => 'text', 'class' => 'date')); ?> </li>
      <li><?php echo $this->Form->input('carrier'); ?></li>
    </ol>
  </fieldset>
  <fieldset class="submit">
    <?php echo $this->Form->end(__('Submit')); ?>
  </fieldset>
</div>
