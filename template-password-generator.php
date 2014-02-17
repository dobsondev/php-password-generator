<?php /* Template Name: PHP Password Generator */ ?>
<?php get_header(); ?>

<div class="page-body">
<h2> Your password is: </h2>

<div id="loading" class="spin-1"> </div>
<h3 id="password-generator-h3" hidden> <div id="password-location"> </div> </h3>
<h4 style="text-align: center; margin-top: 30px;"> Readablility </h4>
<div style="margin-left: 38%; margin-bottom: 30px;">More Readable <input type="range" name="readability" id="readability" min="1" max="3"> More Secure </div>
<div class="blue-button" id="new-password-button" onClick="getPassword();"> New Password </div>
</div>

<?php get_footer(); ?>