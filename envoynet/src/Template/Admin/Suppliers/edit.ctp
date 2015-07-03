<div class="suppliers form">
  <?php echo $this->Form->create('Supplier'); ?>
  <fieldset>
    <legend><?php __('Admin Edit Supplier'); ?></legend>
    <ol>
      <li><?php echo $this->Form->input('id',['hidden'=>'hidden','label'=>false]); ?></li>
      <li><?php echo $this->Form->input('username'); ?></li>
      <li><?php echo $this->Form->input('password'); ?></li>
      <li><?php echo $this->Form->input('decrypted_password',array('type'=>'text','disabled'=>'true')); ?></li>
      <li><?php echo $this->Form->input('company'); ?></li>
      <li><?php echo $this->Form->input('address1'); ?></li>
      <li><?php echo $this->Form->input('address2'); ?></li>
      <li><?php echo $this->Form->input('city'); ?></li>
      <li><?php echo $this->Form->input('province'); ?></li>
      <li><?php echo $this->Form->input('postal'); ?></li>
      <li><?php echo $this->Form->input('country'); ?></li>
      <li><?php echo $this->Form->input('email'); ?></li>
      <li><?php echo $this->Form->input('phone'); ?></li>
      <li><?php echo $this->Form->input('contact_firstname'); ?></li>
      <li><?php echo $this->Form->input('contact_lastname'); ?></li>
      <li><?php echo $this->Form->input('status',array('options'=>$user_statuses)); ?></li>
      <li><?php echo $this->Form->input('allow_modify_orders'); ?></li>
      <li><?php echo $this->Form->input('allow_modify_brochures'); ?></li>
       <li><?php echo $this->Form->input('display_on_agent_site'); ?></li>
       <li><?php echo $this->Form->input('master_supplier'); ?></li>
      <li><?php echo $this->Form->input('restrict_brochure_access'); ?></li>
      <li><?php echo $this->Form->input('restrict_order_access'); ?></li>
      <li><?php echo $this->Form->input('restrict_report_access'); ?></li>
    </ol>
  </fieldset>
  <fieldset class="submit">
    <?php echo $this->Form->submit(__('Submit', true)); ?>
    <?php echo $this->Form->end(); ?>
  </fieldset>
</div>
<div class="actions">
  <h3><?php __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->request->data('id')), ['confirm'=>sprintf(__('Are you sure you want to delete # %s?', true), $this->request->data('id'))]); ?></li>
    <li><?php echo $this->Html->link(__('List Suppliers', true), array('action' => 'index')); ?></li>
  </ul>
</div>