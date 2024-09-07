<?php
// Récupérer le champ WYSIWYG ACF de la page "À propos"
$editor_content = get_field('editeur');

?>

<div class="apropos-content wysiwyg">
    <?php
    // Afficher le contenu de l'éditeur WYSIWYG
    echo $editor_content;
    ?>
</div>
