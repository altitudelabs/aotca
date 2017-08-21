<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template Members
 *
 * Access original fields: $mod_settings
 */

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
wp_enqueue_style('member-page', plugin_dir_url( __FILE__ ) . '/assets/members.css');

$members_default = array(
  'members_section_title' => 'Members',
  'members_section_desc' => '',
  'associate_members_section_title' => 'Associate Members',
);

$members = array(
    'members_list' => array(),
    'associate_members_list' => array(),
);

$custom_query_args = array(
    'post_type'=>'member',
    'nopaging' => true,
);
$custom_query = new WP_Query( $custom_query_args );

  if ( $custom_query->have_posts() ):
  while ( $custom_query->have_posts() ) : $custom_query->the_post();
  $title = get_the_title(get_the_ID());
  $address = get_post_meta(get_the_ID(), 'ptb_address', true);
  $type = end(explode("_", get_post_meta(get_the_ID(), 'ptb_type', true)[0]));
  $link = get_permalink(get_the_ID());
  $logo = get_post_meta(get_the_ID(), 'ptb_logo', true)[1];

  $temp_member = array(
      'logo'=> $logo,
      'title' => $title,
      'address' => $address,
      'link' => $link,
      'type' => $type,
  );

  if (!$type || $type == 1){
      $members['members_list'][] = $temp_member;
  }
  else{
      $members['associate_members_list'][] = $temp_member;
  }
endwhile;
wp_reset_postdata();

 endif;

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
        foreach(array_reverse($members['members_list']) as $member) {
      ?>
        <?php print_r( $member->logo ); ?>
        <div class="member-container">
          <a class="naked member" href="<?php echo $member[link]?>" target="_self">
            <div class="logo-wrapper">
              <img src="<?php echo $member[logo]?>" />
            </div>
            <div class="description">
              <div>
                  <span class="description-title"><?php echo $member[title]?></span>
              </div>
              <span class="description-text"><?php echo $member[address]?></span>
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
        foreach(array_reverse($members['associate_members_list']) as $member) {
      ?>
        <?php print_r( $member->logo ); ?>
        <div class="member-container">
          <a class="naked member" href="<?php echo $member[link]?>">
            <div class="logo-wrapper">
              <img src="<?php echo $member[logo]?>" />
            </div>
            <div class="description">
              <div>
                  <span class="description-title"><?php echo $member[title]?></span>
              </div>
              <span class="description-text"><?php echo $member[address]?></span>
            </div>
          </a>
        </div>
      <?php }?>
    </section>
  </div>
</div>
