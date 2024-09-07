<div class="tuile">
    <a href="<?php the_permalink(); ?>" class="tuile-link">
        <div class="tuile-image">
            <?php
            // Display the article's image
            $image = get_field('article_image'); // Ensure this matches your ACF field name
            if ($image) {
                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr(get_the_title()) . '">';
            } else {
                // Optional: Provide a fallback image or message
                echo '<img src="' . esc_url(get_template_directory_uri() . '/images/default-image.jpg') . '" alt="Default image">';
            }
            ?>
        </div>
        <div class="tuile-content">
            <h3 class="tuile-title"><?php the_title(); ?></h3>
            <p class="tuile-categorie"><?php the_field('article_categorie'); // Ensure this matches your ACF field name ?></p>
            <p class="tuile-prix"><?php the_field('article_prix'); ?> €</p>
        </div>
    </a>
</div>
