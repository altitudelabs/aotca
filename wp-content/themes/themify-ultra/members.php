<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<link type="text/css" href="<?php echo get_template_directory_uri();?>/members.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/members.js"></script>

<?php
  class Member {
    public $image;
    public $link_text;
    public $link_url;
    public $location;
    public $address;
    public $phone;
    public $fax;
    public $email;
    public $website;
    public $organisation_overview;
    public $location_map;
  }

  $members_array = array();
  $associate_members_array = array();

  $member_page = get_fields(6127);
  $member_settings = $member_page['member_settings'];
  $associate_member_settings = $member_page['associate_member_settings'];
  $member_page_jumbotron = $member_page['member_page_jumbotron'];
  $member_page_description = $member_page['member_page_description'];

  for($i=0; $i < count($member_settings); $i++){
    $member_temp = new Member;
    $member_temp->image = $member_settings[$i]['image'];
    $member_temp->link_text = $member_settings[$i]['link_text'];
    $member_temp->link_url = $member_settings[$i]['link_url'];
    $member_temp->location = $member_settings[$i]['location'];

    /*NEW MEMBER FIELDS */
    $member_temp->address = $member_settings[$i]['address'];
    $member_temp->phone = $member_settings[$i]['phone'];
    $member_temp->fax = $member_settings[$i]['fax'];
    $member_temp->email = $member_settings[$i]['email'];
    $member_temp->website = $member_settings[$i]['website'];
    $member_temp->organisation_overview = $member_settings[$i]['organisation_overview'];
    $member_temp->location_map = $member_settings[$i]['location_map'];
    $members_array[] = $member_temp;
  }

  for($i=0; $i < count($associate_member_settings); $i++){
    $associate_member_temp = new Member;
    $associate_member_temp->image = $associate_member_settings[$i]['image'];
    $associate_member_temp->link_text = $associate_member_settings[$i]['link_text'];
    $associate_member_temp->link_url = $associate_member_settings[$i]['link_url'];
    $associate_member_temp->location = $associate_member_settings[$i]['location'];

    /*NEW ASSOCIATE MEMBER FIELDS */
    $associate_member_temp->address = $member_settings[$i]['address'];
    $associate_member_temp->phone = $member_settings[$i]['phone'];
    $associate_member_temp->fax = $member_settings[$i]['fax'];
    $associate_member_temp->email = $member_settings[$i]['email'];
    $associate_member_temp->website = $member_settings[$i]['website'];
    $associate_member_temp->organisation_overview = $member_settings[$i]['organisation_overview'];
    $associate_member_temp->location_map = $member_settings[$i]['location_map'];
    $associate_members_array[] = $associate_member_temp;
  }
?>

<div id="jumbotron" style="background-image:url(<?php echo $member_page_jumbotron?>)">
	<h1>Members</h1>
</div>
<div id="aotca-content-container">

  <div id="description-wrapper">
    <p>
      <?php echo $member_page_description?>
    </p>
  </div>

  <section class="header-wrapper">
    <h1>Members</h1>
  </section>
  <div class="members-container">
    <?php
      function roundUpToAny($n, $x=3) {
        return (ceil($n)%$x === 0) ? ceil($n) : round(($n+$x/2)/$x)*$x;
      }

      for($i = 0; $i < count($members_array); $i++) {
    ?>
      <div class="member-container">
        <a class="naked member" href="<?php echo $members_array[$i]->link_url?>">
          <div class="logo-wrapper">
            <img src="<?php echo $members_array[$i]->image?>" />
          </div>
          <div class="description">
            <div>
                <span class="description-title"><?php echo $members_array[$i]->link_text?></span>
            </div>
            <span class="description-text"><?php echo $members_array[$i]->location?></span>
          </div>
        </a>
      </div>
    <?php }?>
  </div>

  <section class="header-wrapper">
    <h1>Associate Members</h1>
  </section>

  <div class="members-container">
    <?php
      for($i = 0; $i < count($associate_members_array); $i++) {
    ?>
      <div class="member-container">
        <a class="naked member" href="<?php echo $associate_members_array[$i]->link_url?>">
          <div class="logo-wrapper">
            <img src="<?php echo $associate_members_array[$i]->image?>" />
          </div>
          <div class="description">
            <div>
                <span class="description-title"><?php echo $associate_members_array[$i]->link_text?></span>
            </div>
            <span class="description-text"><?php echo $associate_members_array[$i]->location?></span>
          </div>
        </a>
      </div>
    <?php }?>
  </div>
</div>
