<p>&lt;div class=&quot;orderItems form&quot;&gt;<br />
  &lt;h2&gt;&lt;?php echo __('Package Order');?&gt;&lt;/h2&gt;</p>
<p>&lt;?php  $orderItem= $this-&gt;request-&gt;data; ?&gt;<br />
  &lt;?php  $brochure= $this-&gt;request-&gt;data['brochure'];  ?&gt;<br />
  &lt;?php  $order= $this-&gt;request-&gt;data['order'];  ?&gt;</p>
<p>&lt;div id=&quot;Profile_inset_orders2&quot;&gt;</p>
<p>&lt;div id=&quot;order_column_05&quot;&gt;<br />
  &lt;div id=&quot;confirm_data_holder&quot; class=&quot;Base_red_form_txt&quot;&gt;<br />
  &lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;Order Details&lt;/span&gt;</p>
<p> &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt; &lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Order Id'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['id']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt; &lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Company Name'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_company']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt; &lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('First Name'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_firstname']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt; &lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Last Name'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_lastname']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Address1'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_address1']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Address2'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_address2']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('City'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_city']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Province'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_province']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Postal Code'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_postalcode']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;/div&gt; <br />
  &lt;/div&gt;<br />
  <br />
  <br />
  &lt;div id=&quot;order_column_06&quot;&gt;<br />
  &lt;div id=&quot;confirm_data_holder&quot; class=&quot;Base_red_form_txt&quot;&gt; <br />
  &lt;br&gt; <br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Date'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['created']; ?&gt;&lt;/span&gt;&lt;/div&gt; <br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Tel'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_phonenumber']; ?&gt;&lt;/span&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Email'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_email']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Order Source: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order_owners[$order['owner_type']]; ?&gt;&lt;/span&gt;&lt;/div&gt; <br />
  &lt;?php if($order['priority']=='1'):?&gt; <br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Delivery Type: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;Rush&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;?php elseif($order['priority']=='0'):?&gt; <br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Delivery Type: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;Normal&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;?php endif;?&gt; <br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Must Arrive By: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['arrival_due_date']; ?&gt;&lt;/span&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Order Comments: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['order_comments']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;/div&gt;<br />
  &lt;/div&gt;<br />
</p>
<p>&lt;div id=&quot;order_column_08&quot;&gt;<br />
  &lt;div id=&quot;confirm_data_holder&quot;&gt;<br />
  &lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;Order Item Details&lt;/span&gt;</p>
<p> &lt;?php echo $this-&gt;Form-&gt;create('OrderItem'); ?&gt;</p>
<p> &lt;ol&gt;<br />
  &lt;li&gt;&lt;?php echo $this-&gt;Form-&gt;input('id', array('value'=&gt;$orderItem['id'], 'hidden'=&gt;'hidden','label'=&gt;false));?&gt;&lt;/li&gt;<br />
  <br />
  <br />
  &lt;?php if ($orderItem['status'] == 0) {  ?&gt; <br />
  &lt;li&gt;&lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;?php echo $this-&gt;Form-&gt;input('barcodes', array('label' =&gt; 'Scan barcode', 'name' =&gt; 'barcodes','autofocus' =&gt; 'autofocus')); ?&gt;&lt;/div&gt;&lt;br&gt;&lt;br /&gt;&lt;/li&gt;<br />
  &lt;?php } ?&gt;<br />
  <br />
  &lt;li&gt;&lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;?php  echo $this-&gt;Form-&gt;input('brochure.name', array('label'=&gt;'Brochure name', 'value'=&gt;$brochure['name'], 'readonly'=&gt;'readonly'));?&gt;&lt;/div&gt;&lt;br&gt;&lt;br /&gt;&lt;/li&gt;<br />
  <br />
  <br />
  <br />
  &lt;li&gt; &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;?php  echo $this-&gt;Form-&gt;input('brochure.sku', array('label'=&gt;'Sku', 'value'=&gt;$brochure['sku'], 'readonly'=&gt;'readonly'));?&gt;&lt;/div&gt;&lt;br&gt;&lt;br /&gt;&lt;/li&gt;<br />
  &lt;li&gt;&lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;?php if ($orderItem['qty_shipped'] == 0) {<br />
  echo $this-&gt;Form-&gt;input('qty_shipped', array('label'=&gt;'Qty shipped','value'=&gt;$orderItem['qty_ordered'])); } <br />
  else {<br />
  echo $this-&gt;Form-&gt;input('qty_shipped', array('label'=&gt;'Qty shipped','value'=&gt;$orderItem['qty_shipped'])); }<br />
  ?&gt;&lt;/div&gt;&lt;br&gt;&lt;br/&gt;&lt;/li&gt;<br />
  &lt;li&gt; &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;?php  echo $this-&gt;Form-&gt;input('brochure.location', array('label'=&gt;'Location', 'value'=&gt;$brochure['location'], 'readonly'=&gt;'readonly'));?&gt;&lt;/div&gt;&lt;br&gt;&lt;br /&gt;&lt;/li&gt;<br />
  <br />
  &lt;li&gt;&lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;?php if ($orderItem['status'] == 6) {<br />
  echo $this-&gt;Form-&gt;input('statusfordisplay',array('label'=&gt;'Status','value'=&gt;$order_item_statuses[$orderItem['status']], 'class'=&gt;'green', 'readonly'=&gt;'readonly')); }<br />
  else {<br />
  echo $this-&gt;Form-&gt;input('statusfordisplay',array('label'=&gt;'Status','value'=&gt;$order_item_statuses[$orderItem['status']], 'readonly'=&gt;'readonly')); } ?&gt; <br />
  &lt;/div&gt;&lt;br&gt;&lt;br /&gt;&lt;/li&gt;<br />
  <br />
  &lt;li&gt;&lt;?php echo $this-&gt;Form-&gt;input('status',array('type'=&gt;'hidden', 'value'=&gt;$orderItem['status'] ));?&gt;&lt;/li&gt;<br />
  <br />
  &lt;li&gt;   &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;label&gt;Brochure Image&lt;/label&gt;  &lt;a class=&quot;suppiler_product single_image&quot;  title=&quot;&lt;?php echo $brochure['name'];?&gt;&quot; href=&quot;&lt;?php echo $this-&gt;Url-&gt;build(&quot;/img/brochures/&quot;.$brochure['image']['filename']);?&gt;&quot;&gt;<br />
  &lt;?php <br />
  if(!empty($brochure['image']['filename'])){<br />
  echo $this-&gt;ImageResize-&gt;resize('brochures' . DS . $brochure['image']['filename'], 69, 95, false);<br />
  }<br />
  ?&gt;<br />
  &lt;/a&gt; &lt;/div&gt;&lt;/li&gt;&lt;br&gt;&lt;br /&gt;&lt;br&gt;&lt;br /&gt;&lt;br&gt;&lt;br /&gt;<br />
  &lt;/ol&gt;<br />
  <br />
  &lt;fieldset class=&quot;submit&quot;&gt;<br />
  &lt;?php if ($orderItem['status'] == 0) {<br />
  echo $this-&gt;Form-&gt;submit(__('Verify barcode')); }<br />
  else if ($orderItem['status'] == 6) {<br />
  echo $this-&gt;Form-&gt;submit(__('Update Quantity Shipped')); } ?&gt;<br />
  &lt;/fieldset&gt;<br />
  &lt;?php echo $this-&gt;Form-&gt;end(); ?&gt;<br />
  <br />
  <br />
  &lt;div class=&quot;paging&quot;&gt;<br />
  &lt;div id=&quot;paginate_btn&quot; class=&quot;paginate_data_txt&quot;&gt;<br />
  &lt;?php<br />
  echo $this-&gt;Paginator-&gt;counter(__('Page {{page}} of {{pages}}'));<br />
  ?&gt;<br />
  &lt;/div&gt;<br />
  &lt;?php echo $this-&gt;Paginator-&gt;prev('&lt;div id=&quot;Prev_btn&quot;&gt;'.__('Previous').'&lt;/div&gt;', array('escape'=&gt;false), null, array('class' =&gt; 'disabled','escape'=&gt;false)); ?&gt;<br />
  &lt;div id=&quot;paging_numbers&quot;&gt;<br />
  &lt;?php echo $this-&gt;Paginator-&gt;numbers(); ?&gt;<br />
  &lt;/div&gt;<br />
  &lt;?php echo $this-&gt;Paginator-&gt;next('&lt;div id=&quot;Next_btn&quot;&gt;'.__('Next').'&lt;/div&gt;', array('escape'=&gt;false), null, array('class' =&gt; 'disabled','escape'=&gt;false)); ?&gt;<br />
  <br />
  &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;<br />
  <br />
  &lt;?php echo $this-&gt;Html-&gt;link(<br />
  'Ship Order',<br />
  array(<br />
  'controller' =&gt; 'orders', 'action' =&gt; 'ship', $orderItem['order_id']),<br />
  array('class' =&gt; 'btn'));  ?&gt;<br />
  <br />
  &lt;/div&gt;<br />
  <br />
  <br />
  &lt;/div&gt;<br />
  &lt;/div&gt;<br />
</p>
<p> <br />
  &lt;/div&gt;<br />
</p>
<p>&nbsp;</p>
<p> </p>
<p>&lt;script type=&quot;text/javascript&quot; &gt;<br />
  $(document).ready(function() {</p>
<p> /* This is basic - uses default settings */</p>
<p> $(&quot;a.single_image&quot;).fancybox({<br />
  'padding'		: 20,<br />
  'titlePosition':'inside'<br />
  });</p>
<p>});</p>
<p>&lt;/script&gt;</p>
