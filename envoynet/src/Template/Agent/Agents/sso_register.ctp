<div class="inner-content-wrapper">
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	
jQuery(document).ready(function($){

    $('a').each(function() {
    	if($(this).attr('href') == "/wp-admin/") {

    		$(this).attr('href', 'http://travelweekpro.ca');
    	}

   
});

});


</script>
    <div id="profile_info">
        <?php echo $form; ?>
    </div>
</div>
