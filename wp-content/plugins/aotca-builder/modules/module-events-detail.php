<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class Events_Detail_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Events Detail', 'events' ),
			'slug' => 'events-detail'
		));
	}

	public function get_options() {
		return array(

      array(
        'id' => 'start_date',
        'type' => 'text',
        'label' => __( 'Start Date', 'events' ),
        'class' => '',
      ),

      array(
        'id' => 'end_date',
        'type' => 'text',
        'label' => __( 'End Date', 'events' ),
        'class' => '',
      ),
      array(
        'id' => 'timezone',
        'type' => 'text',
        'label' => __( 'Timezone', 'events' ),
        'class' => '',
      ),

      array(
        'id' => 'location',
        'type' => 'text',
        'label' => __( 'Location', 'events' ),
        'class' => '',
      ),

      array(
	    'id' => 'event_detail',
        'type' => 'wp_editor',
        'rows' => 5,
        'label' => __( 'Event Detail', 'events' ),
        'class' => '',
      ),
			array(
				'id' => 'general_info_detail',
				'type' => 'wp_editor',
		        'rows' => 5,
				'label' => __( 'General Info', 'events' ),
				'class' => '',
			),
    );
  }
}

Themify_Builder_Model::register_module( 'Events_Detail_Module' );
