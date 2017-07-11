<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template Member Detail
 *
 * Access original fields: $mod_settings
 */

wp_enqueue_style('member-page', plugin_dir_url( __FILE__ ) . '/assets/member-detail.css');

$member_detail_default = array(
	'logo' => '',
  'title' => '',
  'address' => '',
  'phone' => '',
  'fax' => '',
  'email' => '',
  'website' => '',
  'overview' => '',
);

$fields_args = wp_parse_args( $mod_settings, $member_detail_default );
extract( $fields_args );

$container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
	'module', 'module-' . $mod_name, $module_ID
	), $mod_name, $module_ID, $fields_args )
);
?>

<div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
  <div id="aotca-content-container">
    <section class="info">
      <div class="logo-container">
        <img src="<?php echo $member_detail_logo?>" />
      </div>
      <div class="text-info">
        <h1 class="title"><?php echo $member_detail_title?></h1>
        <div class="field">
          <span class="key">Address</span>
          <span class="value"><?php echo $member_detail_address?></span>
        </div>
        <div class="field">
          <span class="key">Phone</span>
          <span class="value"><?php echo $member_detail_phone?></span>
        </div>
        <div class="field">
          <span class="key">Fax</span>
          <span class="value"><?php echo $member_detail_fax?></span>
        </div>
        <div class="field">
          <span class="key">Email</span>
          <span class="value"><?php echo $member_detail_email?></span>
        </div>
        <div class="field">
          <span class="key">Website</span>
          <a class="value" href="<?php echo $member_detail_website?>"><?php echo $member_detail_website?></a>
        </div>
      </div>
    </section>
    <section class="overview">
      <h2>Overview</h2>
      <span><?php echo $member_detail_overview?></span>
    </section>
  </div>
</div>
