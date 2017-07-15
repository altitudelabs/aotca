<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template News Detail
 *
 * Access original fields: $mod_settings
 */

wp_enqueue_style('news-detail', plugin_dir_url( __FILE__ ) . '/assets/news-detail.css');

$news_detail_default = array(
  'date' => '',
  'title' => '',
  'description' => '',
);

$fields_args = wp_parse_args( $mod_settings, $news_detail_default );

extract( $fields_args );

$container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
	'module', 'module-' . $mod_name, $module_ID
	), $mod_name, $module_ID, $fields_args )
);
?>

<div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
  <div class="news-detail-container aotca-viewport">
    <div class="date"><?php echo $date ?></div>
    <h1 class="title">
      <?php echo $title ?>
    </h1>
    <div class="description">
      <?php echo $description ?>
    </div>
  </div>
</div>
