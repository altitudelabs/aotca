<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class News_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'News', 'news' ),
			'slug' => 'news'
		));
	}

	public function get_options() {
		return array(
			array(
				'id' => 'news_list',
				'type' => 'builder',
				'options' => array(
		          array(
		            'id' => 'date',
		            'type' => 'text',
		            'label' => __( 'Date', 'news' ),
		            'class' => '',
		          ),
					array(
						'id' => 'title',
						'type' => 'text',
						'label' => __( 'Title', 'news' ),
						'class' => '',
					),
					array(
						'id' => 'description',
						'type' => 'text',
						'label' => __( 'Description', 'news' ),
						'class' => '',
					),
					array(
						'id' => 'link',
						'type' => 'text',
						'label' => __( 'Link', 'news' ),
						'class' => '',
					),
				),
			),
    );
  }
}

Themify_Builder_Model::register_module( 'News_Module' );
