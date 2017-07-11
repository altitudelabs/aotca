<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class Gallery_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'AOTCA Gallery', 'gallery' ),
			'slug' => 'gallery'
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
            'label' => __( 'Image', 'gallery' ),
            'class' => '',
          ),
          array(
            'id' => 'date',
            'type' => 'text',
            'label' => __( 'Date', 'gallery' ),
            'class' => '',
          ),
          array(
            'id' => 'title',
            'type' => 'text',
            'label' => __( 'Title', 'gallery' ),
            'class' => '',
          ),
        ),
			),
    );
  }
}

Themify_Builder_Model::register_module( 'Gallery_Module' );
