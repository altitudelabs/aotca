<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<link type="text/css" href="<?php echo get_template_directory_uri();?>/members.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/members.js"></script>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>

<?php

  class Member{

    public $image;
    public $link_text;
    public $link_url;
    public $location;

  }

  $members_array = array();

  $member_page = get_fields(6127);
  $member_settings = $member_page['member_settings'];

  for($i=0; $i < count($member_settings); $i++){
    $member_temp = new Member;
    $member_temp->image = $member_settings[$i]['image'];
    $member_temp->link_text = $member_settings[$i]['link_text'];
    $member_temp->link_url = $member_settings[$i]['link_url'];
    $member_temp->location = $member_settings[$i]['location'];
    $members_array[] = $member_temp;
  }

?>

<div id = "jumbotron" style = "background-image:url(http://ec2-54-255-203-71.ap-southeast-1.compute.amazonaws.com/wp-content/uploads/2017/06/GalleryBanner@2x-2.png)">
	<h1>Members</h1>
</div>

<div id = "description_wrapper">
  <p>
    Our members are organisations comprised of tax consultants, lawyers and professionals, established in the
    Asian and Oceanic region and with good standing as recognized by general consensus or domestic law in their
    own countries or regions. Please refer to Article 5 of the Statutes for details.
  </p>
</div>

<div id = "header_wrapper">
  <h1>Members</h1>
</div>

<div id = "logo_container">
  <?php for($i=0; $i<count($members_array); $i++){?>
    <div class = "logo">
      <div class = "img_wrapper">
        <img src = "<?php echo $members_array[$i]->image?>" />
      </div>
      <div class = "img_description">
        <a href = "<?php echo $members_array[$i]->link_url?>"><?php echo $members_array[$i]->link_text?></a>
        <p><?php echo $members_array[$i]->location?></p>
      </div>
    </div>
<?php }?>

</div>
