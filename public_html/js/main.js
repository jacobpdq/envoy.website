$(document).ready(function() {

  $(function(){
 
    $('.date').datepicker({
      //dateFormat: 'yy-mm-dd', minDate: +0, maxDate: "+2M +20D"
      dateFormat: 'yy-mm-dd'

    });

    $.expr[':'].nocontent = function(obj, index, meta, stack){
    // obj - is a current DOM element
    // index - the current loop index in stack
    // meta - meta data about your selector
    // stack - stack of all elements to loop

    // Return true to include current element
    // Return false to explude current element
    return !($.trim($(obj).text()).length) && !($(obj).children().length)
};

	$('#paging_numbers:nocontent').remove();


  });
});


