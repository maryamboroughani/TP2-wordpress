<?php get_header(); ?>

<?php
// Fetch ACF fields for the 'Accueil' page
$background_image = get_field('accueil_image'); // Image field
$default_image = get_field('image_par_defaut'); // Default image
$slogan = get_field('accueil_slogan'); // Slogan field
$introduction = get_field('accueil_introduction'); // Introduction field

// Determine which background image to use
if ( $background_image ) {
    $bg_image_url = $background_image['url'];
} elseif ( $default_image ) {
    $bg_image_url = $default_image['url'];
} else {
    $bg_image_url = get_template_directory_uri() . '/images/le-creuset-bg-par-defaut.jpg'; // Default image path
}
?>

<!-- Accueil Hero Section -->
<section class="hero" style="background-image: url('<?php echo esc_url( $bg_image_url ); ?>'); height: 60vh; display: flex; align-items: center; justify-content: center;">
    <div class="slogan">
        <h1><?php echo esc_html( $slogan ); ?></h1>
    </div>
</section>

<!-- Accueil Introduction Section -->
<section class="introduction">
    <div class="container">
        <p><?php echo esc_html( $introduction ); ?></p>
    </div>


<?php get_footer(); ?>
