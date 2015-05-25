<?php /* Template Name: PHP Password Generator */ ?>
<?php
  // MAKE SURE YOU FILL OUT THIS PART OF THE TEMPLATE. THIS IS THE
  // NAME OF THE FOLDER FOR THE THEME YOU ARE USING WITH THE
  // PASSWORD GENERATOR
  $THEME_FOLDER = "dobsondev-child";

  get_header();
  do_action('dobsondev_before_content');
?>
<script type="text/javascript" src="/wp-content/themes/<?php echo $THEME_FOLDER; ?>/php-password-generator/password-generator.js"></script>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/<?php echo $THEME_FOLDER; ?>/php-password-generator/password-generator.css" />

<div id="hidden-theme-folder" style="display: none;"><?php echo $THEME_FOLDER ?></div>

<h2> Your password is: </h2>

<div id="loading" class="spin-1"> </div>
<div id="password-location-div"> <input type="text" id="password-input" /> </div>
<h4 style="text-align: center; margin-top: 30px;"> Readablility </h4>
<div style="text-align: center; margin-bottom: 30px;">More Readable <input type="range" name="readability" id="readability" min="1" max="3"> More Secure </div>
<div class="blue-button" id="new-password-button" onClick="getPassword();"> New Password </div>

<?php
  do_action('dobsondev_menu');
  do_action('dobsondev_after_content');
  get_footer();
?>