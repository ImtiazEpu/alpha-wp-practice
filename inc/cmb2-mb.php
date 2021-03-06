<?php
function cmb2_add_img_info_metabox() {

	$prefix = '_alpha_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'image_information',
		'title'        => __( 'Image Information', 'alpha' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name'    => __( 'Camera Model', 'alpha' ),
		'id'      => $prefix . 'camera_model',
		'type'    => 'text',
		'default' => 'canon',
	) );

	$cmb->add_field( array(
		'name' => __( 'Location', 'alpha' ),
		'id'   => $prefix . 'location',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Date', 'alpha' ),
		'id'   => $prefix . 'date',
		'type' => 'text_date',
	) );

	$cmb->add_field( array(
		'name' => __( 'licensed', 'alpha' ),
		'id'   => $prefix . 'licensed',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name'       => __( 'License information', 'alpha' ),
		'id'         => $prefix . 'license_information',
		'type'       => 'textarea',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'licensed',
		),
	) );

	$cmb->add_field( array(
		'name' => __( 'Image', 'alpha' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name'       => __( 'Upload Resume', 'alpha' ),
		'id'         => $prefix . 'resume',
		'type'       => 'file',
		'text'       => array(
			'add_upload_file_text' => __( 'Upload PDF file', 'alpha' )
		),
		'query_args' => array(
			'type' => array(
				'application/pdf'
			),
		),
		'options'    => array(
			'url' => false,
		)
	) );

}

add_action( 'cmb2_init', 'cmb2_add_img_info_metabox' );


function cmb2_add_pricingtable() {

	$prefix = '_alpha_pt_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'pricing_table',
		'title'        => __( 'Pricing Table', 'alpha' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$group = $cmb->add_field( array(
		'name' => __( 'Pricing Table', 'alpha' ),
		'id'   => $prefix . 'pricing_table',
		'type' => 'group',
	) );

	$cmb->add_group_field( $group, array(
		'name'       => __( 'Caption', 'alpha' ),
		'id'         => $prefix . 'pricing_caption',
		'type'       => 'text',
	) );
	$cmb->add_group_field( $group, array(
		'name'       => __( 'Price', 'alpha' ),
		'id'         => $prefix . 'price',
		'type'       => 'text',
	) );
	$cmb->add_group_field( $group, array(
		'name'       => __( 'Pricing Option', 'alpha' ),
		'id'         => $prefix . 'pricing_option',
		'type'       => 'text',
		'repeatable' => true
	) );

}

add_action( 'cmb2_init', 'cmb2_add_pricingtable' );