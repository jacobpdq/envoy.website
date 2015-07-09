<div class="inner-content-wrapper">
  <div class="tools">
    <div id="filter-btn">Filter by date</div>
       
    
  </div>
</div>  


<div class="inner-content-wrapper">
  
	
  <table class="index" cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $this->Paginator->sort('sku'); ?></th>
      <th><?php echo $this->Paginator->sort('name'); ?></th>
      <th><?php echo $this->Paginator->sort('category'); ?></th>
      <th><?php echo $this->Paginator->sort('Low Inv','inv_notif_threshold'); ?></th>
      <th><?php echo $this->Paginator->sort('qty_skid'); ?></th>
      <th><?php echo $this->Paginator->sort('qty_box'); ?></th>
      <th><?php echo $this->Paginator->sort('weight'); ?></th>
      <th><?php echo $this->Paginator->sort('inv_balance'); ?></th>
      <th><?php echo $this->Paginator->sort('created'); ?></th>
      <th><?php echo ('MTD Shipped'); ?></th>
      <th><?php echo ('PTD Shipped'); ?></th>
      <th><?php echo ('MTD Received'); ?></th>
      <th><?php echo ('PTD Received'); ?></th>
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
       <td><?php echo $brochure['sku']; ?></td>
       <td id="brochure_name"><?php echo $brochure['name']; ?></td>
       <td><?php echo $brochure_categorys[$brochure['category']]; ?></td>
      <td><?php echo $brochure['inv_notif_threshold']; ?></td>
      <td><?php echo $brochure['qty_skid']; ?></td>
      <td><?php echo $brochure['qty_box']; ?></td>
      <td><?php echo $brochure['weight']; ?></td>
      <td><?php echo $brochure['inv_balance']; ?></td>
      <td><?php echo $brochure['created']; ?></td>
      
      <?php 
	 

	 if (empty($this->request->data)) {
	   $endDateRoundup = date ('Y-m-j');
     $startdate = date ( 'Y-m-j' , 0);
    } else {
     $endDateRoundup = strtotime ( '+0 day' , strtotime ($this->request->data['filter_end_date'] ) ) ;
     $endDateRoundup = date ( 'Y-m-j' , $endDateRoundup );
     $startdate = strtotime ($this->request->data['filter_start_date']);
     $startdate = date ( 'Y-m-j' , $startdate);
    }

	   $brochurecount = 0;
		 $brochurecount1 = 0;
		 $mtdbrochurecount = 0;
		 $mtdbrochurecount1 = 0;  

		  foreach ($brochure['order_items'] as $orderItem):
  if(!empty($orderItem['order'])):
		  $orderdate = strtotime($orderItem['order']['created']);
		  $orderdate = date ( 'Y-m-j' , $orderdate);
		 		 
          $brochurecount1 = $orderItem['qty_shipped'];
	      $brochurecount = $brochurecount1 + $brochurecount;
		  $enddatemonth = date("m",strtotime($endDateRoundup));
		  $ordermonth = date("m",strtotime($orderdate));
		  $enddateyear = date("y",strtotime( $endDateRoundup));
		  $orderyear = date("y",strtotime($orderdate));
		  if($ordermonth==$enddatemonth && $orderyear==$enddateyear):
		  $mtdbrochurecount1 = $orderItem['qty_shipped'];
	      $mtdbrochurecount = $mtdbrochurecount1 + $mtdbrochurecount;

		  endif;
		  endif;
		  endforeach;
		  
		   $receiptcount = 0;
		   $receiptcount1 = 0;
		   $mtdreceiptcount = 0;
		   $mtdreceiptcount1 = 0;
		   
		  foreach ($brochure['receipts'] as $receipt):
	//	  if($orderItem['Brochure']['supplier_id']==$supplierId):
	      if(!empty($receipt)):
		  
		   $receiptdate = strtotime($receipt['date']);
		  $receiptdate = date ( 'Y-m-j' , $receiptdate);
		  
		  if($receiptdate >= $startdate && $receiptdate <= $endDateRoundup ):
		  $month = date("m",strtotime($receipt['date']));
		  $year = date("y",strtotime($receipt['date']));
		  if($month==$enddatemonth && $year==$enddateyear):
		  $mtdreceiptcount1 = $receipt['qty'];
	      $mtdreceiptcount = $mtdreceiptcount1 + $mtdreceiptcount;
		  endif;
		 
		 
          $receiptcount1 = $receipt['qty'];
	      $receiptcount = $receiptcount1 + $receiptcount;
		   endif;
		    endif;
	//	  endif;
		  endforeach;
	  ?>
      <td>
	  	  <?php 
		echo $mtdbrochurecount;
				?>
    </td>
      <td>
	  	  <?php 
		echo $brochurecount;
				?>
    </td>
    <td>
	  	  <?php 
		echo $mtdreceiptcount;
				?>
    </td>
    <td>
	  	  <?php 
		echo $receiptcount;
				?>
    </td>
     </tr>
    <?php endforeach; ?>
      </table>

</div>

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
 
   <?php echo $this->Form->create('Filter',array('url'=>array('controller'=>'brochures','action'=>'search','prefix' => 'supplier'),'id'=>'orders-filter-form'));?>
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
  <?php echo $this->Form->create('Report',array('url'=>array('controller'=>'Reports','action'=>'ordersExport','prefix' => 'supplier'),'id'=>'orders-export-form'));?>
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
        title: "<?php echo __('Filter by date');?>",
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