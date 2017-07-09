<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<link type="text/css" href="<?php echo get_template_directory_uri();?>/news.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/news.js"></script>



<div id="jumbotron" style="background-image:url(<?php echo $member_page_jumbotron?>)">
	<h1>Members</h1>
</div>
<div id="aotca-content-container">

  <div id="description-wrapper">
    <p>
      <?php echo $member_page_description?>
    </p>
  </div>
</div>

</html>
