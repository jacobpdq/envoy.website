<div class="brochures form">
  <?php echo $this->Form->create('Brochure'); ?>
  <fieldset>
    <legend><?php echo __('Edit Brochure'); ?></legend>
    <ol>
      <li><?php echo $this->Form->input('id'); ?> </li>
      <li><?php echo $this->Form->input('supplier_id'); ?> </li>
      <li><?php echo $this->Form->input('sku'); ?> </li>
      <li><?php echo $this->Form->input('name'); ?> </li>
      <li><?php echo $this->Form->input('language'); ?> </li>
      <li><?php echo $this->Form->input('description'); ?> </li>
      <li><?php echo $this->Form->input('category',array('options'=> $brochure_categorys)); ?> </li>
      <li><?php echo $this->Form->input('image_id'); ?> </li>
      
      <fieldset>
    <legend><?php echo __('Max Order For Agents With NO TIER RATING (enter qty options for drop down box - leave blank for no drop down box)'); ?></legend>
    <br />
      <li><?php echo $this->Form->input('max_order',array('label'=>'Max Order No Tier Rating')); ?> </li>
       <?php 
	   $brochureorderamt=$this->request->data['brochure_order_amts'];

	    $i=1;
	    foreach ($brochureorderamt as $brochureorderamts) {

		if ($brochureorderamts['tier'] == "") { ?>
		<li>
        <?php 
		echo $this->Form->input('brochure_order_amts.'.$i.'.id', ['hidden'=>'hidden','label' => false]);
		echo $this->Form->input('brochure_order_amts.'.$i.'.tier', array('value'=>'', 'type'=>'hidden'));
	    echo $this->Form->input('brochure_order_amts.'.$i.'.quantity', array('label'=>'Drop down box option '.$i, 'value'=>$brochureorderamts['quantity'])); 
		$i++; ?>
		</li>
		<?php }
		}
		$t=$this->request->data['max_order'];
		for ($x=$i; $x<=$t; $x++) {
		?>
        <li>
        <?php
	  	 echo $this->Form->input('brochure_order_amts.'.$x.'.id', ['hidden'=>'hidden','label' => false]);
		 echo $this->Form->input('brochure_order_amts.'.$x.'.tier', array('value'=>'', 'type'=>'hidden'));
	     echo $this->Form->input('brochure_order_amts.'.$x.'.quantity', array('label'=>'Drop down box option '.$x, 'value'=>''));
		 $i++;
		?>
        </li>
        <?php		}
	    ?> 
        </fieldset>
      
      <fieldset>
    <legend><?php echo __('Max Order For Agents With TIER RATING A (enter qty options for drop down box - leave blank for no drop down box)'); ?></legend>
    <br />
      <li><?php echo $this->Form->input('max_order_a',array('label'=>'Max Tier Rating A')); ?> </li>
      <?php 
	    $t=0;
		$maxord=$this->request->data['max_order_a'];
		$t=$maxord + $i;
	    foreach ($brochureorderamt as $brochureorderamts):
		if ($brochureorderamts['tier'] == "A") { ?>
		<li>
        <?php 
		echo $this->Form->input('brochure_order_amts.'.$i.'.id', ['hidden'=>'hidden','label' => false]);
		echo $this->Form->input('brochure_order_amts.'.$i.'.tier', array('value'=>'A', 'type'=>'hidden'));
	    echo $this->Form->input('brochure_order_amts.'.$i.'.quantity', array('label'=>'Drop down box option '.$i, 'value'=>$brochureorderamts['quantity']));
		$i++; ?>
		</li>
		<?php }
		endforeach; 
		for ($x=$i; $x<$t; $x++) {
		?>
        <li>
        <?php
		echo $this->Form->input('brochure_order_amts.'.$x.'.id', ['hidden'=>'hidden','label' => false]);
		echo $this->Form->input('brochure_order_amts.'.$x.'.tier', array('value'=>'A', 'type'=>'hidden'));
	    echo $this->Form->input('brochure_order_amts.'.$x.'.quantity', array('label'=>'Drop down box option '.$x, 'value'=>''));
		$i++;
		?>
        </li>
        <?php		}
	   ?> 
       </fieldset>
       
       <fieldset>
    <legend><?php echo __('Max Order For Agents With TIER RATING B (enter qty options for drop down box - leave blank for no drop down box)'); ?></legend>
    <br /> 
       <li><?php echo $this->Form->input('max_order_b',array('label'=>'Max Tier Rating B')); ?> </li>
      <?php 
	    $t=0;
		$maxord=$this->request->data['max_order_b'];
		$t=$maxord + $i;
	    foreach ($brochureorderamt as $brochureorderamts):
		if ($brochureorderamts['tier'] == "B") { ?>
		<li>
        <?php 
		echo $this->Form->input('brochure_order_amts.'.$i.'.id', ['hidden'=>'hidden','label' => false]);
		echo $this->Form->input('brochure_order_amts.'.$i.'.tier', array('value'=>'B', 'type'=>'hidden'));
	    echo $this->Form->input('brochure_order_amts.'.$i.'.quantity', array('label'=>'Drop down box option '.$i, 'value'=>$brochureorderamts['quantity']));
		$i++; ?>
		</li>
		<?php }
		endforeach; 
		for ($x=$i; $x<$t; $x++) {
		?>
        <li>
        <?php
		echo $this->Form->input('brochure_order_amts.'.$x.'.id', ['hidden'=>'hidden','label' => false]);
		echo $this->Form->input('brochure_order_amts.'.$x.'.tier', array('value'=>'B', 'type'=>'hidden'));
	    echo $this->Form->input('brochure_order_amts.'.$x.'.quantity', array('label'=>'Drop down box option '.$x, 'value'=>''));
		$i++;
		?>
        </li>
        <?php		}
	   ?> 
       </fieldset>
       
             <fieldset>
    <legend><?php echo __('Max Order For Agents With TIER RATING C (enter qty options for drop down box - leave blank for no drop down box)'); ?></legend>
    <br /> 
       <li><?php echo $this->Form->input('max_order_c',array('label'=>'Max Tier Rating C')); ?> </li>
      <?php 
	    $t=0;
		$maxord=$this->request->data['max_order_c'];
		$t=$maxord + $i;
	    foreach ($brochureorderamt as $brochureorderamts):
		if ($brochureorderamts['tier'] == "C") { ?>
		<li>
        <?php 
		echo $this->Form->input('brochure_order_amts.'.$i.'.id', ['hidden'=>'hidden','label' => false]);
		echo $this->Form->input('brochure_order_amts.'.$i.'.tier', array('value'=>'C', 'type'=>'hidden'));
	    echo $this->Form->input('brochure_order_amts.'.$i.'.quantity', array('label'=>'Drop down box option '.$i, 'value'=>$brochureorderamts['quantity']));
		$i++; ?>
		</li>
		<?php }
		endforeach; 
		for ($x=$i; $x<$t; $x++) {
		?>
        <li>
        <?php
		echo $this->Form->input('brochure_order_amts.'.$x.'.id', ['hidden'=>'hidden','label' => false]);
		echo $this->Form->input('brochure_order_amts.'.$x.'.tier', array('value'=>'C', 'type'=>'hidden'));
	    echo $this->Form->input('brochure_order_amts.'.$x.'.quantity', array('label'=>'Drop down box option '.$x, 'value'=>''));
		$i++;
		?>
        </li>
        <?php		}
	   ?> 
       </fieldset>
       
         <fieldset>
    <legend><?php echo __('Max Order For Agents With TIER RATING D (enter qty options for drop down box - leave blank for no drop down box)'); ?></legend>
    <br /> 
       <li><?php echo $this->Form->input('max_order_d',array('label'=>'Max Tier Rating D')); ?> </li>
      <?php 
	    $t=0;
		$maxord=$this->request->data['max_order_d'];
		$t=$maxord + $i;
	    foreach ($brochureorderamt as $brochureorderamts):
		if ($brochureorderamts['tier'] == "D") { ?>
		<li>
        <?php 
		echo $this->Form->input('brochure_order_amts.'.$i.'.id', ['hidden'=>'hidden','label' => false]);
		echo $this->Form->input('brochure_order_amts.'.$i.'.tier', array('value'=>'D', 'type'=>'hidden'));
	    //echo $this->Form->input('brochure_order_amts.'.$i.'.quantity', array('label'=>'Drop down box option '.$i, 'value'=>$brochureorderamts['quantity']));
		$i++; ?>
		</li>
		<?php }
		endforeach; 
		for ($x=$i; $x<$t; $x++) {
		?>
        <li>
        <?php
		echo $this->Form->input('brochure_order_amts.'.$x.'.id', ['hidden'=>'hidden','label' => false]);
		echo $this->Form->input('brochure_order_amts.'.$x.'.tier', array('value'=>'D', 'type'=>'hidden'));
	    echo $this->Form->input('brochure_order_amts.'.$x.'.quantity', array('label'=>'Drop down box option '.$x, 'value'=>''));
		$i++;
		?>
        </li>
        <?php		}
	   ?> 
       </fieldset>
       
       
      <li><?php echo $this->Form->input('qty_skid'); ?> </li>
      <li><?php echo $this->Form->input('qty_box'); ?> </li>
      <li><?php echo $this->Form->input('weight'); ?> </li>
      <li><?php echo $this->Form->input('Ontario_inventory'); ?> </li>
      <li><?php echo $this->Form->input('BC_inventory'); ?> </li>
      <li><?php echo $this->Form->input('inv_balance'); ?> </li>
      <li><?php echo $this->Form->input('inv_notif_threshold'); ?> </li>
      <li><?php echo $this->Form->input('display_on_agent_page'); ?> </li>
      <li><?php echo $this->Form->input('poa',array('options'=>$poa_options)); ?></li>
      <li><?php echo $this->Form->input('status',array('options'=>$brochure_statuses)); ?></li>
      <li><?php echo $this->Form->input('ebrochure'); ?></li>
        
     <li> <div class="input text">
     <label>Location</label>
       <?php
       $racklocation=$this->request->data['racks'];

       foreach ($sortedracks as $racklocations) { 
       echo $this->Html->link(__($racklocations['rack_number'].'  '), array('controller' => 'racks','action' => 'edit', $racklocations['id']));  
         
        } ?>
        </div>
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

    <li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Brochure.id')), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Brochure.id'))]); ?></li>
    <li><?php echo $this->Html->link(__('List Brochures'), array('action' => 'index')); ?></li>
  </ul>
</div>