<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template Members
 *
 * Access original fields: $mod_settings
 */

wp_enqueue_style('member-page', plugin_dir_url( __FILE__ ) . '/assets/members.css');

$members_default = array(
  'members_section_title' => 'Members',
  'members_section_desc' => '',
  'members_list' => array(
    array(
      'logo' => '',
      'title' => '',
      'address' => '',
      'link' => '',
    ),
  ),
  'associate_members_section_title' => 'Associate Members',
  'associate_members_list' => array(
    array(
      'logo' => '',
      'title' => '',
      'address' => '',
      'link' => '',
    ),
  ),
);

$fields_args = wp_parse_args( $mod_settings, $members_default );

extract( $fields_args );

$container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
	'module', 'module-' . $mod_name, $module_ID
	), $mod_name, $module_ID, $fields_args )
);
?>

<div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
  <div id="aotca-content-container">
    <div class="header-wrapper">
        <p><?php echo $members_section_desc ?></p>
      <h1><?php echo $members_section_title ?></h1>
    </div>
    <section class="members-container">
      <?php
        for($i = 0; $i < count($members_list); $i++) {
      ?>
        <?php print_r( $members_list[$i]->logo ); ?>
        <div class="member-container">
          <a class="naked member" href="<?php echo $members_list[$i][link]?>">
            <div class="logo-wrapper">
              <img src="<?php echo $members_list[$i][logo]?>" />
            </div>
            <div class="description">
              <div>
                  <span class="description-title"><?php echo $members_list[$i][title]?></span>
              </div>
              <span class="description-text"><?php echo $members_list[$i][address]?></span>
            </div>
          </a>
        </div>
      <?php }?>
    </section>
    <div class="header-wrapper">
      <h1><?php echo $associate_members_section_title ?></h1>
    </div>
    <section class="members-container">
      <?php
        for($i = 0; $i < count($associate_members_list); $i++) {
      ?>
        <?php print_r( $associate_members_list[$i]->logo ); ?>
        <div class="member-container">
          <a class="naked member" href="<?php echo $associate_members_list[$i][link]?>">
            <div class="logo-wrapper">
              <img src="<?php echo $associate_members_list[$i][logo]?>" />
            </div>
            <div class="description">
              <div>
                  <span class="description-title"><?php echo $associate_members_list[$i][title]?></span>
              </div>
              <span class="description-text"><?php echo $associate_members_list[$i][address]?></span>
            </div>
          </a>
        </div>
      <?php }?>
    </section>
  </div>
</div>
