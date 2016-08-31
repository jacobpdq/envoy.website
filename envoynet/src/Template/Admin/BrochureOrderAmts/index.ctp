<div class="orders index">
	 <h2><?php echo __('Brochure Order Amounts');?></h2>
	<!--added by glen-->
<div class="inner-content-wrapper">	
 
</div> 
<!--added by glen end-->
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo ('id');?></th>
			<th><?php echo ('brochure_id');?></th>
			<th><?php echo ('tier');?></th>
			<th><?php echo ('quantity');?></th>
			
	</tr>


<?php
	$i = 0;
	foreach ($brochure_order_amts as $brochureorderamt):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
      
          if($class!=null)
          {
            $class = ' class="altrow rushorder"';
          } else {
            $class = ' class="rushorder"';
          }
        
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $brochureorderamt['BrochureOrderAmt']['id']; ?>&nbsp;</td>
		<td><?php echo $brochureorderamt['BrochureOrderAmt']['brochure_id']; ?>&nbsp;</td>
		<td><?php echo $brochureorderamt['BrochureOrderAmt']['tier']; ?>&nbsp;</td>
		<td><?php echo $brochureorderamt['BrochureOrderAmt']['quantity']; ?>&nbsp;</td>
		
		
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
      <div id="paginate_btn" class="paginate_data_txt">
        <?php
            echo $this->Paginator->counter(__('Page {{page}} / {{pages}}'));
        ?>
      </div>
      <?php echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
      <?php if($this->Paginator->numbers()) { ?>
      <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
      </div>
      <?php } ?>
      <?php echo $this->Paginator->next('<div id="Next_btn">'.__('Next').'</div>', array('escape'=>false), null, array('class' => 'disabled','escape'=>false)); ?>
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