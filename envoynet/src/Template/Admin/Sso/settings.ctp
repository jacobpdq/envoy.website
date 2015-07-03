<div class="agents form">
  <?php echo $this->Form->create('SsoSettings'); ?>
  <fieldset>
    <legend><?php echo __('Admin Edit SSO Settings'); ?></legend>
    <ol>
      <li>
        <?php echo $this->Form->input('sso_redirect_login'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('sso_redirect_logout'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('sso_redirect_error'); ?>
      </li>
      <li>
        <?php echo $this->Form->input('sso_broker_key'); ?>
      </li>
    </ol>
  </fieldset>
  <fieldset class="submit">
        <?php echo $this->Form->submit(__('Submit')); ?>
  </fieldset>
  <?php echo $this->Form->end(); ?>
</div>