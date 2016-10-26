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

            /*
            $custom_fields = get_fields();
            $flexible_fields = $custom_fields["acf_modules"];

            $acf_modules = array();
            foreach( $flexible_fields as $flexible_field ) {
                $acf_modules[] = $flexible_field['acf_fc_layout'];
            }
            */

            // If present, display the modules
            while ( has_sub_field( 'acf_modules' ) ) :

                if ( get_row_layout() == 'page_anchors' ) {
                    echo "<div class='module'>";

                    if ( have_rows( 'menu' ) ) :
                        while( have_rows('menu') ) : the_row(); ?>
                            <a class="page-anchor" href="<?php the_sub_field( 'url' ); ?>"><?php the_sub_field( 'label' ); ?></a>
                        <?php
                        endwhile;
                    endif;

                    echo "</div>";
                }

                if (get_row_layout() == 'single_left_image_with_text' ) : ?>

					<div class='module'>
						<h2><?php the_sub_field( 'text' ); ?></h2>
						<img src="<?php the_sub_field('image'); ?>" />
						<p><?php the_sub_field( 'description' ); ?></p>
						<span><a href="<?php the_sub_field( 'cta_url' ); ?>"><?php the_sub_field( 'cta_label' ); ?></a></span>
                    </div>

					<?php
                endif;

            endwhile;

            /*
            $custom_fields = get_fields();
            $acf_modules = $custom_fields["acf_modules"];

            //var_dump($acf_modules);

            foreach( $acf_modules as $acf_module ) {
                echo $acf_module["acf_fc_layout"] . "<br />";
            }
            */
            /*
            while ( has_sub_field( 'acf_modules' ) ) {

                if( get_row_layout() == 'page_anchors' ) {
                }
                if( get_row_layout() == 'test' ) {
                    echo "<div class='module'>" . get_row_index() ."</div>";
                }
        ?>

        <?php }*/ // End while

		else :
			echo "0";
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
