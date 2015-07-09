<div id="Welcome_inset_Header_admin">

</div>
<div class="brochures index">
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $this->Paginator->sort('sku'); ?></th>
      <th><?php echo $this->Paginator->sort('supplier_id'); ?></th>
      <th><?php echo $this->Paginator->sort('name'); ?></th>
      <th><?php echo $this->Paginator->sort('max_order'); ?></th>
      <th><?php echo $this->Paginator->sort('qty_skid'); ?></th>
      <th><?php echo $this->Paginator->sort('qty_box'); ?></th>
      <th><?php echo $this->Paginator->sort('inv_balance'); ?></th>
      <th><?php echo $this->Paginator->sort('created'); ?></th>
      <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php
    $i = 0;
    foreach ($brochures as $brochure):
      $class = null;
      if ($i++ % 2 == 0) {
        $class = ' class="altrow"';
      }
    ?>
      <tr<?php echo $class; ?>>
        <td><?php echo $brochure['sku']; ?>&nbsp;</td>
        <td>
        <?php echo $this->Html->link($brochure['Supplier']['company'], array('controller' => 'suppliers', 'action' => 'view', $brochure['Supplier']['id'])); ?>
      </td>

      <td><?php echo $brochure['name']; ?>&nbsp;</td>
      <td><?php echo $brochure['max_order']; ?>&nbsp;</td>
      <td><?php echo $brochure['qty_skid']; ?>&nbsp;</td>
      <td><?php echo $brochure['qty_box']; ?>&nbsp;</td>
      <td><?php echo $brochure['inv_balance']; ?>&nbsp;</td>
      <td><?php echo $brochure['created']; ?>&nbsp;</td>
      <td class="actions">
        <?php echo $this->Html->link(__('View'), array('action' => 'view', $brochure['id'])); ?>
        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $brochure['id'])); ?>
        <?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $brochure['id']), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $brochure['id'])]); ?>
      </td>
    </tr>
    <?php endforeach; ?>
      </table>


      <div class="paging">
      <div id="paginate_btn" class="paginate_data_txt">
        <?php
            echo $this->Paginator->counter(__('Page {{page}} of {{pages}}'));
        ?>
      </div>
      <?php echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>', array('class' => 'disabled','escape'=>false)); ?>
            <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
      </div>
      <?php echo $this->Paginator->next('<div id="Next_btn">'.__('Next').'</div>', array('class' => 'disabled','escape'=>false)); ?>
      </div>
    </div>
    <div class="actions">
      <ul>
        <li><?php echo $this->Html->link(__('New Brochure'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
      </ul>
    </div>