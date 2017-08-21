<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class Members_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Members', 'members' ),
			'slug' => 'members'
		));
	}

	public function get_options() {
		return array(
			array(
				'id' => 'members_section_title',
				'type' => 'text',
				'label' => __( 'Members Section Title', 'members' ),
				'class' => '',
			),
			array(
				'id' => 'members_section_desc',
				'type' => 'textarea',
				'label' => __( 'Members Section Description', 'members' ),
				'class' => '',
			),
			array(
				'id' => 'associate_members_section_title',
				'type' => 'text',
				'label' => __( 'Associate Members Section Title', 'members' ),
				'class' => '',
			),
    );
  }
}

Themify_Builder_Model::register_module( 'Members_Module' );
