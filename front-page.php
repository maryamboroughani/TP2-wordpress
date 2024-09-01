<?php
/**
 * Template Name: Page d’Accueil
 *
 * Ce template est utilisé pour afficher la page d’accueil.
 */

get_header();
?>

<div class="wrapper">
    <?php get_template_part('template-parts/contenu', 'accueil'); ?>
</div>

<?php
get_footer();
?>
