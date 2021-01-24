(function( $ ) {
	'use strict';


	 $(function() {
        $('body').on('focus',".datepicker", function(){
            $(this).datepicker({
                 dateFormat : 'yy-mm-dd',
                 numberOfMonths : 2,
                 showButtonPanel : true,
                 buttonText : 'Select Date',
                 autoSize: true
            });
        });
      
        $('body').on('focus',".timepicker", function(){
            $(this).each(function(){
                $(this).timepicker({
                    stepMinute : 5,
                    showSecond : false,
                    hourMax    : 23,
                    minuteMax  : 59
                });
            });
        });

         $("#wpa_loop-kamino_events").sortable({
             placeholder: "ui-state-highlight",
             change: function(){
                 $("#wpa-warning").show();
             }
         });

         $(".event_meta_control").on("click", ".remove-image", function(e){

             e.preventDefault();
             var parent = $(this).parent();
             parent.find(".uploadfile").attr("value", "");
             parent.find("a img").attr("src", "");;

         });

         // Display the image when we upload it
         $(".uploadfile").on("change", function(){
             var new_value = $(this).attr('value');
             $(this).parent().find('img').attr('src', new_value);
         });

	 });


})( jQuery );
