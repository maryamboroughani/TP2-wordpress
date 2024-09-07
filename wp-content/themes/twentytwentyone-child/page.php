<?php
get_header();

// Get the page title and sanitize it
$page_title = esc_html(get_the_title());

// Check for specific page titles and include the corresponding template part
if ($page_title === 'Vaisselle') {
    get_template_part('template-parts/contenu', 'vaisselle');
} elseif ($page_title === 'Service') {
    get_template_part('template-parts/contenu', 'service');
} elseif ($page_title === 'À propos') {
    get_template_part('template-parts/contenu', 'apropos');
} else {
   
    ?>
    <div class="wrapper">
        <?php
        // Display the page content
        the_content();
        ?>
    </div>
    <?php
}

get_footer();
?>
