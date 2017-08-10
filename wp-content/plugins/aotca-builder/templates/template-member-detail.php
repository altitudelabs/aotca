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

function render_member_info ($key, $value, $url=false) { ?>
	<?php if (!empty($value)):?>
		<div class="field">
		<span class="key"><?php echo $key?></span>
		<?php if ($url == false):?>
		<span class="value"><?php echo $value?></span>
	<?php else:?>
		<a class="value" href="<?php echo $value?>"><?php echo $value?></a>
	<?php endif;?>
	  </div>
  <?php endif;?>
<?php } ?>

<div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
  <div id="aotca-content-container">
    <section class="info">
      <div class="logo-container"><div class="logo-wrapper">
        <img src="<?php echo $member_detail_logo?>" /> </div>
      </div>
      <div class="text-info">
        <h2 class="title"><?php echo $member_detail_title?></h2>
		<?php render_member_info("Address", $member_detail_address)?>
		<?php render_member_info("Phone", $member_detail_phone)?>
		<?php render_member_info("Fax", $member_detail_fax)?>
		<?php render_member_info("Email", $member_detail_email)?>
		<?php render_member_info("Website", $member_detail_website, true)?>
	      </div>
    </section>
	<?php if (!empty($member_detail_overview)):?>
    <section class="overview">
      <h3>Organisation Overview</h3>
      <span><?php echo $member_detail_overview?></span>
    </section>
	<?php endif;?>
  </div>
</div>
