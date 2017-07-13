<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class News_Detail_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'News Detail', 'news' ),
			'slug' => 'news-detail'
		));
	}

	public function get_options() {
		return array(
      // array(
      //   'id' => 'date_time_title',
      //   'type' => 'text',
      //   'label' => __( 'Date and Time Section Title', 'news' ),
      //   'class' => '',
      // ),
      array(
        'id' => 'start_date',
        'type' => 'text',
        'label' => __( 'Start Date', 'news' ),
        'class' => '',
      ),
      array(
        'id' => 'end_date',
        'type' => 'text',
        'label' => __( 'End Date', 'news' ),
        'class' => '',
      ),
      array(
        'id' => 'timezone',
        'type' => 'text',
        'label' => __( 'Timezone', 'news' ),
        'class' => '',
      ),
      // array(
      //   'id' => 'location_title',
      //   'type' => 'text',
      //   'label' => __( 'Location Section Title', 'news' ),
      //   'class' => '',
      // ),
      array(
        'id' => 'location',
        'type' => 'text',
        'label' => __( 'Location', 'news' ),
        'class' => '',
      ),
      // array(
      //   'id' => 'program_itinerary_title',
      //   'type' => 'text',
      //   'label' => __( 'Program Itinerary Section Title', 'news' ),
      //   'class' => '',
      // ),
      array(
        'id' => 'event_detail',
        'type' => 'text',
        'label' => __( 'Event Detail', 'news' ),
        'class' => '',
      ),
			array(
				'id' => 'general_info_detail',
				'type' => 'text',
				'label' => __( 'General Info', 'news' ),
				'class' => '',
			),
    );
  }
}

Themify_Builder_Model::register_module( 'News_Detail_Module' );
