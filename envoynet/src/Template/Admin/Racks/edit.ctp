<div class="orderItems form">
  <?php echo $this->Form->create('Rack'); ?>
  <fieldset>
    <legend><?php echo __('Admin Edit Rack'); ?></legend>
    <ol>
      <li><?php echo $this->Form->input('id', ['hidden'=>'hidden','label'=>false]); ?></li>
      <li><?php echo $this->Form->input('brochure_id'); ?></li>
      <li><?php echo $this->Form->input('rack_number'); ?></li>
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
    <li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $id), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $id)]); ?></li>
  </ul>
</div>