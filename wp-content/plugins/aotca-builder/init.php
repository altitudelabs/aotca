<?php
/*
Plugin Name:  AOTCA Builder
Version:      1.0
Author:       Altitude Labs
Description:  AOTCA UI Component Builder
*/

defined( 'ABSPATH' ) or die;

function aotca_builder_register_module( $ThemifyBuilder ) {
	$ThemifyBuilder->register_directory( 'templates', plugin_dir_path( __FILE__ ) . '/templates' );
	$ThemifyBuilder->register_directory( 'modules', plugin_dir_path( __FILE__ ) . '/modules' );
}
add_action( 'themify_builder_setup_modules', 'aotca_builder_register_module' );
?>
