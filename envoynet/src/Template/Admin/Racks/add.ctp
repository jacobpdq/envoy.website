<div class="orderItems form">
  <?php echo $this->Form->create('Rack'); ?>
  <fieldset>
    <legend><?php echo __('Admin Add Rack'); ?></legend>
    <ol>
      <li><?php echo $this->Form->input('brochure_id'); ?></li>
      <li><?php echo $this->Form->input('rack_number'); ?></li>
    </ol>
  </fieldset>
  <fieldset class="submit">
    <?php echo $this->Form->submit(__('Submit')); ?>
  </fieldset>
    <?php echo $this->Form->end(); ?>
</div>