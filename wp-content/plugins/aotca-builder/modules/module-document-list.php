<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class Document_List_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Document List', 'document-list' ),
			'slug' => 'document-list'
		));
	}

	public function get_options() {
		return array(
            array(
              'id' => 'page',
              'type' => 'text',
              'label' => __( 'Number of documents per page', 'document-list' ),
              'class' => '',
            ),
			array(
				'id' => 'button',
				'type' => 'builder',
				'options' => array(
					array(
						'id' => 'title',
						'type' => 'text',
						'label' => __( 'title', 'document-list' ),
						'class' => '',
					),
					array(
						'id' => 'link',
						'type' => 'text',
						'label' => __( 'link', 'document-list' ),
						'class' => '',
					),
				),
			),
        );
  }
}

Themify_Builder_Model::register_module( 'Document_List_Module' );
