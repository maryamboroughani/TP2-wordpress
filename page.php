<?php
get_header();

$page_title = get_the_title();

if ($page_title === 'Vaisselle') {
    get_template_part('template-parts/contenu', 'vaisselle');
} elseif ($page_title === 'Service') {
    get_template_part('template-parts/contenu', 'service');
} elseif ($page_title === 'À propos') {
    get_template_part('template-parts/contenu', 'apropos');
} else {
    // Default content or a message if no template part is found
    ?>
    <div class="wrapper">
        <?php the_content(); ?>
    </div>
    <?php
}

get_footer();
?>
