<?php


add_action('cmb2_admin_init', 'abdur_metabox_fields_add');

function abdur_metabox_fields_add(){

	$prefix = '_prefix';

	$metaboxsection = new_cmb2_box(array(
		'title'			=> __('Informations', 'doctors_info'),
		'id'			=> 'doctors-info-fields',
		'object_types'	=> array('doctors_info')
	));

	$metaboxsection->add_field(array(
		'name'			=> __('Name', 'doctors_info'),
		'type'			=> 'text',
		'id'			=> $prefix . 'doctors_name'

	));

	$metaboxsection->add_field(array(
		'name'			=> __('Age', 'doctors_info'),
		'type'			=> 'text',
		'id'			=> $prefix . 'doctors_age'

	));

	$metaboxsection->add_field(array(
		'name'			=> __('Degree', 'doctors_info'),
		'type'			=> 'text',
		'id'			=> $prefix . 'doctors_degree'

	));

	$metaboxsection->add_field(array(
		'name'			=> __('Chamber', 'doctors_info'),
		'type'			=> 'wysiwyg',
		'id'			=> $prefix . 'doctors_chamber'

	));


}