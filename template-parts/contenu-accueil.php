<?php
$slogan = get_field('slogan');
$image_bg = get_field('image_bg');
$introduction = get_field('introduction');

$bg_image_url = $image_bg ? $image_bg['url'] : get_template_directory_uri() . '/images/le-creuset-bg-par-defaut.jpg';
?>

<div class="hero-section" style="background-image: url('<?php echo esc_url($bg_image_url); ?>'); height: 60vh; display: flex; align-items: center; justify-content: center; text-align: center;">
    <h1><?php echo esc_html($slogan); ?></h1>
</div>

<div class="introduction">
    <p><?php echo esc_html($introduction); ?></p>
</div>

<div class="articles-grid">
    <?php
    $categories = get_terms(array(
        'taxonomy' => 'categorie',
        'hide_empty' => false,
    ));

    foreach ($categories as $category) {
        echo '<h2>' . esc_html($category->name) . '</h2>';

        $args = array(
            'post_type' => 'article',
            'posts_per_page' => 4,
            'meta_key' => 'actif',
            'meta_value' => '1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'slug',
                    'terms' => $category->slug,
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
                        <p><?php echo esc_html($category->name); ?></p>
                        <p><?php echo esc_html(get_field('description')); ?></p>
                        <p><?php echo esc_html($price); ?> €</p>
                    </a>
                </div>
                <?php
            }
            echo '</div>';
        }
        wp_reset_postdata();
    }
    ?>
</div>
