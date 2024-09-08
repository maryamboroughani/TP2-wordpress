<?php


/**
 * Enqueue child theme styles.
 */
function enqueue_custom_styles() {
    // Enqueue the main stylesheet which imports all other styles
    wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

/**
 * Remove editor from pages.
 */
function ttoc_supprime_editeur_page() {
    remove_post_type_support('page', 'editor');
}
add_action('init', 'ttoc_supprime_editeur_page', 15);

//registering a custom post type
register_post_type('article', array(
    'labels' => array(
        'name' => __('Articles'),
        'singular_name' => __('Article')
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'rewrite' => array('slug' => 'articles'),
));





