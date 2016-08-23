<div class="inner-content-wrapper">
  <div class="tools">
  <div id="filter-btn">
    <a href="<?php echo $this->Url->build(array('controller'=>'brochures','action'=>'inventorysummary','prefix' => 'supplier'));?>"><?php echo __('Summary Report'); ?></a>
  </div>
  </div>
</div>  

<div class="inner-content-wrapper">

  <div id="brochures-list" class="supplier">
    
  <!--<form id="form1" name="form1" method="post" action=""> -->
  <div id="Header_Company_Holder">

      <div id="Company_Title">
<br/>
        <span class="Company_Title_txt_lg">
           <?php echo $this->request->session()->read("Auth.User.company"); ?>
        </span>
<br/>
<br/>
        <span class="Base_red_txt_nl"><?php echo __('Click on thumbnail to view larger image'); ?>
        </span>
      </div>

  </div>

    <?php if(!empty($brochures)):?>
    <?php foreach($brochures as $brochure):?>

      <div id="Brochures_Main_Holder">
        <?php echo $this->Form->create('OrderItem',array('url'=>array('controller'=>'ShoppingCart','action'=>'placeOrder','prefix' => 'supplier'),'id'=>'orderBr'.$brochure['id']));?>
        <!--Start Product Main Holder/-->
        <!--Start Product/-->

        <div id="product_holder">

          <div id="product_image_holder">
            <a class="suppiler_product single_image"title="<?php echo $brochure['name'];?>" href="<?php echo $this->Url->build("/img/brochures/".$brochure['image']['filename']);?>">
                  <?php 
                  
                    if($brochure->image->filename){
                      echo $this->ImageResize->resize('brochures' . DS . $brochure->image->filename, 187, 260, false);
                      }
                  ?>
            </a>
          </div>

          <div id="product_header_holder"> 
            <span class="Product_Title_txt"><?php echo $brochure['name'];?></span><br />
            <span class="Product_Language_txt"><?php if ($brochure->is_french == 1) {echo __('FrenchBrochure');} else {echo __('EnglishBrochure');}?></span><br />
            <span id="product_date_holder" class="product_date"><?php echo date("Y F d",strtotime($brochure['created']));?></span>
            <span class="Base_Title_txt_discrip"><?php echo $brochure['description'];?></span>
          </div>

<!-- removed by glen       
          <div id="Max_Items_holder" class="Base_Title_txt_discrip">
              Maximum <span class="Max_Items_txt_rld"><?php echo $brochure['max_order'];?></span> brochures per order
          </div>  
-->
          <div id="requires_approval_holder" class="product_date"></div>

        </div>
        <!--End Product/-->
        <div id="Edit_delete_holder">
          <div id="product_header_holder"> <span class="Product_Title_txt"><?php echo __('Inventory Balance'); ?>:</span></div> <br> 
          <div id="inventory_txt_holder" class="Base_Title_txt_inventory"><?php echo __('Ontario <br>BC<br>Total'); ?></div>
          <div id="inventory_txt_holder" class="Base_txt_inventory"><?php echo $brochure['Ontario_inventory'];?> <br> <?php echo $brochure['BC_inventory'];?><br><?php echo $brochure['inv_balance'];?></div>

<!--      <a href="<?php echo $this->Url->build(array('controller'=>'brochures','action'=>'edit',$brochure['id'],'prefix' => 'supplier'));?>"><div id="Edit_Product_btn"><?php echo __('View Details'); ?></div></a>
          <a href="/supplier/deleteProduct?productId33=595"><div id="Delete_Product_btn"></div></a>    
-->
          <a href="<?php echo $this->Url->build(array('controller'=>'brochures','action'=>'edit',$brochure['id'],'prefix' => 'supplier'));?>">
            <div id="Edit_Product_btn"><?php echo __('View Details'); ?></div>
          </a>
          <!--Start Quantity/
          <div id="Quanity_holder">  
             <?php //echo $this->Form->input('OrderItem.brochure_id',array('div'=>false,'value'=>$brochure['id'],'label'=>false,'type'=>'hidden'));?>
             <?php //echo $this->Form->input('OrderItem.brochure_name',array('div'=>false,'value'=>$brochure['name'],'label'=>false,'type'=>'hidden'));?>
             <?php //echo $this->Form->input('OrderItem.max_order',array('div'=>false,'value'=>$brochure['max_order'],'label'=>false,'type'=>'hidden'));?>
             <?php //echo $this->Form->input('OrderItem.qty_ordered',array('div'=>false,'value'=>'0','label'=>false,'id'=>'Quanity_style1'));?>
             <p></p>
          </div>
          -->
          <!--End Quantity/-->
          <!--Start Ad to Order/-->
          <div id="jqueryselector2">
              <!--<div ref="Add_to_Order_btn2" onClick ="$('#orderBr<?php echo $brochure['id']; ?>').submit()" id="Edit_Product_btn"></div>-->
          </div>
          <!--End Ad to Order/-->
        </div>
      </div>
      <?php echo $this->Form->end();?>
    <?php endforeach;?>
    <?php endif;?>
  <!--</form>-->
  </div>

</div>

<div class="inner-content-wrapper ">
<div class="paging">

  <?php echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>', array('escape' => false), null, array('class' => 'disabled', 'escape' => false)); ?>
    
  <div id="paginate_btn" class="paginate_data_txt">
    <?php
        echo $this->Paginator->counter(__('Page {{page}} / {{pages}}'));
    ?>
  </div>

  <div id="paging_numbers">
    <?php echo $this->Paginator->numbers(); ?>
  </div>
  
  <?php echo $this->Paginator->next('<div id="Next_btn">'.__('Next').'</div>', array('escape' => false), null, array('class' => 'disabled', 'escape' => false)); ?>

</div>
</div>




<script type="text/javascript" >
    $(document).ready(function() {

	$("a.single_image").fancybox({
            'padding'		: 20,
            'titlePosition':'inside'
        });

});

$( "#filter-btn" )
    .button()

</script>