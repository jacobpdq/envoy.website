<p>&lt;div class=&quot;orders view&quot;&gt;<br />
  &lt;h2&gt;&lt;?php echo __('Export Waybill Data');?&gt;&lt;/h2&gt;<br />
  &lt;div id=&quot;Profile_inset_orders3&quot;&gt;</p>
<p>&lt;div id=&quot;order_column_09&quot;&gt;<br />
  &lt;div id=&quot;confirm_data_holder&quot; class=&quot;Base_red_form_txt&quot;&gt;<br />
  &lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;Order Details&lt;/span&gt;</p>
<p>&lt;h4&gt;        &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt; &lt;span class=&quot;Base_txt&quot;&gt;Order Id: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['id']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt; &lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Company Name'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_company']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt; &lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('First Name'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_firstname']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt; &lt;span class=&quot;Base_txt&quot;&gt;&lt;?php echo __('Last Name'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_lastname']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt;Address1: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_address1']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Address 2: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_address2']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; &lt;?php echo __('City'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_city']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; &lt;?php echo __('Province'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_province']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; &lt;?php echo __('Postal Code'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_postalcode']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;/div&gt; <br />
  &lt;/div&gt;<br />
  <br />
  <br />
  &lt;div id=&quot;order_column_10&quot;&gt;<br />
  &lt;div id=&quot;confirm_data_holder&quot; class=&quot;Base_red_form_txt&quot;&gt; <br />
  &lt;br&gt; <br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Order Date: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['created']; ?&gt;&lt;/span&gt;&lt;/div&gt; <br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Tel: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_phonenumber']; ?&gt;&lt;/span&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; &lt;?php echo __('Email'); ?&gt;: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['shipping_email']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Order Source: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order_owners[$order['owner_type']]; ?&gt;&lt;/span&gt;&lt;/div&gt; <br />
  &lt;?php if($order['priority']=='1'):?&gt; <br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Delivery Type: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;Rush&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;?php elseif($order['priority']=='0'):?&gt; <br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Delivery Type: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;Normal&lt;/span&gt;&lt;br&gt;&lt;/div&gt;<br />
  &lt;?php endif;?&gt; <br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Must Arrive By: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['arrival_due_date']; ?&gt;&lt;/span&gt;&lt;/div&gt;<br />
  &lt;div id=&quot;Confirm_order_inset_Holder&quot;&gt;&lt;span class=&quot;Base_txt&quot;&gt; Order Comments: &lt;/span&gt;&lt;span class=&quot;data_Headers_Bl_txt&quot;&gt;&lt;?php echo $order['order_comments']; ?&gt;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;&lt;/h4&gt;<br />
  &lt;/div&gt;<br />
  &lt;/div&gt;</p>
<p>&lt;/div&gt;<br />
  &lt;div id=&quot;order_column_08&quot;&gt;<br />
  &lt;div class=&quot;related&quot;&gt;<br />
  <br />
  &lt;?php if (!empty($order['order_items'])):?&gt;<br />
  &lt;table cellpadding = &quot;0&quot; cellspacing = &quot;0&quot;&gt;<br />
  &lt;tr&gt;<br />
  &lt;th&gt;&lt;?php echo __('Brochure Name'); ?&gt;&lt;/th&gt;<br />
  &lt;th&gt;&lt;?php echo __('Qty Ordered'); ?&gt;&lt;/th&gt;<br />
  &lt;th&gt;&lt;?php echo __('Qty Shipped'); ?&gt;&lt;/th&gt;<br />
  &lt;th&gt;&lt;?php echo __('Status'); ?&gt;&lt;/th&gt;<br />
  &lt;th&gt;&lt;?php echo __('Weight (kg)'); ?&gt;&lt;/th&gt;<br />
  &lt;th&gt;&lt;?php echo __('Ship via'); ?&gt;&lt;/th&gt;<br />
  &lt;/tr&gt;<br />
  &lt;?php<br />
  $i = 0;<br />
  $package_weight = 0;<br />
  foreach ($order['order_items'] as $orderItem):<br />
  if ($orderItem['status'] == 6 or $orderItem['status'] == 0) {<br />
  $class = null;<br />
  if ($i++ % 2 == 0) {<br />
  $class = ' class=&quot;altrow&quot;';<br />
  }<br />
  <br />
  ?&gt;<br />
  &lt;tr&lt;?php echo $class;?&gt;&gt;<br />
  &lt;td&gt;&lt;?php  echo $orderItem['brochure']['name'];?&gt;&lt;/td&gt;<br />
  &lt;td&gt;&lt;?php echo $orderItem['qty_ordered'];?&gt;&lt;/td&gt;<br />
  &lt;td&gt;&lt;?php echo $orderItem['qty_shipped'];?&gt;&lt;/td&gt;<br />
  <br />
  &lt;?php if ($orderItem['status'] == 0) {<br />
  $colourclass = ' class=&quot;red&quot;';<br />
  }<br />
  else {<br />
  $colourclass = null;} ?&gt;<br />
  <br />
  &lt;td &lt;?php echo $colourclass;?&gt; &gt;<br />
  &lt;?php  echo $order_item_statuses[$orderItem['status']];?&gt;<br />
  &lt;/td&gt;<br />
  &lt;?php    if ($orderItem['status'] == 6) {<br />
  $line_weight = $orderItem['brochure']['weight'] * $orderItem['qty_shipped'] / 1000;<br />
  } <br />
  else {<br />
  $line_weight = 0;<br />
  }<br />
  $package_weight = $package_weight + $line_weight; ?&gt;<br />
  &lt;td&gt;<br />
  &lt;?php  echo $line_weight;?&gt;<br />
  &lt;/td&gt; <br />
  &lt;td&gt;<br />
  &lt;?php  echo $shipvia[$orderItem['shipped_via']];?&gt;<br />
  &lt;/td&gt;<br />
  &lt;/tr&gt; <br />
  &lt;?php } ?&gt;<br />
  &lt;?php endforeach; ?&gt;<br />
  &lt;tr&gt;&lt;td class=&quot;blankrow&quot;&gt;&lt;/td&gt;&lt;td class=&quot;blankrow&quot;&gt;&lt;/td&gt;&lt;td class=&quot;blankrow&quot;&gt;&lt;/td&gt;&lt;td class=&quot;blankrow&quot;&gt;&lt;/td&gt;&lt;td class=&quot;blankrow&quot;&gt;&lt;/td&gt;&lt;td class=&quot;blankrow&quot;&gt;&lt;/td&gt;&lt;/tr&gt;<br />
  &lt;tr&gt;<br />
  &lt;td&gt;&lt;/td&gt;<br />
  &lt;td&gt;&lt;/td&gt;<br />
  &lt;td&gt;&lt;/td&gt;<br />
  &lt;td&gt;&lt;?php echo &quot;Total Weight&quot;;?&gt;&lt;/td&gt;<br />
  &lt;td&gt;&lt;?php echo $package_weight;?&gt;&lt;/td&gt;<br />
  &lt;td&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;/table&gt;<br />
  &lt;?php endif; ?&gt;</p>
<p>&lt;/div&gt;<br />
  &lt;?php if ($order['shipped_via'] == 0) {<br />
  $waybillexport = 'waybillExportcanpar';<br />
  ?&gt;<br />
  &lt;div class=&quot;tools2&quot;&gt;<br />
  &lt;div id=&quot;csv-export-btn&quot;&gt;Export data for waybill&lt;/div&gt;<br />
  &lt;/div&gt;<br />
  &lt;?php }<br />
  else if ($order['shipped_via'] == 1) {<br />
  $waybillexport = 'waybillExportups';<br />
  ?&gt;<br />
  &lt;div class=&quot;tools2&quot;&gt;<br />
  &lt;div id=&quot;csv-export-btn&quot;&gt;Export data for waybill&lt;/div&gt;<br />
  &lt;/div&gt;<br />
  &lt;?php }<br />
  <br />
  else {   ?&gt;<br />
  &lt;div class=&quot;tools2&quot;&gt;<br />
  &lt;div id=&quot;csv-export-btn2&quot;&gt;Export only required for Canpar and UPS&lt;/div&gt;<br />
  &lt;/div&gt;<br />
  &lt;?php } ?&gt;<br />
</p>
<p>&lt;?php echo $this-&gt;Html-&gt;link(<br />
  'Print Packing Slip',<br />
  array(<br />
  'controller' =&gt; 'orders', 'action' =&gt; 'printpack', $order['id']),<br />
  array('class' =&gt; 'btn', 'target' =&gt; '_blank'));  ?&gt;<br />
  <br />
  &lt;br&gt;<br />
  &lt;br /&gt;<br />
  <br />
  &lt;?php echo $this-&gt;Html-&gt;link(<br />
  'Back',<br />
  array(<br />
  'controller' =&gt; 'orders', 'action' =&gt; 'ship', $order['id']),<br />
  array('class' =&gt; 'btn'));  ?&gt;<br />
  <br />
  &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;<br />
  <br />
  &lt;?php echo $this-&gt;Html-&gt;link(<br />
  'Next',<br />
  array(<br />
  'controller' =&gt; 'orders', 'action' =&gt; 'ship3', $order['id']),<br />
  array('class' =&gt; 'btn'));  ?&gt;<br />
  <br />
  &lt;/div&gt;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p> <br />
  &lt;div class=&quot;popup&quot; id=&quot;csv-report-popup&quot;&gt;<br />
  &lt;?php echo $this-&gt;Form-&gt;create('Report',array('url'=&gt;array('controller'=&gt;'Reports','action'=&gt;$waybillexport,'prefix' =&gt; 'admin'),'id'=&gt;'orders-export-form'));?&gt;<br />
  &lt;fieldset&gt;<br />
  &lt;legend&gt;Enter the Number of Packages&lt;/legend&gt;<br />
  &lt;ol&gt;<br />
  &lt;li&gt;&lt;?php echo $this-&gt;Form-&gt;input('boxes',array('label'=&gt;'Boxes'));?&gt;&lt;/li&gt;<br />
  &lt;li&gt;&lt;?php echo $this-&gt;Form-&gt;input('orderid',array('label'=&gt;'Order Id','type'=&gt;'hidden', 'value'=&gt;$order['id']));?&gt;&lt;/li&gt;<br />
  &lt;li&gt;&lt;?php echo $this-&gt;Form-&gt;input('weight',array('label'=&gt;'Weight','type'=&gt;'hidden', 'value'=&gt;$package_weight));?&gt;&lt;/li&gt;<br />
  &lt;/ol&gt;<br />
  &lt;/fieldset&gt;<br />
  &lt;?php echo $this-&gt;Form-&gt;end();?&gt;<br />
  <br />
  <br />
  <br />
  &lt;/div&gt;</p>
<p>&lt;script type=&quot;text/javascript&quot; &gt;<br />
  $(document).ready(function() {<br />
  <br />
  $( &quot;#csv-report-popup&quot; ).dialog({<br />
  autoOpen: false,<br />
  height: 300,<br />
  width: 820,<br />
  modal: true,<br />
  title: &quot;&lt;?php echo __('Export to Excel');?&gt;&quot;,<br />
  buttons: {<br />
  &quot;Export&quot;: function() {</p>
<p> $('#orders-export-form').submit();<br />
    <br />
  },<br />
  Close: function() {<br />
  $( this ).dialog( &quot;close&quot; );<br />
  }<br />
  },<br />
  close: function() {<br />
  allFields.val( &quot;&quot; ).removeClass( &quot;ui-state-error&quot; );<br />
  }<br />
  });</p>
<p> $( &quot;#csv-export-btn&quot; )<br />
  .button()<br />
  .click(function() {<br />
  $( &quot;#csv-report-popup&quot; ).dialog( &quot;open&quot; );</p>
<p> });<br />
    <br />
  $( &quot;#csv-export-btn2&quot; )<br />
  .button()<br />
  .click(function() {<br />
  $( &quot;#csv-report-popup2&quot; ).dialog( &quot;open&quot; );</p>
<p> });<br />
</p>
<p> $( &quot;#filter-popup&quot; ).dialog({<br />
  autoOpen: false,<br />
  height: 300,<br />
  width: 520,<br />
  modal: true,<br />
  title: &quot;&lt;?php echo __('Filter orders by date');?&gt;&quot;,<br />
  buttons: {<br />
  &quot;Filter&quot;: function() {</p>
<p> $('#orders-filter-form').submit();</p>
<p> },<br />
  Close: function() {<br />
  $( this ).dialog( &quot;close&quot; );<br />
  }<br />
  },<br />
  close: function() {<br />
  allFields.val( &quot;&quot; ).removeClass( &quot;ui-state-error&quot; );<br />
  }<br />
  });<br />
</p>
<p> $( &quot;#filter-btn&quot; )<br />
  .button()<br />
  .click(function() {<br />
  $( &quot;#filter-popup&quot; ).dialog( &quot;open&quot; );</p>
<p> });<br />
  });</p>
<p>&lt;/script&gt;</p>
