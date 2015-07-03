<div class="inner-content-wrapper">
    <?php
      echo $this->Form->create($orderForm,[
        'url'=> [
          'controller'=>'ShoppingCart',
          'action'=>'shipping',
          'prefix' => 'agent'
          ],
        'id' => 'CartAgentIndexForm'
        ]);?>
    <table class="index">
        <tbody>
            <tr>
                <th width="400px"><?php echo __("Brochure");?></th>
                <th width="300px"><?php echo __("Quantity");?></th>
                <th width="100px"></th>
            </tr>
  
        <?php if(!empty($this->request->data['Cart']['Items'])):?>
            <?php foreach($this->request->data['Cart']['Items'] as $id=>$item):?>
            <tr>
                <td class="brochure_name"><?php echo $item['brochure_name'];?></td>
                <td>
                    <div class="cart_input">
                    <?php echo $this->Form->input('Cart.Items.'.$id.'.brochure_id',array('value'=>$item['brochure_id'],'type'=>'hidden'));?>
                    <?php echo $this->Form->input('Cart.Items.'.$id.'.brochure_name',array('value'=>$item['brochure_name'],'type'=>'hidden'));?>
                    <?php echo $this->Form->input('Cart.Items.'.$id.'.max_order',array('value'=>$item['max_order'],'type'=>'hidden'));?>
                    <?php echo $this->Form->input('Cart.Items.'.$id.'.ontario',array('value'=>$item['ontario'],'type'=>'hidden'));?>
                    <?php 
					if (!empty($item['qty_choice'])) {
					echo $this->Form->input('Cart.Items.'.$id.'.qty_ordered',array('label'=>"Qty Ordered", 'value'=>$item['qty_ordered'],'id'=>'Quanity_style4','options' => $item['qty_choice']));
					foreach ($item['qty_choice'] as $qtychoice):
					echo $this->Form->input('Cart.Items.'.$id.'.qty_choice.'.$qtychoice,array('value'=>$qtychoice,'type'=>'hidden'));	
			        endforeach;
					}
					else {
					echo $this->Form->input('Cart.Items.'.$id.'.qty_ordered',array('value'=>$item['qty_ordered']));
					}
			
			?>
                    </div>
                    <div class="cart_max_order"><?php echo "Max order: ".$item['max_order'];?></div>
                </td>
               
                <td>    <div class="order-item-remove"><?php echo $this->Html->link("Remove Item",array('controller'=>'ShoppingCart','action'=>'removeItem',$id,'prefix' => 'agent'),
                  array('class'=>'order-item-delete'));?>   </div> </td>
            
            </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>

    <div class="product_cart_holder">
        <a href="#" id="update_order"><div id="update_order_btn"></div></a>     
        <a href="<?php echo $this->Url->build(array('controller'=>'brochures','action'=>'index','prefix'=>'agent'));?>"><div id="continue_viewing_btn"></div></a>
        <button type="submit" id="Process_order_btn"></button>
    </div>
    <?php echo $this->Form->end();?>
</div>
<script type="text/javascript" >
  $('#update_order').click(function() {
   $('#CartAgentIndexForm').attr({action:"<?php echo $this->Url->build(array('controller'=>'ShoppingCart','action'=>'update','prefix' => 'agent'));?>"});
   $('#CartAgentIndexForm').submit();
  })
</script>