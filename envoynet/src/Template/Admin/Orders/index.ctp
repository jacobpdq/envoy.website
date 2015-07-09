<div class="orders index">
	 <h2><?php echo __('Orders');?></h2>
	<!--added by glen-->
<div class="inner-content-wrapper">	
 <div class="tools">
     <div id="csv-export-btn">Export to Excel</div>
  </div>
</div> 
<!--added by glen end-->
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('Order source','owner_type');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('shipping_company');?></th>
			<th><?php echo $this->Paginator->sort('shipping_province');?></th>
			<th><?php echo $this->Paginator->sort('shipping_city');?></th>
			<th><?php echo $this->Paginator->sort('shipping_phonenumber');?></th>
			<th><?php echo $this->Paginator->sort('priority');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('shipped_via');?></th>
			<th><?php echo $this->Paginator->sort('tracking_number');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($orders as $order):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
        if($order['priority']=='1')
        {
          if($class!=null)
          {
            $class = ' class="altrow rushorder"';
          } else {
            $class = ' class="rushorder"';
          }
        }
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $order['id']; ?>&nbsp;</td>
		<td><?php echo $order_owners[$order['owner_type']]; ?>&nbsp;</td>
		<td><?php echo $order['created']; ?>&nbsp;</td>
		<td><?php echo $order['shipping_company']; ?>&nbsp;</td>
		<td><?php echo $order['shipping_province']; ?>&nbsp;</td>
		<td><?php echo $order['shipping_city']; ?>&nbsp;</td>
		<td><?php echo $order['shipping_phonenumber']; ?>&nbsp;</td>
		<td><?php echo $order_priorities[$order['priority']]; ?>&nbsp;</td>
		<td><?php echo $order_statuses[$order['status']]; ?>&nbsp;</td>
		<td><?php echo $order['shipped_via']; ?>&nbsp;</td>
		<td><?php echo $order['tracking_number']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $order['id'])); ?>
            <?php echo $this->Html->link(__('Package'), array('controller' =>'order_items', 'action' => 'pack', $order['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $order['id']), ['confirm' =>sprintf(__('Are you sure you want to delete # %s?'), $order['id'])]); ?>
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
      <?php echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
      <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
      </div>
      <?php echo $this->Paginator->next('<div id="Next_btn"></div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
      </div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?></li>
	</ul>
	
	

</div>

<!--added by glen-->


<div class="popup" id="csv-report-popup">
  <?php echo $this->Form->create('Report',array('url'=>array('controller'=>'Reports','action'=>'ordersExport','prefix' => 'admin'),'id'=>'orders-export-form'));?>
  <fieldset>
    <legend>Company information</legend>
    <ol>
       <li><?php echo $this->Form->input('start_date',array('label'=>'Start date','class'=>'date'));?></li>
       <li><?php echo $this->Form->input('end_date',array('label'=>'End date','class'=>'date'));?></li>
    </ol>
  </fieldset>
  <?php echo $this->Form->end();?>
</div>

<script type="text/javascript" >
  $(document).ready(function() {
    
    $( "#csv-report-popup" ).dialog({
        autoOpen: false,
        height: 300,
        width: 520,
        modal: true,
        title: "<?php echo __('Export to Excel');?>",
        buttons: {
            "Export": function() {

                    $('#orders-export-form').submit();
           
            },
            Close: function() {
                $( this ).dialog( "close" );
            }
        },
        close: function() {
            allFields.val( "" ).removeClass( "ui-state-error" );
        }
    });

    $( "#csv-export-btn" )
    .button()
    .click(function() {
        $( "#csv-report-popup" ).dialog( "open" );

    });


     $( "#filter-popup" ).dialog({
        autoOpen: false,
        height: 300,
        width: 520,
        modal: true,
        title: "<?php echo __('Filter orders by date');?>",
        buttons: {
            "Filter": function() {

                    $('#orders-filter-form').submit();

            },
            Close: function() {
                $( this ).dialog( "close" );
            }
        },
        close: function() {
            allFields.val( "" ).removeClass( "ui-state-error" );
        }
    });


    $( "#filter-btn" )
    .button()
    .click(function() {
        $( "#filter-popup" ).dialog( "open" );

    });
 });

</script>

<!--added by glen end-->