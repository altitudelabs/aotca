<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<link type="text/css" href="<?php echo get_template_directory_uri();?>/officer.css" rel="stylesheet">

<?php
	global $post;
	$post_slug = $post->post_name;
	$post_ID = $post->ID;
	$fields = get_fields();

	$name = get_field("name");
	$image = get_field("image");
	$imageURL = $image['url'];
	$position = get_field("position");
	$professional_status = get_field("professional_status");
	$memberships = get_field("memberships");
	$academic_background = get_field("academic_background");
?>

<head>
	<div id = "officer_banner">
		<div id = "officer_content">
			<div id = "officer_img_wrapper">
				<img id = "officer_img" src = "<?php echo $imageURL ?>">
			</div>
			<div id = "officer_description_wrapper">
				<div id = "description_wrapper">
					<h1 id="name"> <?php echo $name ?></h1>
					<p  id="position"> <?php echo $position ?></p>
				</div>
			</div>
		</div>
	</div>
</head>

<body>

<article>
	<h1 id="officer_header">Professional Status </h1>
	<p><?php echo $professional_status ?>
	<h1 id="officer_header">Memberships </h1>
	<p><?php echo $memberships ?>
	<h1 id="officer_header">Academic Background </h1>
	<p><?php echo $academic_background?> </p>
</article>


</body>


</html>
