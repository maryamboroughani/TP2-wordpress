<?php
/* Template Name: Accueil */
get_header();
?>
<div class="hero">
    <?php if (have_rows('acf_accueil')): while (have_rows('acf_accueil')): the_row(); ?>
        <div class="slogan"><?php the_sub_field('slogan'); ?></div>
        <img src="<?php the_sub_field('image_bg'); ?>" alt="Image de fond">
        <div class="introduction"><?php the_sub_field('introduction'); ?></div>
        <!-- Afficher la grille des articles -->
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
