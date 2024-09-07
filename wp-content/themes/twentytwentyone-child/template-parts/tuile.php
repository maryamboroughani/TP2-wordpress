<?php
// Get ACF fields for the current post
$champs = get_fields();
$article_image = $champs['article_image']['url'];
?>

<article class="tuile">
    <a href="<?php the_permalink(); ?>">
        <?php if ( $article_image ) : ?>
            <picture>
                <img src="<?php echo esc_url( $article_image ); ?>" alt="<?php the_title(); ?>">
            </picture>
        <?php endif; ?>
        <h3><?php the_title(); ?></h3>
    </a>
</article>
