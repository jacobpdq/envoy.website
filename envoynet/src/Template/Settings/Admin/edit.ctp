<div class="settings form">
  <?php echo $this->Form->create('Setting'); ?>
  <fieldset>
    <legend><?php echo __('Admin Edit Setting'); ?></legend>
    <ol>
      <li><?php echo $this->Form->input('id'); ?></li>
      <li><?php echo $this->Form->input('key'); ?></li>
      <li>
        <?php
        if ($this->request->data['Setting']['key'] == 'default_supplier')
          echo $this->Form->input('value', array('options' => $suppliers));
        else
          echo $this->Form->input('value');
        ?>
      </li>
    </ol>
  </fieldset>
  <fieldset class="submit">
    <?php echo $this->Form->end(__('Submit')); ?>
  </fieldset>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>

    <li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Setting.id')), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Setting.id'))]); ?></li>
    <li><?php echo $this->Html->link(__('List Settings'), array('action' => 'index')); ?></li>
  </ul>
</div>