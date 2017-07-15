<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class News_Detail_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'News Detail', 'news-detail' ),
			'slug' => 'news-detail'
		));
	}

	public function get_options() {
		return array(
			array(
				'id' => 'date',
				'type' => 'text',
				'label' => __( 'Date', 'news-detail' ),
				'class' => '',
			),
			array(
				'id' => 'title',
				'type' => 'text',
				'label' => __( 'Title', 'news-detail' ),
				'class' => '',
			),
			array(
				'id' => 'description',
				'type' => 'wp_editor',
				'label' => __( 'Description', 'news-detail' ),
				'class' => '',
			),
    );
  }
}

Themify_Builder_Model::register_module( 'News_Detail_Module' );
