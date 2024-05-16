<?php

/**
 * education functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package education
 */

function enqueue_admin_custom_css()
{
	wp_enqueue_style('admin-custom', get_stylesheet_directory_uri() . '/resources/css/admin-custom.css');
}

add_action('admin_enqueue_scripts', 'enqueue_admin_custom_css');

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

add_action('init', 'do_output_buffer');
function do_output_buffer()
{
	ob_start();
}

// add_filter( 'login_url', 'custom_login_url', PHP_INT_MAX );
// function custom_login_url( $login_url ) {
// $login_url = site_url( 'access.php', 'login' );
// return $login_url;
// }

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function education_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on education, use a find and replace
		* to change 'education' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('education', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'education'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'education_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'education_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function education_content_width()
{
	$GLOBALS['content_width'] = apply_filters('education_content_width', 640);
}
add_action('after_setup_theme', 'education_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function education_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'education' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'education' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'education_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function education_scripts()
{
	wp_enqueue_style('education-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('education-style', 'rtl', 'replace');

	wp_enqueue_script('education-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'education_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


function siderbarregister()
{

	/* Footer Wigets Area */
	register_sidebar(array(
		'name' => 'GET IN TOUCH',
		'id' => 'get_in_tuch',
		'description' => 'Add GET IN TOUCH Section on footer',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar(array(
		'name' => 'NEWSLETTER',
		'id' => 'newsletter',
		'description' => 'Add NEWSLETTER Section on footer',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	register_sidebar(array(
		'name' => 'office',
		'id' => 'office',
		'description' => 'Add office to header',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	register_sidebar(array(
		'name' => 'phone',
		'id' => 'phone',
		'description' => 'Add phone to header',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	register_sidebar(array(
		'name' => 'email',
		'id' => 'email',
		'description' => 'Add email to header',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
}
add_action('widgets_init', 'siderbarregister');


function menu_register()
{
	register_nav_menus(
		array(
			'our_cources' => __('Our Cources'),
			'useful_links' => __('Useful Links'),
			'footer_links' => __('Footer Link'),
		)
	);
}
add_action('init', 'menu_register');

function add_additional_class_on_a($classes, $item, $args)
{
	if (isset($args->add_a_class)) {
		$classes['class'] = $args->add_a_class;
	}
	return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);
function example_theme_support()
{
	remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'example_theme_support');

function add_classes_on_li($classes, $item, $args)
{

	if (isset($args->add_li_class)) {
		$classes['class'] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_classes_on_li', 1, 3);


function my_nav_menu_submenu_css_class($classes, $item, $args)
{

	$classes[] = 'dropdown';

	return $classes;
}
add_filter('nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class', 1, 3);

function add_classname_to_parent_nav_link($atts, $item)
{

	// add class only on parent
	if ($item->menu_item_parent == 0) {
		//$atts['class'] = 'dropdown2';
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_classname_to_parent_nav_link', 1, 3);

// Admin footer modification

function remove_footer_admin()
{
	echo '<span id="footer-thankyou">Developed by <a href="https://weblabz.in/" target="_blank">weblabz</a></span>';
}

add_filter('admin_footer_text', 'remove_footer_admin');



function create_Testimonials_posttype()
{

	register_post_type(
		'Testimonials',
		array(
			'labels' => array(
				'name' => __('Testimonials'),
				'singular_name' => __('Testimonial')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'testimonials'),
			'show_in_rest' => true,
			'supports' => array(
				'title', 'excerpt', 'custom-fields',
				'menu_icon' => 'dashicons-book',
			),

		)
	);
	// editorials Custom Post Type
	register_post_type(
		'editorials',
		array(
			'labels' => array(
				'name' => __('Editorials'),
				'singular_name' => __('Editorial')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'editorials'),
			'show_in_rest' => true,
			'supports' => array(
				'title', 'editor', 'custom-fields', 'thumbnail',
				'menu_icon' => 'dashicons-book',
			),

		)
	);
	register_post_type(
		'dailynews',
		array(
			'labels' => array(
				'name' => __('Daily News'),
				'singular_name' => __('Daily News')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'dailynews'),
			'show_in_rest' => true,
			'supports' => array(
				'title', 'editor', 'custom-fields', 'thumbnail'
			),

		)
	);
	register_post_type(
		'homepageslider',
		array(
			'labels' => array(
				'name' => __('Home Page Slider'),
				'singular_name' => __('Home Page Slider')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'homepageslider'),
			'show_in_rest' => true,
			'supports' => array(
				'title', 'excerpt', 'custom-fields', 'thumbnail'
			),

		)
	);
	register_post_type(
		'popularcourses',
		array(
			'labels' => array(
				'name' => __('Popular Courses'),
				'singular_name' => __('Popular Courses')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'popularcourses'),
			'show_in_rest' => true,
			'supports' => array(
				'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail'
			),

		)
	);
	register_post_type(
		'ourvideo',
		array(
			'labels' => array(
				'name' => __('Our Video'),
				'singular_name' => __('Our Videos')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'ourvideo'),
			'show_in_rest' => true,
			'supports' => array('title', 'custom-fields', 'thumbnail'),
			'taxonomies' => array('category')

		)
	);
	register_post_type(
		'previous-year-paper',
		array(
			'labels' => array(
				'name' => __('Previous Year Paper'),
				'singular_name' => __('Previous Year Paper')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'previous-year-paper'),
			'show_in_rest' => true,
			'supports' => array('title', 'custom-fields'),

		)
	);

	register_post_type(
		'important-note',
		array(
			'labels' => array(
				'name' => __('Important Note'),
				'singular_name' => __('Important Note')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'important-note'),
			'show_in_rest' => true,
			'supports' => array('title', 'editor'),

		)
	);
	register_post_type(
		'essay',
		array(
			'labels' => array(
				'name' => __('Essay'),
				'singular_name' => __('Essay')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'essay'),
			'show_in_rest' => true,
			'supports' => array('title', 'editor'),

		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_Testimonials_posttype');


/* Shortcode create for testimonilas  */
add_shortcode('testmimonial', 'testmimonials');

function testmimonials()
{
	$html = "";
	$args = array(
		'post_status' => 'publish',
		'post_type' => 'testimonials',
		'posts_per_page' => -1,
		'orderby' => 'ID',
		'order' => 'DESC',
	);

	$testimonialsData = get_posts($args);
	foreach ($testimonialsData as $post) :
		$studentname = get_field('student_name', $post->ID);
		$image = get_field('student_image', $post->ID);

		$html .= '<div class="text-center">
		<i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
		<h4 class="font-weight-normal mb-4">' . $post->post_excerpt . '</h4>
		<img class="img-fluid mx-auto mb-3" src="' . $image['url'] . '" alt="">
		<h5 class="m-0">' . $studentname . '</h5>
		<span>Profession</span>
	</div>';
	endforeach;
	wp_reset_query(); //Reset all privious query!
	return $html;
}





/* Shortcode create for homepageslider */
add_shortcode('homepageslider', 'homepagesliders');

function homepagesliders()
{
	$html = "";
	$args = array(
		'post_status' => 'publish',
		'post_type' => 'homepageslider',
		'posts_per_page' => -1,
		'orderby' => 'ID',
		'order' => 'DESC',
	);

	$homePageSliderData = get_posts($args);

	//print_r($homePageSliderData);

	$html .= '<div class="container-fluid p-0 "><div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#header-carousel" data-slide-to="0" class="active"></li><li data-target="#header-carousel" data-slide-to="1"></li><li data-target="#header-carousel" data-slide-to="2"></li></ol><div class="carousel-inner">';
	$i = 0;
	foreach ($homePageSliderData as $post) :
		$lernMorLink = get_field('learn-more-url', $post->ID);

		if (get_the_post_thumbnail($post->ID, 'full')) {

			$sliderImageUrl = get_the_post_thumbnail_url($post->ID, 'full');
		} else {
			$sliderImageUrl = "/artical.png";
		}
		$i++;
		$active = ($i == 1) ? "active" : "";
		$html .= '<div class="carousel-item ' . $active . '" style="min-height: 300px;">
	<img class="position-relative w-100" src="' . $sliderImageUrl . '" style="min-height: 300px; object-fit: cover;">
	<div class="carousel-caption d-flex align-items-center justify-content-center">
		<div class="p-5" style="width: 100%; max-width: 900px;">
			<h5 class="text-white text-uppercase mb-md-3">' . $post->post_title . '</h5>
			<h1 class="display-3 text-white mb-md-4">' . $post->post_excerpt . '</h1>
			<a target="_blank" href="' . $lernMorLink . '" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn
				More</a>
		</div>
	</div>
</div>';
	endforeach;
	wp_reset_query(); //Reset all privious query!

	$html .= '</div></div></div>';
	return $html;
}



/* Shortcode create for Current Affairs */
add_shortcode('current_affair', 'current_affairs');

function current_affairs()
{
	$html = "";
	$argseditorials = array(
		'post_status' => 'publish',
		'post_type' => 'editorials',
		'posts_per_page' => -1,
		'orderby' => 'ID',
		'order' => 'DESC',
	);
	$argsdailynews = array(
		'post_status' => 'publish',
		'post_type' => 'dailynews',
		'posts_per_page' => -1,
		'orderby' => 'ID',
		'order' => 'DESC',
	);

	$currentAffairargsEditorials = get_posts($argseditorials);
	$currentAffairargsargsdailynews = get_posts($argsdailynews);

	//print_r($current_affairData);

	$html .= '<div class="container-fluid py-5">
	<div class="container py-5">
		<div class="text-center mb-5">

			<h1>Current Affairs</h1>
		</div>
		<div class="row justify-content-center">
			<div class="owl-carousel testimonial-carousel1">';

	foreach ($currentAffairargsEditorials as $post) :
		$postDaate = date("M d, Y", strtotime($post->post_date));
		$permalink = get_permalink($post->ID);
		if (get_the_post_thumbnail($post->ID, 'full')) {

			$sliderImageUrl = get_the_post_thumbnail_url($post->ID, 'thumbnail');
		} else {
			$sliderImageUrl = "/artical.png";
		}
		$html .= '<div class="text-center border-affair">
				<a class="d-flex align-items-center text-decoration-none mb-3" href="' . $permalink . '">
					<img class="img-fluid rounded" width="80" src="' . $sliderImageUrl . '" alt="">
					<div class="pl-3">
						<h6 class="m-1">' . $post->post_title . '</h6>
						<small>' . $postDaate . '</small>
					</div>
				</a>
			</div>';
	endforeach;
	$html .= '</div><div class="owl-carousel testimonial-carousel1">';

	foreach ($currentAffairargsargsdailynews as $post) :
		$postDaate = date("M d, Y", strtotime($post->post_date));
		$permalink = get_permalink($post->ID);
		if (get_the_post_thumbnail($post->ID, 'full')) {

			$sliderImageUrl = get_the_post_thumbnail_url($post->ID, 'thumbnail');
		} else {
			$sliderImageUrl = "/artical.png";
		}
		$html .= '<div class="text-center border-affair">
				<a class="d-flex align-items-center text-decoration-none mb-3" href="' . $permalink . '">
					<img class="img-fluid rounded" width="80" src="' . $sliderImageUrl . '" alt="">
					<div class="pl-3">
						<h6 class="m-1">' . $post->post_title . '</h6>
						<small>' . $postDaate . '</small>
					</div>
				</a>
			</div>';
	endforeach;
	wp_reset_query(); //Reset all privious query!

	$html .= ' </div><div class="row justify-content-center mt-4">
				<a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
		</div>
	</div>
</div>';
	return $html;
}


function actualprice(int $price, int $percent_off): int
{
	$perccentPrice = ($price * $percent_off) / 100;
	$actualPrice = $price - $perccentPrice;
	return $actualPrice;
}

/* Shortcode create for Corcess */
add_shortcode('popular_corce', 'popular_corces');

function popular_corces()
{
	$html = "";
	$popularcourses = array(
		'post_status' => 'publish',
		'post_type' => 'popularcourses',
		'posts_per_page' => -1,
		'orderby' => 'ID',
		'order' => 'DESC',
	);

	$popularcourses = get_posts($popularcourses);

	//print_r($popularcourses);

	$html .= '<div class="container-fluid py-5 light-red">
	<div class="container py-5">
		<div class="text-center mb-5">
			<h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h5>
			<h1>Our Popular Courses</h1>
		</div>
		<div class="row">';

	foreach ($popularcourses as $post) :
		$price = get_field('price', $post->ID);
		$percent_off = get_field('percent_off', $post->ID);
		$actualPrice = actualprice($price, $percent_off);
		$permalink = get_permalink($post->ID);
		if (get_the_post_thumbnail($post->ID, 'full')) {
			$imageUrl = get_the_post_thumbnail_url($post->ID, 'thumbnail');
		} else {
			$imageUrl = "/artical.png";
		}
		$html .= '<div class="col-lg-4 col-md-6 mb-4">
				<div class="rounded overflow-hidden mb-2">
					<img class="img-fluid" src="' . $imageUrl . '" alt="">
					<div class="bg-secondary p-4">
						<a class="h5" href="' . $permalink . '">' . $post->post_title . '</a>
						<div class="border-top mt-4 pt-4">
							<div class="d-flex justify-content-between">
								<h6 class="m-0">₹' . $actualPrice . ' <small><strike>' . $price . '</strike></small></h6>
								<h5 class="m-0">' . $percent_off . '% off</h5>
							</div>
						</div>
					</div>
				</div>
			</div>';
	endforeach;

	wp_reset_query(); //Reset all privious query!

	$html .= '</div>
	</div>
</div>';
	return $html;
}


/* Shortcode create for ourvideo */
add_shortcode('ourvideo', 'ourvideos');

function ourvideos()
{
	$html = "";
	$args = array(
		'post_status' => 'publish',
		'post_type' => 'ourvideo',
		'posts_per_page' => 4,
		'orderby' => 'ID',
		'order' => 'DESC',
		//'category' => 20
	);

	$ourvideo = get_posts($args);
	foreach ($ourvideo as $post) :
		$you_tube_link = get_field('you_tube_link', $post->ID);
		if (get_the_post_thumbnail($post->ID, 'full')) {
			$imageUrl = get_the_post_thumbnail_url($post->ID, 'thumbnail');
		} else {
			$imageUrl = "/artical.png";
		}

		$html .= '<div class="col-lg-6 mb-4">
	<div class="blog-item position-relative overflow-hidden rounded mb-2">
		<img class="img-fluid" src="' . $imageUrl . '" alt="">
		<a target="_blank" href="' . $you_tube_link . '" class="popup-youtube light video-play-button item-center">
			<i class="fa fa-play" aria-hidden="true"></i>
		</a>

	</div>
</div>';
	endforeach;
	wp_reset_query(); //Reset all privious query!
	return $html;
}


function remove_menus()
{
	// get current login user's role
	$roles = wp_get_current_user()->roles;
	//print_r($roles); die; //administrator
	// test role
	if (in_array('example_role', $roles)) {
		$role = get_role('example_role');
		$role->add_cap('manage_toper', true);
		$role->add_cap('edit_theme_options', true);
		$role->add_cap('edit_posts', true);
		$role->add_cap('edit_private_pages', true);
		$role->add_cap('edit_private_posts', true);
		$role->add_cap('edit_published_pages', true);
		$role->add_cap('edit_published_posts', true);
		$role->add_cap('publish_posts', true);
		$role->add_cap('publish_pages', true);
		$role->add_cap('edit_others_pages', true);
		$role->add_cap('edit_others_posts', true);
		$role->add_cap('delete_others_pages', true);
		$role->add_cap('delete_pages', true);
		$role->add_cap('delete_posts', true);
		$role->add_cap('delete_others_posts', true);
		$role->add_cap('delete_published_pages', true);
		$role->add_cap('delete_published_posts', true);
		$role->add_cap('delete_private_posts', true);
		$role->add_cap('delete_private_pages', true);
		//remove menu from site backend.
		// remove_menu_page( 'index.php' ); //Dashboard
		// //remove_menu_page( 'edit.php' ); //Posts
		// //remove_menu_page( 'upload.php' ); //Media
		// //remove_menu_page( 'edit.php?post_type=page' ); //Pages
		// //remove_menu_page( 'plugins.php' ); //Plugins
		// remove_menu_page( 'edit-comments.php' ); //Comments
		remove_menu_page('tools.php'); //Tools
		// remove_menu_page( 'options-general.php' ); //Settings
		remove_submenu_page('themes.php', 'themes.php');
		remove_submenu_page('themes.php', 'customize.php');

		remove_menu_page('wpcf7'); // contact form 7 menu
	} else if (in_array('administrator', $roles)) {
		$role = get_role('administrator');
		$role->add_cap('edit_theme_options', true);
		$role->add_cap('manage_toper', true);
		//remove_menu_page( 'themes.php' ); //Appearance
		// remove_menu_page( 'users.php' ); //Users
	}
}
add_action('admin_menu', 'remove_menus', 100);

function example_admin_bar_remove_logo()
{
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action(
	'wp_before_admin_bar_render',
	'example_admin_bar_remove_logo',
	0
);


function wpeagles_example_role()
{
	add_role(
		'example_role',
		'example Role',
		[
			// list of capabilities for this role
			'read' => true,
			'edit_posts' => true,
			'upload_files' => true,
			'manage_toper' => true,
		]
	);
}

// add the example_role
add_action('init', 'wpeagles_example_role');
