<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Event_Jumbotron_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Event Jumbotron', 'event-jumbotron' ),
			'slug' => 'event-jumbotron'
		));
	}
	public function get_options() {
		return array(
			array(
				'id' => 'location',
				'type' => 'text',
				'label' => __('Location', 'event-jumbotron'),
				'class' => ''
			),
			array(
				'id' => 'title',
				'type' => 'text',
				'label' => __('Title', 'event-jumbotron'),
				'class' => ''
			),
            array(
				'id' => 'date',
                'type' => 'text',
				'label' => __('Date', 'event-jumbotron'),
				'class' => ''
			),
            array(
                'id' => 'host',
                'type' => 'text',
				'label' => __('Hosted by', 'event-jumbotron'),
				'class' => ''
            ),
			array(
				'id' => 'image',
				'type' => 'image',
				'label' => __('Background Image', 'event-jumbotron'),
				'class' => ''
			),
		);
	}
}

Themify_Builder_Model::register_module( 'Event_Jumbotron_Module' );
