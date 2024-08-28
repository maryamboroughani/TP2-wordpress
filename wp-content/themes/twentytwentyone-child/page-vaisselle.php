<?php
/* Template Name: Vaisselle */
get_header();
?>
<div class="hero">
    <?php if (have_rows('acf_vaisselle')): while (have_rows('acf_vaisselle')): the_row(); ?>
        <div class="introduction"><?php the_sub_field('introduction'); ?></div>
        <img src="<?php the_sub_field('image_bg'); ?>" alt="Image de fond">
    <?php endwhile; endif; ?>
</div>
<!-- Afficher tous les articles actifs de la catégorie Vaisselle -->
<?php get_footer(); ?>
