<div class="inner-content-wrapper">
  <div class="tools">
  <div id="filter-btn">
    <a href="<?php echo $this->Url->build(array('controller'=>'brochures','action'=>'inventorysummary','prefix' => 'supplier'));?>">Summary Report</a>
  </div>
  </div>
</div>  

<div class="inner-content-wrapper">

  <div id="brochures-list">
    
  <!--<form id="form1" name="form1" method="post" action=""> -->
  <div id="Header_Company_Holder">

      <div id="Company_Title">
        <span class="Company_Title_txt_lg">
           <?php echo $this->request->session()->read("Auth.User.company"); ?>
        </span><br/>
       <span class="Base_red_txt_nl"> *Click on thumbnail to view larger image</span></div>

        

      <div class="paging" id="pagnate_top_Header">
         <?php echo $this->Paginator->prev('<div id="Prev_btn">'.__('Previous').'</div>', array('escape' => false), null, array('class' => 'disabled', 'escape' => false)); ?>
              <div id="paging_numbers">
          <?php echo $this->Paginator->numbers(); ?>
            </div>
        <?php echo $this->Paginator->next('<div id="Next_btn">'.__('Next').'</div>', array('escape' => false), null, array('class' => 'disabled', 'escape' => false)); ?>
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
            <a class="suppiler_product single_image"title="<?php echo $brochure['name'];?>" href="<?php echo $this->Url->build("/img/brochures/".$brochure['Image']['filename']);?>">
                  <?php echo $this->ImageResize->resize('brochures' . DS . $brochure['image']['filename'], 69, 95, false)?>
            </a>
          </div>
          <div id="product_header_holder"> <span class="Product_Title_txt"><?php echo $brochure['name'];?></span></div>
          <div id="product_date_holder" class="product_date"><?php echo date("Y F d",strtotime($brochure['created']));?></div>
          <div id="product_txt_holder" class="Base_Title_txt_discrip"><?php echo $brochure['description'];?></div>

   <!-- removed by glen       <div id="Max_Items_holder" class="Base_Title_txt_discrip">
              Maximum <span class="Max_Items_txt_rld"><?php echo $brochure['max_order'];?></span> brochures per order
          </div>  -->
          <div id="requires_approval_holder" class="product_date"></div>

        </div>
        <!--End Product/-->
        <div id="Edit_delete_holder">
<div id="product_header_holder"> <span class="Product_Title_txt">Inventory Balance:</span></div> <br> 
<div id="inventory_txt_holder" class="Base_Title_txt_inventory">Ontario <br>BC<br>Total</div>
<div id="inventory_txt_holder" class="Base_txt_inventory"><?php echo $brochure['Ontario_inventory'];?> <br> <?php echo $brochure['BC_inventory'];?><br><?php echo $brochure['inv_balance'];?></div>
    <!--       <a href="<?php echo $this->Url->build(array('controller'=>'brochures','action'=>'edit',$brochure['id'],'prefix' => 'supplier'));?>"><div id="Edit_Product_btn"></div></a>
         <a href="/supplier/deleteProduct?productId33=595"><div id="Delete_Product_btn"></div></a>     -->
        </div>
        <!--Start Cart/-->
        <div id="Edit_delete_holder">
    <a href="<?php echo $this->Url->build(array('controller'=>'brochures','action'=>'edit',$brochure['id'],'prefix' => 'supplier'));?>"><div id="Edit_Product_btn"></div></a>
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