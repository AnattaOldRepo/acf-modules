<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">

		<?php

		// Check if ACF Modules are present.
		if ( get_field( 'acf_modules' ) ) :

            // If present, display the modules
            while ( has_sub_field( 'acf_modules' ) ) :

				if ( get_row_layout() == 'single_left_image_with_text' ) : ?>

					<div class='module'>

						<?php if ( get_sub_field( 'text' ) ): ?>

							<h2><?php the_sub_field( 'text' ); ?></h2>

						<?php endif; ?>

						<?php if ( get_sub_field( 'image' ) ): ?>

							<img src="<?php the_sub_field('image'); ?>" />

						<?php endif; ?>

						<?php if ( get_sub_field( 'description' ) ): ?>

							<p><?php the_sub_field( 'description' ); ?></p>

						<?php endif; ?>

						<?php if ( get_sub_field( 'cta_url' ) && get_sub_field( 'cta_label' ) ): ?>

							<span><a href="<?php the_sub_field( 'cta_url' ); ?>"><?php the_sub_field( 'cta_label' ); ?></a></span>

						<?php endif; ?>

					</div>

					<?php
				endif;

                if ( get_row_layout() == 'page_anchors' ) {

                    if ( have_rows( 'menu' ) ) :
						echo "<div class='module'>";

						while( have_rows('menu') ) : the_row();

							if ( get_sub_field( 'url' ) && get_sub_field( 'label' ) ) : ?>
								<a class="page-anchor" href="<?php the_sub_field( 'url' ); ?>"><?php the_sub_field( 'label' ); ?></a>
							<?php
							endif;

						endwhile;

						echo "</div>";
					endif;

                }

            endwhile;

		endif;

		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

</article><!-- #post-## -->