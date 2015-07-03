<?php echo $this->Form->create('OrderItem', array('url' => array('controller' => 'OrderItems', 'action' => 'edit', 'prefix' => 'supplier'))); ?>
<?php echo $this->Form->input('id', array('value' => $this->request->data['OrderItem']['id'])); ?>
<?php echo $this->Form->input('qty_ordered', array('label' => 'Modify Quantity', 'value' => $this->request->data['OrderItem']['qty_ordered'])); ?>
<?php echo $this->Form->submit('Save'); ?>
<?php echo $this->Form->end(); ?>
<?php

echo $this->Html->link("Delete", array('controller' => 'OrderItems', 'action' => 'delete', $this->request->data['Brochure']['id'], 'prefix' => 'supplier'),
        array('class' => 'order-item-delete'),
        sprintf(__('Are you sure you want to delete order item \n %s?'), $this->request->data['Brochure']['name']));
?>

<?php

echo $this->Html->link("Approve", array('controller' => 'OrderItems', 'action' => 'approve', $this->request->data['Brochure']['id'], 'prefix' => 'supplier'),
        array('class' => 'order-item-delete'),
        sprintf(__('Are you sure you want to approve order item \n %s?'), $this->request->data['Brochure']['name']));
?>