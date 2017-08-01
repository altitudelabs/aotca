<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Jumbotron_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Jumbotron', 'jumbotron' ),
			'slug' => 'jumbotron'
		));
	}
	public function get_options() {
		return array(
			array(
				'id' => 'jumbotron_title',
				'type' => 'text',
				'label' => __('Title', 'jumbotron'),
				'class' => ''
			),
			array(
				'id' => 'jumbotron_image',
				'type' => 'image',
				'label' => __('Background Image', 'jumbotron'),
				'class' => ''
			),
		);
	}
}

Themify_Builder_Model::register_module( 'Jumbotron_Module' );
