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
  }

  $members_array = array();

  $member_page = get_fields(6127);
  $member_settings = $member_page['member_settings'];
  $associate_member_settings = $member_page['associate_member_settings'];

  for($i=0; $i < count($member_settings); $i++){
    $member_temp = new Member;
    $member_temp->image = $member_settings[$i]['image'];
    $member_temp->link_text = $member_settings[$i]['link_text'];
    $member_temp->link_url = $member_settings[$i]['link_url'];
    $member_temp->location = $member_settings[$i]['location'];
    $members_array[] = $member_temp;
  }

  for($i=0; $i < count($associate_member_settings); $i++){
    $associate_member_temp = new Member;
    $associate_member_temp->image = $associate_member_settings[$i]['image'];
    $associate_member_temp->link_text = $associate_member_settings[$i]['link_text'];
    $associate_member_temp->link_url = $associate_member_settings[$i]['link_url'];
    $associate_member_temp->location = $associate_member_settings[$i]['location'];
    $associate_members_array[] = $associate_member_temp;
  }
?>

<div id="jumbotron">
	<h1>Members</h1>
</div>
<div id="aotca-content-container">

  <div id="description-wrapper">
    <p>
      Our members are organisations comprised of tax consultants, lawyers and professionals, established in the
      Asian and Oceanic region and with good standing as recognized by general consensus or domestic law in their
      own countries or regions. Please refer to Article 5 of the Statutes for details.
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

      for($i = 0; $i < roundUpToAny(count($members_array)); $i++) {
    ?>
      <div class="member-container <?php if ($i >= count($members_array)) echo "empty" ?>">
        <?php
          if ($i < count($members_array)) {
        ?>
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
        <?php }?>
      </div>
    <?php }?>
  </div>

  <section class="header-wrapper">
    <h1>Associate Members</h1>
  </section>

  <div class="members-container">
    <?php
      for($i = 0; $i < roundUpToAny(count($associate_members_array)); $i++) {
    ?>
      <div class="member-container <?php if ($i >= count($associate_members_array)) echo "empty" ?>">
        <?php
          if ($i < count($associate_members_array)) {
        ?>
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
        <?php }?>
      </div>
    <?php }?>
  </div>
</div>
