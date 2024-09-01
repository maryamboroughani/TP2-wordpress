<?php
// Check if the current page is "Vaisselle"
if (is_page('vaisselle')) {
    // Récupérer les champs ACF pour l'introduction et l'image de fond de la page "Vaisselle"
    $introduction = get_field('introduction');
    $image_bg = get_field('image_bg');
    
    // Définir une image de fond par défaut si aucune image n'est définie
    $bg_image_url = $image_bg ? $image_bg['url'] : get_template_directory_uri() . '/images/le-creuset-bg-par-defaut.jpg';
    ?>

    <!-- Section Héros avec l'introduction et l'image de fond -->
    <div class="hero-section" style="background-image: url('<?php echo esc_url($bg_image_url); ?>'); height: 40vh; display: flex; align-items: flex-start; justify-content: center; text-align: left;">
        <h1><?php echo esc_html($introduction); ?></h1>
    </div>

    <!-- Grille des articles pour la catégorie "Vaisselle" -->
    <div class="articles-grid">
        <?php
        // Requête pour récupérer tous les articles actifs de la catégorie "Vaisselle"
        $args = array(
            'post_type' => 'article',
            'posts_per_page' => -1, // Récupère tous les articles
            'meta_key' => 'actif',
            'meta_value' => '1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'slug',
                    'terms' => 'vaisselle', // Spécifique à la catégorie "Vaisselle"
                ),
            ),
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<div class="category-grid">';
            while ($query->have_posts()) {
                $query->the_post();
                $image = get_field('image');
                $price = get_field('prix');
                ?>
                <div class="article-tile">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo esc_html(get_field('description')); ?></p>
                        <p><?php echo esc_html($price); ?> €</p>
                    </a>
                </div>
                <?php
            }
            echo '</div>';
        } else {
            echo '<p>Aucun article actif trouvé pour la catégorie "Vaisselle".</p>';
        }
        wp_reset_postdata();
        ?>
    </div>
<?php
}
?>
