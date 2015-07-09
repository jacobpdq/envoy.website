<div class="inner-content-wrapper">
    <?php echo $this->Form->create('Cart',array('url'=>array('controller'=>'ShoppingCart','action'=>'shipping','prefix' => 'supplier')));?>
    <table class="index">
        <tbody>
            <tr>
                <th width="400px"><?php echo __("Brochure");?></th>
                <th width="300px"><?php echo __("Quantity");?></th>
                <th width="100px"></th>
            </tr>
  
        <?php if(!empty($this->request->data['Brochures']['Items'])):?>
            <?php foreach($this->request->data['Cart']['Items'] as $id=>$item):?>
            <tr>
                <td class="brochure_name"><?php echo $item['brochure_name'];?></td>
                <td>
                    <div class="cart_input">
                    <?php echo $this->Form->input('Cart.Items.'.$id.'.brochure_id',array('value'=>$item['brochure_id'],'type'=>'hidden'));?>
                    <?php echo $this->Form->input('Cart.Items.'.$id.'.brochure_name',array('value'=>$item['brochure_name'],'type'=>'hidden'));?>
                    <?php echo $this->Form->input('Cart.Items.'.$id.'.max_order',array('value'=>$item['max_order'],'type'=>'hidden'));?>
                    <?php echo $this->Form->input('Cart.Items.'.$id.'.qty_ordered',array('value'=>$item['qty_ordered']));?>
                    </div>
                    <div class="cart_max_order"><?php echo "Max order: ".$item['max_order'];?></div>
                </td>
                <td><?php echo $this->Html->link("Remove Item",array('controller'=>'ShoppingCart','action'=>'removeItem',$id,'prefix' => 'agent'));?></td>
            </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
    
    <div class="product_cart_holder">
        <button type="submit" id="Process_order_btn"><?php echo __('Process Order'); ?></button>
        <a href="/agent/brochures?pageNum=0"><div id="continue_viewing_btn"><?php echo __(' Continue Viewing'); ?></div></a>
        <button type="submit" id="update_order_btn"><?php echo __('Update Order'); ?></button>
    </div>
    <?php echo $this->Form->end();?>
</div>
