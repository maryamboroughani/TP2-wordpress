<?php
get_header();
?>

<div class="wrapper">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <div class="article-single">
            <?php
            $image = get_field('image');
            $price = get_field('prix');
            $category = get_the_terms(get_the_ID(), 'categorie');
            ?>
            <h1><?php the_title(); ?></h1>
            <?php if ($image): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>
            <p>Catégorie: <?php echo esc_html($category[0]->name); ?></p>
            <p>Description: <?php echo esc_html(get_field('description')); ?></p>
            <p>Prix: <?php echo esc_html($price); ?> €</p>
        </div>
    <?php endwhile; ?>
</div>

<?php
get_footer();
?>
