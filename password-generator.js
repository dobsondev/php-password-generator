jQuery(document).ready(function($) {
   getPassword();
});

// Get Password Function
function getPassword() {
   jQuery("#password-location-div").hide();
   jQuery("#loading").show();

   // jQuery("#readability").val()
   jQuery.ajax({
      type: "POST",
      data: "readability=" + jQuery("#readability").val(),
      url: "/wp-content/themes/dobsondev-child/password-generator/password-generator.php",
      dataType: 'json',
      success: function(data) {
         if (data.length < 8) {
            jQuery("#loading").hide();
            jQuery("#password-generator-h3").show();
            jQuery("#password-location-div").html("<span style=\"color: red;\"> Something bad happened...</span>");
         } else {
            jQuery("#password-input").val(data);
            jQuery("#loading").hide();
            jQuery("#password-location-div").show();
         }
      }
   });
}