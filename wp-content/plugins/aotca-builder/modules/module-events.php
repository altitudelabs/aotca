<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class Events_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Events', 'events' ),
			'slug' => 'events'
		));
	}

	public function get_options() {
		return array(
			array(
              'id' => 'page',
              'type' => 'text',
              'label' => __( 'Number of documents per page', 'events' ),
              'class' => '',
            ),
    	);
  }
}

Themify_Builder_Model::register_module( 'Events_Module' );
