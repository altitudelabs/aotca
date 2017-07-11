<?php
  wp_enqueue_style('member-page', get_template_directory_uri() . '/member.css');

  $member_page = get_fields(6127);
  $member_page_jumbotron = $member_page['member_page_jumbotron'];

  class Member {
    public $image;
    public $title;
    public $address;
    public $phone;
    public $fax;
    public $email;
    public $website;
    public $overview;
  }
  $temp_member = new Member;
  $temp_member->image = 'image';
  $temp_member->title = 'title';
  $temp_member->address = 'address';
  $temp_member->phone = 'phone';
  $temp_member->fax = 'fax';
  $temp_member->email = 'email';
  $temp_member->website = 'website';
  $temp_member->overview = 'overview';
?>

<div id="jumbotron" style="background-image:url(<?php echo $member_page_jumbotron?>)">
	<h1>Members</h1>
</div>
<div id="aotca-content-container">
  <section class="info">
    <div class="logo-container">
      <img src="<?php echo $temp_member->image?>" />
    </div>
    <div class="text-info">
      <h1 class="title"><?php echo $temp_member->title?></h1>
      <div class="field">
        <span class="key">Address</span>
        <span class="value"><?php echo $temp_member->address?></span>
      </div>
      <div class="field">
        <span class="key">Phone</span>
        <span class="value"><?php echo $temp_member->phone?></span>
      </div>
      <div class="field">
        <span class="key">Fax</span>
        <span class="value"><?php echo $temp_member->fax?></span>
      </div>
      <div class="field">
        <span class="key">Email</span>
        <span class="value"><?php echo $temp_member->email?></span>
      </div>
      <div class="field">
        <span class="key">Website</span>
        <a class="value" href="<?php echo $temp_member->website?>"><?php echo $temp_member->website?></a>
      </div>
    </div>
  </section>
  <section class="overview">
    <h2>Overview</h2>
    <span><?php echo $temp_member->overview?></span>
  </section>
  <section class="map">
    <h2>Location Map</h2>
  </section>
</div>
