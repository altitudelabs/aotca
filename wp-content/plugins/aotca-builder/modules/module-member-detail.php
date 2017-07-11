<?php
if ( ! defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly

class Member_Detail_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Member', 'member-detail' ),
			'slug' => 'member-detail'
		));
	}

	public function get_options() {
		return array(
			array(
				'id' => 'member_detail_logo',
				'type' => 'image',
				'label' => __( 'Logo', 'member-detail' ),
				'class' => '',
			),
      array(
        'id' => 'member_detail_title',
        'type' => 'text',
        'label' => __( 'Title', 'member-detail' ),
        'class' => '',
      ),
      array(
        'id' => 'member_detail_address',
        'type' => 'text',
        'label' => __( 'Address', 'member-detail' ),
        'class' => '',
      ),
      array(
        'id' => 'member_detail_phone',
        'type' => 'text',
        'label' => __( 'Phone', 'member-detail' ),
        'class' => '',
      ),
      array(
        'id' => 'member_detail_fax',
        'type' => 'text',
        'label' => __( 'Fax', 'member-detail' ),
        'class' => '',
      ),
      array(
        'id' => 'member_detail_email',
        'type' => 'text',
        'label' => __( 'Email', 'member-detail' ),
        'class' => '',
      ),
      array(
        'id' => 'member_detail_website',
        'type' => 'text',
        'label' => __( 'Website', 'member-detail' ),
        'class' => '',
      ),
      array(
        'id' => 'member_detail_overview',
        'type' => 'textarea',
        'rows' => 5,
        'label' => __( 'Overview', 'member-detail' ),
        'class' => '',
      ),
    );
  }
}

Themify_Builder_Model::register_module( 'Member_Detail_Module' );
