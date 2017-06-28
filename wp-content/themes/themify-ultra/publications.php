<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<link type="text/css" href="<?php echo get_template_directory_uri();?>/publications.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/publications.js"></script>

<div id = "jumbotron">
	<h1>PUBLICATIONS</h1>
</div>

<?php

	$repeater = get_fields(5975);
	$names = array();
	$images = array();
	$links = array();
	$member_settings = array();
	$lock_images = array();

	foreach($repeater['publication_settings'] as $key=>$value){
		$names[] = $value['name'];
		$images[] = $value['image']['url'];
		$links[] = $value['link'];
		$member_settings[] = $value['member_content'];
		$lock_images[] = $value['lock_image']['url'];
	}

	// echo count($repeater['publication_settings']);
	// echo var_dump($repeater['publication_settings'][0])."<br>";
	// echo var_dump($names);
	// echo "<br>"."<br>";
	// echo var_dump($images);
	// echo "<br>"."<br>";
	// echo var_dump($links);
	// echo "<br>"."<br>";

?>

<body>
	<p id = "publication_description">You may download past presentations, technical reports, opinion statements and other documents in the links provided below.</p>
	<div id = "box_container">
	<?php
		for($i=0; $i<count($repeater['publication_settings']); $i++){?>
		<div class = "box" id = "box_<?php echo $i?>" onclick="redirect_link("<?php $links[$i]?>")">
			<img class = "publication_images" src = "<?php echo $images[$i]?>">
			<div class = "lock_wrapper">
				<p class = "publication_images_description"><?php echo $names[$i]?></p>
				<?php if($member_settings[$i]==1){?>
					<img src = "<?php echo $lock_images[$i]?>" onload = "append_member(<?php echo $i ?>);">
				<?php }?>
			</div>
		</div>
		<?php }?>
	</div>

<!-- Modal Code -->
	<div id = "my_modal" class = "modal">
		<div class = "modal_content">
			<span class = "close" onclick = "close_modal();">&times;</span>
			<p>Enter your member's password </p>
			<input type = "text">
			<button> Login </button>
		</div>
	</div>




</body>
