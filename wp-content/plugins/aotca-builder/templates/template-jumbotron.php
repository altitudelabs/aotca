<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template Jumbotron
 *
 * Access original fields: $mod_settings
 */

wp_enqueue_style('jumbotron', plugin_dir_url( __FILE__ ) . '/assets/jumbotron.css');

$jumbotron_default = array(
  'jumbotron_title' => '',
  'jumbotron_image' => '',
);

$fields_args = wp_parse_args( $mod_settings, $jumbotron_default );

extract( $fields_args );

$container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
	'module', 'module-' . $mod_name, $module_ID
	), $mod_name, $module_ID, $fields_args )
);
?>

<div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
    <div class="jumbotron-container" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(<?php echo $jumbotron_image; ?>); background-size: cover;
    background-position: center;">
        <p id="title"><?php echo $jumbotron_title ?></p>
    </div>
</div>
