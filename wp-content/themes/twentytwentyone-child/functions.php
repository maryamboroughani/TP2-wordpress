<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Modify locale stylesheet URI
 */
if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

/**
 * Enqueue child theme stylesheet
 */
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'twenty-twenty-one-custom-color-overrides', 'twenty-twenty-one-style', 'twenty-twenty-one-print-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

/**
 * Remove editor from pages
 */
function ttoc_supprime_editeur_page() {
    remove_post_type_support( 'page', 'editor' );
}
add_action( 'init', 'ttoc_supprime_editeur_page', 15 );

/**
 * Create custom post type 'article'
 */
function create_custom_post_type() {
    register_post_type('article',
        array(
            'labels' => array(
                'name' => __('Articles'),
                'singular_name' => __('Article')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'articles'), // Optional: Custom slug
        )
    );
}
add_action('init', 'create_custom_post_type');
?>
