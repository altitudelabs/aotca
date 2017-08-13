<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template Event Jumbotron
 *
 * Access original fields: $mod_settings
 */

wp_enqueue_style('jumbotron', plugin_dir_url( __FILE__ ) . '/assets/event-jumbotron.css');

$event_jumbotron_default = array(
    'location' => '',
    'title' => '',
    'date' => '',
    'host' => '',
    'image' => '',
);

$fields_args = wp_parse_args( $mod_settings, $event_jumbotron_default );

extract( $fields_args );

$container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
	'module', 'module-' . $mod_name, $module_ID
	), $mod_name, $module_ID, $fields_args )
);
?>

<div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
    <div class="event-jumbotron-container" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(<?php echo $image; ?>); background-size: cover;
    background-position: center; margin-bottom:20px">
        <p id="location"><?php echo $location ?></p>
        <p id="title"><?php echo $title ?></p>
        <p><span id="date"><?php echo $date ?></span></p>
        <p id="host">Hosted by:<br><?php echo $host ?></p>
    </div>
</div>
