<?php
get_header();

$introduction = get_field( 'page_introduction' ); // ACF for page introduction
$bg_img = get_field( 'page_image_bg' ); // ACF for page background image

// Default image if none is set
if( empty ( $bg_img ) ){
	$bg_img = wp_get_attachment_url( 70 ); // ID 70 is an example default image
}
?>

<?php
while ( have_posts() ) :
	the_post();

	switch ( $post->post_title ) :

		case 'À Propos': // Custom page content
			$propos_content = get_field( 'propos_editeur' );
			if ( $propos_content ) : ?>
				<div class="wysiwyg wrapper"><?php echo wp_kses_post( $propos_content ); ?></div>
			<?php endif;
			break;
		
		default: // Default page layout
			?>
			<div class="bg_grispale">
				<div id="banniere_page" style="background-image: url(<?php echo esc_url( $bg_img ); ?>)" class="banniere banniere_page">
					<div class="wrapper_etroit">
						<p><?php echo esc_html( $introduction ); ?></p>
					</div>
				</div>
				<?php get_template_part( 'template-parts/grille-article' ); // Display articles grid ?>
			</div>
			<?php
	endswitch;

endwhile;
get_footer();


get_footer();
?>
