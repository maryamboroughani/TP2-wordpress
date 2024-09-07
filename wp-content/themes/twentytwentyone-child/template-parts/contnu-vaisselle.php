<?php
// Fetch ACF fields for the 'Vaisselle' page
$background_image = get_field('vaisselle_image'); // Image field
$default_image = get_field('image_par_defaut'); // Default image
$introduction = get_field('vaisselle_introduction'); // Correct field name for Introduction

// Determine which background image to use
if ( $background_image ) {
    $bg_image_url = $background_image['url'];
} elseif ( $default_image ) {
    $bg_image_url = $default_image['url'];
} else {
    $bg_image_url = get_template_directory_uri() . '/images/le-creuset-bg-par-defaut.jpg'; // Default image path
}
?>

<!-- Vaisselle Hero Section -->
<section class="hero" style="background-image: url('<?php echo esc_url( $bg_image_url ); ?>'); height: 40vh; display: flex; align-items: center; justify-content: center;">
    <div class="introduction">
        <p><?php echo esc_html( $introduction ); ?></p>
    </div>
</section>

<!-- Vaisselle Content Section -->
<section class="content">
    <?php
    // Query for articles in the 'Vaisselle' category
    $args = array(
        'post_type' => 'article',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key'     => 'article_categorie',
                'value'   => 'Vaisselle',
                'compare' => '='
            ),
            array(
                'key'     => 'article_actif',
                'value'   => true,
                'compare' => '='
            ),
        ),
        'orderby' => 'menu_order',
        'order'   => 'ASC',
    );
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
        echo '<div class="tiles">';
        while ( $query->have_posts() ) : $query->the_post();
            get_template_part('template-parts/tuile'); // Ensure this file is set up to display article details
        endwhile;
        echo '</div>';
        wp_reset_postdata();
    else :
        echo '<p>No articles found.</p>';
    endif;
    ?>
</section>
