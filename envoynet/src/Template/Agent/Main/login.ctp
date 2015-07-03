

<div id="Profile_inset2">
  <div id="profile_info">
 
    <?php if ($this->request->session()->check('Message.auth')): ?>
    <?php echo $this->request->session()->flash('auth'); ?>
    <?php endif; ?>

    <?php echo $this->Form->create('LoginData', array('url' => array('controller' => 'main', 'action' => 'login', 'prefix' => 'agent'), 'id' => 'agent-login')); ?>
      <h1 id="agent-login-text">Please enter your phone number:</h1>

    <ul id="phone-input">
      <li>
        <?php echo $this->Form->input('digits1', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'3', 'MAXLENGTH' => '3','class'=>"required number")) ?>
      </li>
      <li>
        -
      </li>
      <li>
        <?php echo $this->Form->input('digits2', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'3', 'MAXLENGTH' => '3','class'=>"required number")) ?>
      </li>
      <li>
        -
      </li>
      <li>
        <?php echo $this->Form->input('digits3', array('div' => false, 'label' => false, 'type' => 'text','minlength'=>'4', 'MAXLENGTH' => '4','class'=>"required number")) ?>
      </li>
    </ul>

    <?php //echo $this->Form->input('phonenumber',array('div'=>false,'label'=>false)) ?>
    <?php //echo $this->Form->input('pwd',array('div'=>false,'label'=>false,'value'=>'','class'=>'')) ?>

        <div id="profile_submit_Holder">
          <button id="Submit_btn" type="submit"></button>
          <?php echo $this->Html->link('Register',array('controller' => 'agents', 'action' => 'register','prefix' => 'agent'));?>
        </div>


    <?php echo $this->Form->end(); ?>
  </div>
  <div id="profile_info2">

  </div>
</div>
<script type="text/javascript" >
  $(document).ready(function() {
	$('#LoginDataDigits1, #LoginDataDigits2, #LoginDataDigits3').autotab_magic().autotab_filter('numeric');
})
</script>

