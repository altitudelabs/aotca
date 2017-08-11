<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class Pubs_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Pubs', 'pubs' ),
			'slug' => 'Pubs'
		));
	}

	public function get_options() {
		return array(
			array(
				'id' => 'pubs_section_desc',
				'type' => 'textarea',
                'label' => __( 'Pubs Section Description', 'pubs' ),
                'class' => '',
            ),
            array(
				'id' => 'pubs_list',
				'type' => 'builder',
				'options' => array(
					array(
						'id' => 'thumbnail',
						'type' => 'image',
						'label' => __( 'Thumbnail', 'pubs' ),
						'class' => '',
					),
					array(
						'id' => 'title',
						'type' => 'text',
						'label' => __( 'Title', 'pubs' ),
						'class' => '',
					),
                    array(
						'id' => 'password',
						'type' => 'text',
						'label' => __( 'Password', 'pubs' ),
						'class' => '',
					),
					array(
						'id' => 'link',
						'type' => 'text',
						'label' => __( 'Link', 'pubs' ),
						'class' => '',
					),
				),
			),
    );
  }
}

Themify_Builder_Model::register_module( 'Pubs_Module' );
