<div class="inner-content-wrapper">
    <a href="<?php echo $this->Url->build(array('controller'=>'orders','action'=>'quickOrder','prefix' => 'supplier'));?>"><div id="place_order_btn"></div></a>
  </div>
<div class="inner-content-wrapper">
  <div class="tools">
    <div id="filter-btn">Filter by date</div>
    <div id="csv-export-btn">Export to Excel</div>
  </div>
	
<table class="index" cellpadding="0" cellspacing="0">
 <tr>
   <th><?php echo $this->Paginator->sort('Date','created');?></th>
   <th><?php echo $this->Paginator->sort('Company','agent_id');?></th>
 </tr>
 
  <?php
	$i = 0;
	foreach ($ebrochureorders as $ebrochureorder):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
       
   ?>
   <tr<?php echo $class;?>>
    <td><?php echo $ebrochureorder['created']; ?>&nbsp;</td>
     <td><?php echo $ebrochureorder['agent']['company']; ?>&nbsp;</td>
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


<div class="popup" id="filter-popup">
  <?php echo $this->Form->create('Filter',array('url'=>array('controller'=>'ebrochureorders','action'=>'search','prefix' => 'supplier'),'id'=>'orders-filter-form'));?>
  <fieldset>
    <legend>Select Date Range</legend>
    <ol>
       <li><?php echo $this->Form->input('filter_start_date',array('label'=>'Start date','class'=>'date'));?></li>
       <li><?php echo $this->Form->input('filter_end_date',array('label'=>'End date','class'=>'date'));?></li>
    </ol>
  </fieldset>
  <?php echo $this->Form->end();?>
</div>

<div class="popup" id="csv-report-popup">
  <?php echo $this->Form->create('Report',array('url'=>array('controller'=>'Reports','action'=>'ebrochureordersExport','prefix' => 'supplier'),'id'=>'orders-export-form'));?>
  <fieldset>
    <legend>Select Date Range</legend>
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