jQuery(document).ready(function($) {
   getPassword();
});

// Get Password Function
function getPassword() {
   jQuery("#password-generator-h3").hide();
   jQuery("#loading").show();

   // jQuery("#readability").val()
   jQuery.ajax({
      type: "POST",
      data: "readability=" + jQuery("#readability").val(),
      url: "/wp-content/themes/skeleton-child/ajax-php/password-generator.php",
      dataType: 'json',
      success: function(data) {
         if (data.length < 8) {
            jQuery("#loading").hide();
            jQuery("#password-generator-h3").show();
            jQuery("#password-location").html("<span style=\"color: red;\"> Something bad happened...</span>");
         } else {
            jQuery("#password-location").html(data);
            jQuery("#loading").hide();
            jQuery("#password-generator-h3").show();
         }
      }
   });
}