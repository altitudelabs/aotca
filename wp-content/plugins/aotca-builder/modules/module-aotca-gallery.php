<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class AOTCA_Gallery_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'AOTCA Gallery', 'aotca gallery' ),
			'slug' => 'aotca-gallery'
		));
	}

	public function get_options() {
		return array(
			array(
				'id' => 'gallery_list',
				'type' => 'builder',
        'options' => array(
          array(
            'id' => 'image',
            'type' => 'image',
            'label' => __( 'Image', 'aotca gallery' ),
            'class' => '',
          ),
          array(
            'id' => 'date',
            'type' => 'text',
            'label' => __( 'Date', 'aotca gallery' ),
            'class' => '',
          ),
          array(
            'id' => 'title',
            'type' => 'text',
            'label' => __( 'Title', 'aotca gallery' ),
            'class' => '',
          ),
          array(
            'id' => 'link',
            'type' => 'text',
            'label' => __( 'Link', 'aotca gallery' ),
            'class' => '',
          ),
        ),
			),
    );
  }
}

Themify_Builder_Model::register_module( 'AOTCA_Gallery_Module' );
