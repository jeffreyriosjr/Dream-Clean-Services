<?php
/**
 * Handyman Cleaning Service functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Handyman Cleaning Service
 */

if ( ! defined( 'SMART_CLEANING_URL' ) ) {
    define( 'SMART_CLEANING_URL', esc_url( 'https://www.themagnifico.net/themes/window-cleaning-wordpress-theme/', 'handyman-cleaning-service') );
}
if ( ! defined( 'SMART_CLEANING_TEXT' ) ) {
    define( 'SMART_CLEANING_TEXT', __( 'Handyman Cleaning Pro','handyman-cleaning-service' ));
}
if ( ! defined( 'SMART_CLEANING_CONTACT_SUPPORT' ) ) {
define('SMART_CLEANING_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/handyman-cleaning-service','handyman-cleaning-service'));
}
if ( ! defined( 'SMART_CLEANING_REVIEW' ) ) {
define('SMART_CLEANING_REVIEW',__('https://wordpress.org/support/theme/handyman-cleaning-service/reviews/#new-post','handyman-cleaning-service'));
}
if ( ! defined( 'SMART_CLEANING_LIVE_DEMO' ) ) {
define('SMART_CLEANING_LIVE_DEMO',__('https://www.themagnifico.net/demo/handyman-cleaning-service/','handyman-cleaning-service'));
}
if ( ! defined( 'SMART_CLEANING_GET_PREMIUM_PRO' ) ) {
define('SMART_CLEANING_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/window-cleaning-wordpress-theme/','handyman-cleaning-service'));
}
if ( ! defined( 'SMART_CLEANING_PRO_DOC' ) ) {
define('SMART_CLEANING_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/handyman-cleaning-service-pro-doc/','handyman-cleaning-service'));
}

function handyman_cleaning_service_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()) . '/assets/css/bootstrap.css');
    $handyman_cleaning_service_parentcss = 'smart-cleaning-style';
    $handyman_cleaning_service_theme = wp_get_theme(); wp_enqueue_style( $handyman_cleaning_service_parentcss, get_template_directory_uri() . '/style.css', array(), $handyman_cleaning_service_theme->parent()->get('Version'));
    wp_enqueue_style( 'handyman-cleaning-service-style', get_stylesheet_uri(), array( $handyman_cleaning_service_parentcss ), $handyman_cleaning_service_theme->get('Version'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'handyman_cleaning_service_enqueue_styles' );

function handyman_cleaning_service_customize_register($wp_customize){

    //What we do Section
    $wp_customize->add_section('handyman_cleaning_service_serivces',array(
        'title' => esc_html__('What we do Section','handyman-cleaning-service'),
        'description' => esc_html__('Here you have to select category which will display perticular latest blogs in the home page.','handyman-cleaning-service'),
        'priority' => 5,
    ));

    $wp_customize->add_setting('handyman_cleaning_service_services_category_title', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('handyman_cleaning_service_services_category_title', array(
        'label' => __('Section Title', 'handyman-cleaning-service'),
        'section' => 'handyman_cleaning_service_serivces',
        'priority' => 1,
        'type' => 'text',
    ));

    $handyman_cleaning_service_categories = get_categories();
    $handyman_cleaning_service_cat_post = array();
    $handyman_cleaning_service_cat_post[]= 'select';
    $i = 0;
    foreach($handyman_cleaning_service_categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $handyman_cleaning_service_cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('handyman_cleaning_service_menu_items',array(
        'default'   => 'select',
        'sanitize_callback' => 'handyman_cleaning_service_sanitize_select',
    ));
    $wp_customize->add_control('handyman_cleaning_service_menu_items',array(
        'type'    => 'select',
        'choices' => $handyman_cleaning_service_cat_post,
        'label' => __('Select Category to display Services','handyman-cleaning-service'),
        'section' => 'handyman_cleaning_service_serivces',
    ));
}
add_action('customize_register', 'handyman_cleaning_service_customize_register');

function handyman_cleaning_service_admin_scripts() {
    // demo CSS
    wp_enqueue_style( 'handyman-cleaning-service-demo-css', get_theme_file_uri( 'assets/css/demo.css' ) );
}
add_action( 'admin_enqueue_scripts', 'handyman_cleaning_service_admin_scripts' );

if ( ! function_exists( 'handyman_cleaning_service_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function handyman_cleaning_service_setup() {

        add_theme_support( 'responsive-embeds' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size('handyman-cleaning-service-featured-header-image', 2000, 660, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'smart_cleaning_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 50,
            'flex-width'  => true,
        ) );

        add_editor_style( array( '/editor-style.css' ) );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'handyman_cleaning_service_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function handyman_cleaning_service_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'handyman-cleaning-service' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'handyman-cleaning-service' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'handyman_cleaning_service_widgets_init' );

function handyman_cleaning_service_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'smart_cleaning_color_option' );
    $wp_customize->remove_section( 'smart_cleaning_general_settings' );

    $wp_customize->remove_setting( 'smart_cleaning_topbar_text1' );
    $wp_customize->remove_control( 'smart_cleaning_topbar_text1' );

    $wp_customize->remove_setting( 'smart_cleaning_topbar_link1' );
    $wp_customize->remove_control( 'smart_cleaning_topbar_link1' );

    $wp_customize->remove_setting( 'smart_cleaning_topbar_text2' );
    $wp_customize->remove_control( 'smart_cleaning_topbar_text2' );

    $wp_customize->remove_setting( 'smart_cleaning_topbar_link2' );
    $wp_customize->remove_control( 'smart_cleaning_topbar_link2' );

    $wp_customize->remove_setting( 'smart_cleaning_topbar_text3' );
    $wp_customize->remove_control( 'smart_cleaning_topbar_text3' );

    $wp_customize->remove_setting( 'smart_cleaning_topbar_link3' );
    $wp_customize->remove_control( 'smart_cleaning_topbar_link3' );

    $wp_customize->remove_setting( 'smart_cleaning_slide_day' );
    $wp_customize->remove_control( 'smart_cleaning_slide_day' );

    $wp_customize->remove_setting( 'smart_cleaning_slide_time' );
    $wp_customize->remove_control( 'smart_cleaning_slide_time' );
}
add_action( 'customize_register', 'handyman_cleaning_service_remove_customize_register', 11 );

function handyman_cleaning_service_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
