<div class="settings index">
  <h2><?php echo __('Settings'); ?></h2>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $this->Paginator->sort('id'); ?></th>
      <th><?php echo $this->Paginator->sort('key'); ?></th>
      <th><?php echo $this->Paginator->sort('value'); ?></th>
      <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php
    $i = 0;
    foreach ($settings as $setting):
      $class = null;
      if ($i++ % 2 == 0) {
        $class = ' class="altrow"';
      }
    ?>
      <tr<?php echo $class; ?>>
        <td><?php echo $setting['Setting']['id']; ?>&nbsp;</td>
        <td><?php echo $setting['Setting']['key']; ?>&nbsp;</td>
        <td><?php echo $setting['Setting']['value']; ?>&nbsp;</td>
        <td class="actions">
        <?php echo $this->Html->link(__('View'), array('action' => 'view', $setting['Setting']['id'])); ?>
        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $setting['Setting']['id'])); ?>
        <?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $setting['Setting']['id']), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $setting['Setting']['id'])]); ?>
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
    <?php echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>', array('escape' => false), null, array('class' => 'disabled', 'escape' => false)); ?>
        <div id="paging_numbers">
      <?php echo $this->Paginator->numbers(); ?>
      </div>
    <?php echo $this->Paginator->next('<div id="Next_btn">'.__('Next').'</div>', array('escape' => false), null, array('class' => 'disabled', 'escape' => false)); ?>
      </div>    
    </div>
<div class="actions">
      <h3><?php echo __('Actions'); ?></h3>
      <ul>
        <li><?php echo $this->Html->link(__('New Setting'), array('action' => 'add')); ?></li>
  </ul>
</div>