<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class Event_Detail_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Event Detail', 'event' ),
			'slug' => 'event-detail'
		));
	}

	public function get_options() {
		return array(

      array(
        'id' => 'start_date',
        'type' => 'text',
        'label' => __( 'Start Date', 'event' ),
        'class' => '',
      ),

      array(
        'id' => 'end_date',
        'type' => 'text',
        'label' => __( 'End Date', 'event' ),
        'class' => '',
      ),
      array(
        'id' => 'timezone',
        'type' => 'text',
        'label' => __( 'Timezone', 'event' ),
        'class' => '',
      ),

      array(
        'id' => 'location',
        'type' => 'text',
        'label' => __( 'Location', 'event' ),
        'class' => '',
      ),

      array(
        'id' => 'event_detail',
        'type' => 'text',
        'label' => __( 'Event Detail', 'event' ),
        'class' => '',
      ),
			array(
				'id' => 'general_info_detail',
				'type' => 'text',
				'label' => __( 'General Info', 'event' ),
				'class' => '',
			),
    );
  }
}

Themify_Builder_Model::register_module( 'Event_Detail_Module' );
