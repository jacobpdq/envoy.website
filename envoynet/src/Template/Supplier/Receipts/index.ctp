<div class="inner-content-wrapper">

<?php $this->set('title_for_layout', __('Receipts'));  ?>

	<table class="index" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('brochure_id');?></th>
            <th><?php echo $this->Paginator->sort('Quantity','qty');?></th>
            <th><?php echo $this->Paginator->sort('carrier');?></th>
  	</tr>
     
	
     
	<?php
	$i = 0;
		foreach ($receipts as $receipt):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $receipt['Receipt']['date']; ?>&nbsp;</td>
		<td id="brochure_name"><?php echo $receipt['name']; ?>&nbsp;</td>
		<td><?php echo $receipt['Receipt']['qty'];?>	&nbsp;	</td>
        <td><?php echo $receipt['Receipt']['carrier']; ?> </td>
      
	</tr>
<?php endforeach; ?>
	</table>

    <div class="paging">
      <div id="paginate_btn" class="paginate_data_txt">
        <?php
            echo $this->Paginator->counter(__('Page {{page}} of {{pages}}'));
        ?>
      </div>
      <?php echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
      <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
      </div>
      <?php echo $this->Paginator->next('<div id="Next_btn">'.__('Next').'</div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
    </div>
	
</div>

