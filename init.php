<?php

/*
 * Plugin Name:       Doctors Information Slider
 * Plugin URI:        https://softtech-it.com
 * Description:       very easy to use slider to show Doctors Information
 * Version:           1.0.0
 * Author:            Abdur Rahman
 * Author URI:        https://
 * License:           GPL v2
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:		  Doctors-info
 */

defined( 'ABSPATH' ) or die( 'directory browsing is disabled' );


class Doctor{

	public function __construct(){
		// Required Files
		if(file_exists(dirname(__FILE__) . '/metabox/init.php' ) ){
			require_once(dirname(__FILE__) . '/metabox/init.php' );
		}
		if(file_exists(dirname(__FILE__) . '/metabox/metabox-config.php' ) ){
			require_once(dirname(__FILE__) . '/metabox/metabox-config.php' );
		}

		add_action( 'init', array($this, 'abdur_doctors_slider_post') );

		add_action('wp_enqueue_scripts', array( $this, 'external_scripts_and_styles') );

	}

	public function external_scripts_and_styles(){
		wp_enqueue_style('owl-carousel', PLUGINS_URL('css/owl.carousel.css', __FILE__));

		wp_enqueue_style('owl-custom', PLUGINS_URL('css/owl.custom.css', __FILE__));

		wp_enqueue_script('owl-carousel', PLUGINS_URL('js/owl.carousel.min.js', __FILE__), array('jquery'));

		wp_enqueue_script('owl-custom', PLUGINS_URL('js/owl.custom.js', __FILE__), array('jquery'));
	}
	

	public function abdur_doctors_slider_post() {
	$labels = array(
		'name'                  => _x( 'Doctors', 'Doctors general name', 'doctors-info' ),
		'singular_name'         => _x( 'Doctor', 'Doctor singular name', 'doctors-info' ),
		'menu_name'             => _x( 'Doctors', 'Doctors Admin Menu text', 'doctors-info' ),
		'name_admin_bar'        => _x( 'Doctor', 'Add New on Toolbar', 'doctors-info' ),
		'add_new'               => __( 'Add New info', 'doctors-info' ),
		'add_new_item'          => __( 'Add New info', 'doctors-info' ),
		'new_item'              => __( 'New Doctor', 'doctors-info' ),
		'edit_item'             => __( 'Edit info', 'doctors-info' ),
		'view_item'             => __( 'View info', 'doctors-info' ),
		'all_items'             => __( 'All Doctors', 'doctors-info' ),
		'search_items'          => __( 'Search Doctors', 'doctors-info' ),
		'parent_item_colon'     => __( 'Parent Doctors:', 'doctors-info' ),
		'not_found'             => __( 'No Doctors found.', 'doctors-info' ),
		'not_found_in_trash'    => __( 'No Doctors found in Trash.', 'doctors-info' ),
		'featured_image'        => _x( 'Doctors Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'doctors-info' ),
		'set_featured_image'    => _x( 'Set Doctors image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'doctors-info' ),
		'remove_featured_image' => _x( 'Remove Doctors image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'doctors-info' ),
		'use_featured_image'    => _x( 'Use as Doctors image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'doctors-info' ),
		'archives'              => _x( 'Doctor archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'doctors-info' ),
		'insert_into_item'      => _x( 'Insert into Doctors info', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'doctors-info' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Doctors info', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'doctors-info' ),
		'filter_items_list'     => _x( 'Filter Doctors list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'doctors-info' ),
		'items_list_navigation' => _x( 'Doctors list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'doctors-info' ),
		'items_list'            => _x( 'Doctors list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'doctors-info' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'doctor' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-plus-alt',
		'supports'           => array( 'title', 'thumbnail' ),
	);

	register_post_type( 'doctors_info', $args );

	// taxonomy

		$labels = array(
		'name'                       => _x( 'Speciality', 'Speciality general name', 'Doctors-info' ),
		'singular_name'              => _x( 'Speciality', 'Speciality singular name', 'Doctors-info' ),
		'search_items'               => __( 'Search Speciality', 'Doctors-info' ),
		'popular_items'              => __( 'Popular Speciality', 'Doctors-info' ),
		'all_items'                  => __( 'All Speciality', 'Doctors-info' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Speciality', 'Doctors-info' ),
		'update_item'                => __( 'Update Speciality', 'Doctors-info' ),
		'add_new_item'               => __( 'Add New Speciality', 'Doctors-info' ),
		'new_item_name'              => __( 'New Speciality Name', 'Doctors-info' ),
		'separate_items_with_commas' => __( 'Separate Speciality with commas', 'Doctors-info' ),
		'add_or_remove_items'        => __( 'Add or remove Speciality', 'Doctors-info' ),
		'choose_from_most_used'      => __( 'Choose from the most used Speciality', 'Doctors-info' ),
		'not_found'                  => __( 'No Speciality found.', 'Doctors-info' ),
		'menu_name'                  => __( 'Speciality', 'Doctors-info' ),
	);

	$arguments = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'writer' ),
	);

	register_taxonomy( 'doctors-speciality', 'doctors_info', $arguments );
	}

	public function doctors_shortcode(){

		add_shortcode('doctors-info', array($this, 'doctors_info_output') );
	}

	public function doctors_info_output(){
		ob_start();
		$prefix = '_prefix_';

		$doctors_info = new WP_Query(array(
			'post_type' => 'doctors_info',
			'posts_per_page' => -1
		));

		?>
		<div class="owl-outside">

		<?php while($doctors_info->have_posts()) : $doctors_info->the_post(); ?>

		

			<div class="doctors-info">
				<div class="info-left">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				</div>
				<div class="info-right">
					<div class="informations">
						<ul>
							<li>Name: <span><?php echo get_post_meta(get_the_id(), $prefix.'doctors_name', true ); ?></span></li>


							<li>Speciality: <span>
								<?php $specialities = get_the_terms(get_the_id(), 'doctors-speciality');
								foreach($specialities as $speciality) {
									echo $speciality->name;
								} ?>
							</span></li>

							<li>Age: <span><?php echo get_post_meta(get_the_id(), $prefix.'doctors_age', true ); ?></span></li>

							<li>Degree: <span><?php echo get_post_meta(get_the_id(), $prefix.'doctors_degree', true ); ?></span></li>

							<li>Chamber: <span><?php echo get_post_meta(get_the_id(), $prefix.'doctors_chamber', true ); ?></span></li>
							
						</ul>
					</div>
				</div>
			</div>

			<?php endwhile; ?>

			</div>

		<?php return ob_get_clean();
	}




}


$doctor = new Doctor();

$doctor->doctors_shortcode();

