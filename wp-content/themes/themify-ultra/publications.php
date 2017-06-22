<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<link type="text/css" href="<?php echo get_template_directory_uri();?>/publications.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/publications.js"></script>

<div id = "jumbotron">
	<h1>PUBLICATIONS</h1>
</div>

<?php 

	$post_ID = 5864;
	$fields = get_fields($post_ID);
	//echo var_dump($fields);
	// echo count($fields);

	// echo $fields['image_1']['url'];
	// echo "<br>";
	// echo $fields['image_2']['url'];
	// echo "<br>";
	// echo $fields['image_3']['url'];

	// for($i =0; $i< count($fields); $i++){
	// 	echo $fields[$i];
	// }

	// $arr = array("image_1", "image_2", "image_3", "image_4", "image_5", "image_6", "image_7");

	$images = array();
	foreach($fields as $key => $value){
		$images[] = $value['url'];
	}
	//echo var_dump($final_array);

	// $f = array_combine($arr,$final_array);
	// echo var_dump($f);

	$lock_image = $images[6];

	if(have_rows("settings")){
		echo "TRUE";
	}
	else{
		echo "FALSE";
	}

?>

<body>
	<p id = "publication_description">You may download past presentations, technical reports, opinion statements and other documents in the links provided below.</p>
	<div id = "box_container">
		<div id = "box_1">
			<img class = "publication_images" src = "<?php echo $images[0]?>">
			<div class = "lock_wrapper">
				<p class = "publication_images_description">Presentations </p>
				<img src = "<?php echo $lock_image?>">
			</div>
		</div>
		<div id = "box_2">
			<img class = "publication_images" src = "<?php echo $images[1]?>">
			<p class = "publication_images_description">Technical Reports </p>
		</div>
		<div id = "box_3">
			<img class = "publication_images" src = "<?php echo $images[2]?>">
			<p class = "publication_images_description">Opinion Statements </p>
		</div>
		<div id = "box_4">
			<img class = "publication_images" src = "<?php echo $images[3]?>">
			<p class = "publication_images_description">Minutes </p>
		</div>
		<div id = "box_5">
			<img class = "publication_images" src = "<?php echo $images[4]?>">
			<p class = "publication_images_description">Agenda </p>
		</div>
		<div id = "box_6">
			<img class = "publication_images" src = "<?php echo $images[5]?>">
			<p class = "publication_images_description">Other Documents </p>
		</div>
	</div>

</body>
