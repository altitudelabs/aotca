<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<link type="text/css" href="<?php echo get_template_directory_uri();?>/documents.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/documents.js"></script>

<div id = "jumbotron">
	<h1>Other Documents</h1>
</div>

<body>
<?php
	//echo var_dump(get_fields(5984));
	/*Creating Generic Document Type */
	class Document {
		public $document_name;
		public $file_attachment;
		public $date;
		public $members_only;
	}
	/*Creating own pagination */
	$document_objects= array();

	//echo var_dump(get_fields(5984));

	$query = (get_fields(5984));
	$documents = ($query["adding_documents"]);
	foreach($documents as $val){
		$temp = new Document;
		$temp->document_name = $val['document_name'];
		$temp->file_attachment = $val['file_attachment'];
		$temp->date = $val['date'];
		$temp->members_only = $val['members_only'];
		$document_objects[] = $temp;
	}

	//echo "<br>";
	//echo var_dump($document_objects);
	$num_elements_per_page = 2;

	$page = $_GET["results"];

	$reference_point;
	if($page==""||$page=="1"){
		$reference_point = 0;
	}
	else{
		$reference_point = ($page*$num_elements_per_page)-$num_elements_per_page;
	}


?>
<div id="back_button_wrapper">
	<a id = "back_button" href "#"><i class="fa fa-caret-left"></i>  Back to Publications </a>
</div>

<div id = "document_container">
	<?php for($i=$reference_point; $i<($reference_point+2); $i++){?>
		<hr>
		<div class = "button">
			<div class = "button_description">
				<h1><?php echo $document_objects[$i]->document_name?></h1>
				<p><?php echo $document_objects[$i]->date?></p>
			</div>
			<a href = "<?php echo $document_objects[$i]->file_attachment?>"> Download Now </a>
		</div>
	<?php }?>
</div>
<!-- End of document_container -->

<!-- Pagination Starts Here (Defualt 10 per page) -->
<?php
$pages = count($document_objects)/$num_elements_per_page;?>

<div id = "pagination_wrapper">
	<?php
	$previous_counter = 0;
	$next_counter = 0;
	for($i = 1; $i<=$pages; $i++){

		if($page>1 && $previous_counter==0){?>
			<a href="?results=<?php echo $page-1?>" class="custom_pagination" >&laquo; Previous </a>
		<?php
		$previous_counter++;
		}?>

		<a href ="?results=<?php echo $i?>" <?php if($page==$i){?>class="active" <?php }?>><?php echo $i; ?></a>

	<?php
	}
	if($page!=$pages&&$next_counter==0){?>
		<a href="?results=<?php echo $page+1?>" class="custom_pagination"> Next &raquo;</a>
	<?php
		$next_counter++;
	}?>
</div>


</body>
</html>
