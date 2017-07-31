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
				'id' => 'members_list',
				'type' => 'builder',
				'options' => array(
					array(
						'id' => 'logo',
						'type' => 'image',
						'label' => __( 'Member Logo', 'members' ),
						'class' => '',
					),
					array(
						'id' => 'title',
						'type' => 'text',
						'label' => __( 'Member Title', 'members' ),
						'class' => '',
					),
					array(
						'id' => 'address',
						'type' => 'text',
						'label' => __( 'Member Address', 'members' ),
						'class' => '',
					),
					array(
						'id' => 'link',
						'type' => 'text',
						'label' => __( 'Member Link', 'members' ),
						'class' => '',
					),
				),
			),
			array(
				'id' => 'associate_members_section_title',
				'type' => 'text',
				'label' => __( 'Associate Members Section Title', 'members' ),
				'class' => '',
			),
			array(
				'id' => 'associate_members_list',
				'type' => 'builder',
				'options' => array(
					array(
						'id' => 'logo',
						'type' => 'image',
						'label' => __( 'Associate Member Logo', 'members' ),
						'class' => '',
					),
					array(
						'id' => 'title',
						'type' => 'text',
						'label' => __( 'Associate Member Title', 'members' ),
						'class' => '',
					),
					array(
						'id' => 'address',
						'type' => 'text',
						'label' => __( 'Associate Member Address', 'members' ),
						'class' => '',
					),
					array(
						'id' => 'link',
						'type' => 'text',
						'label' => __( 'Associate Member Link', 'members' ),
						'class' => '',
					),
				),
			),
    );
  }
}

Themify_Builder_Model::register_module( 'Members_Module' );
