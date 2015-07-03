<div class="agents form">
  <?php echo $this->Form->create('Agent'); ?>
  <fieldset>
    <legend><?php echo __('Admin Add Agent'); ?></legend>
    <ol>
      <li>
        <?php echo $this->Form->input('phonenumber'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('company'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('firstname'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('lastname'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('address'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('address2'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('city'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('province'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('postalcode'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('country'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('email'); ?>
      </li>
       <li><?php echo $this->Form->input('status',array('options'=>$user_statuses)); ?></li>
        <li>
        <?php echo $this->Form->input('travelcuts'); ?>
      </li>
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

    <li><?php echo $this->Html->link(__('List Agents'), array('action' => 'index')); ?></li>
</ul>
</div>