<div class="inner-content-wrapper">
    <script type="text/javascript">

			$(document).ready(function()
			{
				// this initialises the demo scollpanes on the page.
				$('.scroll-pane').jScrollPane(
                  {
                    showArrows: true,
                    animateScroll: true
                  } );
			});

		</script>

  <div id="brochures-sidebar">

    <div class="holder">

        <div class="scroll-pane" id="brochures-suppliers-scrollpane">

          <!--Start Company Title/-->
         
          <?php if($suppliers->count() > 0): ?>        
          <ul id="supplier-list">
          <li>
            <?php 
            $newArrivalsClass="";
            
            if($selectedSupplier!=null )
            {
              $newArrivalsClass='selected';
            }
            echo $this->Html->link(__('New Arrivals'),
                    array('controller'=>'brochures','action'=>'index','prefix' => 'agent'),
                    array('class'=>$newArrivalsClass));
            ?>
          </li>
          
          <li>
            <?php 
			if($tcuts==1) {
		
                     echo $this->Html->link(__('MERIT TRAVEL'),
                    array('controller'=>'brochures','action'=>'index','prefix' => 'agent', 1021)
                    );
				}
            ?>
          </li>
       

             
         <?php foreach ($suppliers as $supplier):?>
         
           <?php 
        
            $supplClass='';
            if($selectedSupplier != null && ($selectedSupplier->first()->id==$supplier->id))
              {
                $supplClass='selected';  
              }
            ?> 
            <li>
            
            
            
              <?php
             if(($supplier->status=='1') && ($supplier->display_on_agent_site =='1')){
               echo $this->Html->link($supplier->company,
                      array('controller'=>'brochures',$supplier->id,'prefix' => 'agent'),
                      array('class'=>$supplClass));
                      }
                      ?>  
                     
                    
            </li>
        
          <?php endforeach;?>
          </ul>
          <?php endif;?>
         
        </div>
    </div>
  </div>

  <div id="brochures-list">
    
  <!--<form id="form1" name="form1" method="post" action=""> -->
  <div id="Header_Company_Holder">
      <div id="Company_Title">
        <span class="Company_Title_txt_lg">
           <?php
           
           if($selectedSupplier != null)
            {
              echo $selectedSupplier->first()->company;
            } else {
              echo __("New Arrivals");
            }

           ?>
        </span><br/>
       <span class="Base_red_txt_nl"> *Click on thumbnail to view larger image</span></div>


      <div class="paging" id="pagnate_top_Header">
         <?php 
          echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>',[
            'escape' => false,
            'disabledTitle' => '<span class="disabled"><div id="Prev_btn">'.__('Previous').'</div></span>'
            ]); 
          ?>
              <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
            </div>
        <?php 
          echo $this->Paginator->next('<div id="Next_btn">'.__('Next').'</div>',[
            'escape' => false,
            'disabledTitle' => '<span class="disabled"><div id="Next_btn">'.__('Next').'</div></span>'
          ]); 
        ?>
      </div>

  </div>

    <?php if($brochures->count() > 0):?>
    <?php foreach($brochures as $brochure):?>

      <div id="Brochures_Main_Holder_agent">
  <!--       <?php echo $this->Form->create('OrderItem',array('url'=>array('controller'=>'ShoppingCart','action'=>'placeOrder','prefix' => 'agent'),'id'=>'orderBr'.$brochure->id));?>-->
        <!--Start Product Main Holder/-->
        <!--Start Product/-->
        <div id="product_holder">
          <div id="product_image_holder">
            <a class="suppiler_product single_image"  title="<?php echo $brochure->name;?>" href="<?php echo $this->Url->build('/img/brochures/'.$brochure->image->filename);?>">
                  <?php 
                  
                    if($brochure->image->filename){
                      echo $this->ImageResize->resize('brochures' . DS . $brochure->image->filename, 69, 95, false);
                      }
                    ?>
            </a>
          </div>
          <div id="product_header_holder"> <span class="Product_Title_txt"><?php echo $brochure->name;?></span></div>
          <div id="product_date_holder" class="product_date"><?php echo date("Y F d",strtotime($brochure->created));?></div>
          <div id="product_txt_holder1" class="Base_Title_txt_discrip"><?php echo $brochure->description;?></div>
        
  <!-- ebrochure button       -->
  <div id="product_date_holder1">
         <?php if(!empty($brochure->ebrochure)):   ?>
 
           <?php echo $this->Form->create('Ebrochureorder', array('url'=>array('controller'=>'EBrochureOrders','action'=>'index','prefix' => 'agent'),'id'=>'EbrochureorderAgentIndexForm'));?>
          <?php echo $this->Form->input('brochure_id',array('div'=>false,'value'=>$brochure->id,'label'=>false,'type'=>'hidden'));?> 
    <?php echo $this->Form->input('supplierid',array('div'=>false,'value'=>$brochure->supplier_id,'label'=>false,'type'=>'hidden'));?>
    <?php echo $this->Form->input('brochname',array('div'=>false,'value'=>$brochure->name,'label'=>false,'type'=>'hidden'));?>
    <?php echo $this->Form->input('webaddress',array('div'=>false,'value'=>$brochure->ebrochure,'label'=>false,'type'=>'hidden'));?>
        <?php echo $this->Form->submit(__('View E-brochure'));?>
        <?php echo $this->Form->end(); ?>
        <?php endif;?>
    </div>             
          <?php
			 if ($agttiers->count() == 0) {
			 $agttier = '';
			 $agttierlower = 'max_order';
			 }
			 else {
			  $agttier=$agttiers->first()->tier;
			  $agttierlower = 'max_order_'.strtolower($agttier);
			 }
			?>
          <div id="Max_Items_holder" class="Base_Title_txt_discrip">
              Maximum <span class="Max_Items_txt_rld"><?php echo $brochure[$agttierlower];?></span> brochures per order
          </div>
          <div id="requires_approval_holder" class="product_date"></div>

        </div>
        <!--End Product/-->
        <!--Start Cart/-->
        <?php echo $this->Form->create('OrderItem',array('url'=>array('controller'=>'ShoppingCart','action'=>'placeOrder','prefix' => 'agent'),'id'=>'orderBr'.$brochure->id));?>
        <div id="Cart_holder">
          <!--Start Quantity/-->
          <div id="Quanity_holder">
             <?php echo $this->Form->input('OrderItem.brochure_id',array('div'=>false,'value'=>$brochure->id,'label'=>false,'type'=>'hidden'));?>
             <?php echo $this->Form->input('OrderItem.brochure_name',array('div'=>false,'value'=>$brochure->name,'label'=>false,'type'=>'hidden'));?>
             <?php echo $this->Form->input('OrderItem.max_order',array('div'=>false,'value'=>$brochure[$agttierlower],'label'=>false,'type'=>'hidden'));?>
             <?php echo $this->Form->input('OrderItem.ontario',array('div'=>false,'value'=>$brochure->ontario,'label'=>false,'type'=>'hidden'));?>
             <?php
		      $qtychoice = null;
			  if (!empty($brochure['Brochure_order_amts'])) {
			  $qtychoice = array(null);
			  foreach($brochure['Brochure_order_amts'] as $orderamts):
			  $obj = $orderamts['quantity'];
			 if ($orderamts['tier'] == $agttier) {
			 array_push($qtychoice, $obj);
			 }
			 endforeach;
			 $result2 = Hash::sort($qtychoice, '{n}', 'asc');
			 $result1 = array_combine($result2,$result2);
			 unset($qtychoice[0]);
			 }
			 ?>
             <?php 
			  if (!empty($qtychoice)) {
			  echo $this->Form->input('OrderItem.qty_ordered',array('div'=>false,'label'=>false,'id'=>'Quanity_style3','placeholder'=>'# of Brochures','options' => $result1));
              foreach($result2 as $result2a):
		      echo $this->Form->input('OrderItem.qty_choice.'.$result2a,array('div'=>false,'value'=>$result2a,'label'=>false,'type'=>'hidden'));
			  endforeach;
			  }
			  else {
			   echo $this->Form->input('OrderItem.qty_ordered',array('div'=>false,'label'=>false,'id'=>'Quanity_style1','placeholder'=>'# of Brochures'));
			    echo $this->Form->input('OrderItem.qty_choice',array('div'=>false,'value'=>null,'label'=>false,'type'=>'hidden'));
			   
			  }
			  ?> 
             
             <p></p>
          </div>
          <!--End Quantity/-->
          <!--Start Ad to Order/-->
          <div id="jqueryselector2">
              <div ref="Add_to_Order_btn2" onClick ="$('#orderBr<?php echo $brochure->id; ?>').submit()" id="Add_to_Order_btn"><?php echo __('Add to Order'); ?></div>
          </div>
          <!--End Ad to Order/-->
        </div>
      </div>
      <?php echo $this->Form->end();?>
    <?php endforeach;?>
    <?php endif;?>

     <div class="paging">
      <div id="paginate_btn" class="paginate_data_txt">
    <?php
        echo $this->Paginator->counter( __('Page {{page}} of {{pages}}'));
    ?>
      </div>
         <?php 
          echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>',[
            'escape' => false,
            'disabledTitle' => '<span class="disabled"><div id="Prev_btn">'.__('Previous').'</div></span>'
            ]); 
          ?>
              <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
            </div>
        <?php 
          echo $this->Paginator->next('<div id="Next_btn">'.__('Next').'</div>',[
            'escape' => false,
            'disabledTitle' => '<span class="disabled"><div id="Next_btn">'.__('Next').'</div></span>'
          ]); 
        ?>
</div>

  <!--</form>-->
  </div>



</div>


<div class="inner-content-wrapper ">

</div>








<script type="text/javascript" >
    $(document).ready(function() {

	/* This is basic - uses default settings */

	$("a.single_image").fancybox({
            'padding'		: 20,
            'titlePosition':'inside'
        });

});

</script>
