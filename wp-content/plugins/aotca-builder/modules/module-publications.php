<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class Publications_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Publications', 'publications' ),
			'slug' => 'Publications'
		));
	}

	public function get_options() {
		return array(
			array(
				'id' => 'publications_section_desc',
				'type' => 'textarea',
                'label' => __( 'Publications Section Description', 'publications' ),
                'class' => '',
            ),
            array(
				'id' => 'publications_list',
				'type' => 'builder',
				'options' => array(
					array(
						'id' => 'thumbnail',
						'type' => 'image',
						'label' => __( 'Thumbnail', 'publications' ),
						'class' => '',
					),
					array(
						'id' => 'title',
						'type' => 'text',
						'label' => __( 'Title', 'publications' ),
						'class' => '',
					),
                    array(
						'id' => 'password',
						'type' => 'text',
						'label' => __( 'Password', 'publications' ),
						'class' => '',
					),
					array(
						'id' => 'link',
						'type' => 'text',
						'label' => __( 'Link', 'publications' ),
						'class' => '',
					),
				),
			),
    );
  }
}

Themify_Builder_Model::register_module( 'Publications_Module' );
