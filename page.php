<?php get_header(); ?>

<?php
// Fetch ACF fields for the current page
$introduction = get_field('introduction');
$editeur = get_field('editeur');

// Check the current page title to determine which template to use
if ($post->post_title == 'Vaisselle' || $post->post_title == 'Service') :
    ?>
        <div class="container">
            <!-- Only display content, not the title -->
            <p><?php echo esc_html($introduction); ?></p>
        </div>
    </div>

    <div class="articles-grid">
        <?php
        // Set the category based on the page title
        $category = ($post->post_title == 'Vaisselle') ? 'vaisselle' : 'service';

        // Query to fetch active articles within the specified category
        $args = array(
            'post_type' => 'article',
            'meta_key'  => 'article_actif',  
            'meta_value' => '1',  
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => $category,
                ),
            ),
            'posts_per_page' => -1, // Show all articles
        );
        $query = new WP_Query($args);

        // Display articles if found
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('template-parts/tuile'); 
            endwhile;
           
       
        endif;
        ?>
    </div>

    <!-- Include the article content section -->
    <section class="wrapper">
        <?php get_template_part('template-parts/contenu-article'); ?>
    </section>

<?php
// Template for 'À propos' page
elseif ($post->post_title == 'À propos') :
    ?>
    <div class="wysiwyg">
        <?php echo $editeur; ?>
    </div>

<?php
// Default template for other pages
else :
    ?>
    <div class="default-page">
        <div class="container">
            <!-- Display title conditionally -->
            <?php if ($post->post_title != 'Vaisselle' && $post->post_title != 'Service') : ?>
                <h1><?php the_title(); ?></h1>
            <?php endif; ?>
            <?php the_content(); ?>
        </div>
    </div>
<?php
endif;

get_footer();
