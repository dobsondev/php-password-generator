<?php /* Template Name: PHP Password Generator */ ?>
<?php
  get_header();
  do_action('dobsondev_before_content');
?>
<script type="text/javascript" src="/wp-content/themes/dobsondev-child/password-generator/password-generator.js"></script>
<style type="<?php echo 'text/css'; ?>">
  #password-location-div {
    text-align: center;
    border: 1px solid black;
    padding: 3px 3px 3px 3px;
  }

  #password-input {
     text-align: center;
     font-size: 225%;
     margin: 0 auto;
  }
</style>

<h2> Your password is: </h2>

<div id="loading" class="spin-1"> </div>
<div id="password-location-div"> <input type="text" id="password-input" size="30" /> </div>
<h4 style="text-align: center; margin-top: 30px;"> Readablility </h4>
<div style="text-align: center; margin-bottom: 30px;">More Readable <input type="range" name="readability" id="readability" min="1" max="3"> More Secure </div>
<div class="blue-button" id="new-password-button" onClick="getPassword();"> New Password </div>

<?php
  do_action('dobsondev_menu');
  do_action('dobsondev_after_content');
  get_footer();
?>