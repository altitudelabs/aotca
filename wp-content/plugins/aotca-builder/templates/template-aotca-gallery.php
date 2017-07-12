<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template AOTCA Gallery
 *
 * Access original fields: $mod_settings
 */

wp_enqueue_style('gallery-page', plugin_dir_url( __FILE__ ) . '/assets/gallery.css');

$gallery_default = array(
  'gallery_list' => array(
    array(
      'image' => '',
      'title' => '',
      'date' => '',
      'link' => '',
    ),
  ),
);

$fields_args = wp_parse_args( $mod_settings, $gallery_default );

extract( $fields_args );

$container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
	'module', 'module-' . $mod_name, $module_ID
	), $mod_name, $module_ID, $fields_args )
);
?>

<section class="grid-container gallery-section" id="aotca-content-container">
  <?php
    for($i = 0; $i < count($gallery_list); $i++) {
  ?>
    <div class="gallery-container">
      <a class="naked gallery-item" href="<?php echo $gallery_list[$i][link]?>">
        <div class="logo-wrapper">
          <img src="<?php echo $gallery_list[$i][image]?>" />
        </div>
        <div class="description">
          <span class="description-date"><?php echo $gallery_list[$i][date]?></span>
          <span class="description-title"><?php echo $gallery_list[$i][title]?></span>
        </div>
      </a>
    </div>
  <?php }?>
</section>
