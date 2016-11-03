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

                if ( get_row_layout() == 'three_wide_top_images' ) : ?>

                    <div class="module">

                        <?php

                        if ( get_sub_field( 'section_title' ) ) :

                            ?>

                            <h2><?php the_sub_field( 'section_title' ); ?></h2>

                            <?php

                        endif;

                        // Section 1

                        if ( get_sub_field( 'st_one_image' ) || get_sub_field( 'st_one_small_title' ) ||
                            get_sub_field( 'st_one_main_title' ) ||  get_sub_field( 'st_one_description' ) ) :

                            ?>

                            <div class="module-section">

                                <?php

                                if ( get_sub_field( 'st_one_image' ) ) :

                                    ?>

                                    <img src='<?php the_sub_field( 'st_one_image' ); ?>' />

                                    <?php

                                endif;

                                if ( get_sub_field( 'st_one_small_title' ) ) :

                                    ?>

                                    <h6><?php the_sub_field( 'st_one_small_title' ); ?></h6>

                                    <?php

                                endif;

                                if ( get_sub_field( 'st_one_main_title' ) ) :

                                    ?>

                                    <h4><?php the_sub_field( 'st_one_main_title' ); ?></h4>

                                    <?php

                                endif;

                                if ( get_sub_field( 'st_one_description' ) ) :

                                    ?>

                                    <p><?php the_sub_field( 'st_one_description' ); ?></p>

                                    <?php

                                endif;

                                ?>

                            </div> <!-- .module-section-->

                            <?php

                        endif;

                        // Section 2

                        if ( get_sub_field( 'st_two_image' ) || get_sub_field( 'st_two_small_title' ) ||
                            get_sub_field( 'st_two_main_title' ) ||  get_sub_field( 'st_two_description' ) ) :

                            ?>

                            <div class="module-section">

                                <?php

                                if ( get_sub_field( 'st_two_image' ) ) :

                                    ?>

                                    <img src='<?php the_sub_field( 'st_two_image' ); ?>' />

                                    <?php

                                endif;

                                if ( get_sub_field( 'st_two_small_title' ) ) :

                                    ?>

                                    <h6><?php the_sub_field( 'st_two_small_title' ); ?></h6>

                                    <?php

                                endif;

                                if ( get_sub_field( 'st_two_main_title' ) ) :

                                    ?>

                                    <h4><?php the_sub_field( 'st_two_main_title' ); ?></h4>

                                    <?php

                                endif;

                                if ( get_sub_field( 'st_two_description' ) ) :

                                    ?>

                                    <p><?php the_sub_field( 'st_two_description' ); ?></p>

                                    <?php

                                endif;

                                ?>

                            </div> <!-- .module-section-->

                            <?php

                        endif;

                        // Section 3

                        if ( get_sub_field( 'st_three_image' ) || get_sub_field( 'st_three_small_title' ) ||
                            get_sub_field( 'st_three_main_title' ) ||  get_sub_field( 'st_three_description' ) ) :

                            ?>

                            <div class="module-section">

                                <?php

                                if ( get_sub_field( 'st_three_image' ) ) :

                                    ?>

                                    <img src='<?php the_sub_field( 'st_three_image' ); ?>' />

                                    <?php

                                endif;

                                if ( get_sub_field( 'st_three_small_title' ) ) :

                                    ?>

                                    <h6><?php the_sub_field( 'st_three_small_title' ); ?></h6>

                                    <?php

                                endif;

                                if ( get_sub_field( 'st_three_main_title' ) ) :

                                    ?>

                                    <h4><?php the_sub_field( 'st_three_main_title' ); ?></h4>

                                    <?php

                                endif;

                                if ( get_sub_field( 'st_three_description' ) ) :

                                    ?>

                                    <p><?php the_sub_field( 'st_three_description' ); ?></p>

                                    <?php

                                endif;

                                ?>

                            </div> <!-- .module-section-->

                            <?php

                        endif;

                        ?>

                        <div class="clear"></div>

                    </div> <!-- .module -->

                    <?php

                endif;

                if ( get_row_layout() == 'four_section_titles' ) : ?>

                    <div class="module">

                        <?php

                        if ( get_sub_field( 'txt_four_section_heading' ) ) :

                            ?>

                            <h2><?php the_sub_field( 'txt_four_section_heading' ); ?></h2>

                            <?php

                        endif;


                        // Section 1
                        $fields = array( "img_sec_one_image", "txt_sec_one_main_title", "txt_sec_one_small_title", "txa_sec_one_description", "txt_sec_one_cta_label", "url_sec_one_cta_url" );

                        if ( is_acf_field_exists( $fields ) ) : ?>

                            <div class="module-section">

                                <?php

                                if ( get_sub_field( 'img_sec_one_image' ) ) :

                                    ?>

                                    <img src='<?php the_sub_field( 'img_sec_one_image' ); ?>' />

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_one_small_title' ) ) :

                                    ?>

                                    <h6><?php the_sub_field( 'txt_sec_one_small_title' ); ?></h6>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_one_main_title' ) ) :

                                    ?>

                                    <h4><?php the_sub_field( 'txt_sec_one_main_title' ); ?></h4>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txa_sec_one_description' ) ) :

                                    ?>

                                    <p><?php the_sub_field( 'txa_sec_one_description' ); ?></p>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_one_cta_label' ) && get_sub_field( 'url_sec_one_cta_url' ) ) :

                                    ?>

                                    <a href='<?php the_sub_field( 'url_sec_one_cta_url' ); ?>'><?php the_sub_field( 'txt_sec_one_cta_label' ); ?></a>

                                    <?php

                                endif;

                                ?>

                            </div> <!-- .module-section -->

                            <?php

                        endif;

                        ?>

                        <?php

                        // Section 2
                        $fields = array( "img_sec_two_image", "txt_sec_two_main_title", "txt_sec_two_small_title", "txa_sec_two_description", "txt_sec_two_cta_label", "url_sec_two_cta_url" );

                        if ( is_acf_field_exists( $fields ) ) : ?>

                            <div class="module-section">

                                <?php

                                if ( get_sub_field( 'img_sec_two_image' ) ) :

                                    ?>

                                    <img src='<?php the_sub_field( 'img_sec_two_image' ); ?>' />

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_two_small_title' ) ) :

                                    ?>

                                    <h6><?php the_sub_field( 'txt_sec_two_small_title' ); ?></h6>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_two_main_title' ) ) :

                                    ?>

                                    <h4><?php the_sub_field( 'txt_sec_two_main_title' ); ?></h4>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txa_sec_two_description' ) ) :

                                    ?>

                                    <p><?php the_sub_field( 'txa_sec_two_description' ); ?></p>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_two_cta_label' ) && get_sub_field( 'url_sec_two_cta_url' ) ) :

                                    ?>

                                    <a href='<?php the_sub_field( 'url_sec_two_cta_url' ); ?>'><?php the_sub_field( 'txt_sec_two_cta_label' ); ?></a>

                                    <?php

                                endif;

                                ?>

                            </div> <!-- .module-section -->

                            <?php

                        endif;

                        ?>

                        <?php

                        // Section 3
                        $fields = array( "img_sec_three_image", "txt_sec_three_main_title", "txt_sec_three_small_title", "txa_sec_three_description", "txt_sec_three_cta_label", "url_sec_three_cta_url" );

                        if ( is_acf_field_exists( $fields ) ) : ?>

                            <div class="module-section">

                                <?php

                                if ( get_sub_field( 'img_sec_three_image' ) ) :

                                    ?>

                                    <img src='<?php the_sub_field( 'img_sec_three_image' ); ?>' />

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_three_small_title' ) ) :

                                    ?>

                                    <h6><?php the_sub_field( 'txt_sec_three_small_title' ); ?></h6>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_three_main_title' ) ) :

                                    ?>

                                    <h4><?php the_sub_field( 'txt_sec_three_main_title' ); ?></h4>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txa_sec_three_description' ) ) :

                                    ?>

                                    <p><?php the_sub_field( 'txa_sec_three_description' ); ?></p>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_three_cta_label' ) && get_sub_field( 'url_sec_three_cta_url' ) ) :

                                    ?>

                                    <a href='<?php the_sub_field( 'url_sec_three_cta_url' ); ?>'><?php the_sub_field( 'txt_sec_three_cta_label' ); ?></a>

                                    <?php

                                endif;

                                ?>

                            </div> <!-- .module-section -->

                            <?php

                        endif;

                        ?>

                        <?php
                        // Section 4
                        $fields = array( "img_sec_four_image", "txt_sec_four_main_title", "txt_sec_four_small_title", "txa_sec_four_description", "txt_sec_four_cta_label", "url_sec_four_cta_url" );

                        if ( is_acf_field_exists( $fields ) ) : ?>

                            <div class="module-section">

                                <?php

                                if ( get_sub_field( 'img_sec_four_image' ) ) :

                                    ?>

                                    <img src='<?php the_sub_field( 'img_sec_four_image' ); ?>' />

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_four_small_title' ) ) :

                                    ?>

                                    <h6><?php the_sub_field( 'txt_sec_four_small_title' ); ?></h6>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_four_main_title' ) ) :

                                    ?>

                                    <h4><?php the_sub_field( 'txt_sec_four_main_title' ); ?></h4>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txa_sec_four_description' ) ) :

                                    ?>

                                    <p><?php the_sub_field( 'txa_sec_four_description' ); ?></p>

                                    <?php

                                endif;

                                ?>

                                <?php

                                if ( get_sub_field( 'txt_sec_four_cta_label' ) && get_sub_field( 'url_sec_four_cta_url' ) ) :

                                    ?>

                                    <a href='<?php the_sub_field( 'url_sec_four_cta_url' ); ?>'><?php the_sub_field( 'txt_sec_four_cta_label' ); ?></a>

                                    <?php

                                endif;

                                ?>

                            </div> <!-- .module-section -->

                            <?php

                        endif;

                        ?>

                        <div class="clear"></div>

                    </div> <!-- .module -->

                    <?php

                endif;

                if ( get_row_layout() == 'testimonial' ) :

                    ?>

                    <div class="module">

                        <?php

                        if ( get_sub_field( 'title' ) ) :

                            ?>

                            <h2><?php the_sub_field( 'title' ); ?></h2>

                            <?php

                        endif;

                        ?>

                        <?php

                        if ( have_rows('rpt_add_testimonial') ) :

                            while( have_rows('rpt_add_testimonial') ): the_row();

                                // vars
                                $image       = get_sub_field( 'rpt_tst_image' );
                                $description = get_sub_field( 'rpt_tst_description' );
                                $name        = get_sub_field( 'rpt_tst_name' );
                                $email       = get_sub_field( 'rpt_tst_email' );

                                $fields = array( "rpt_tst_image", "rpt_tst_description", "rpt_tst_name" ,"rpt_tst_email" );

                                if ( is_acf_field_exists( $fields ) ) :


                                    ?>

                                    <div class="testimonial-snippet">

                                        <?php

                                        if ( $image ) :

                                            ?>

                                            <img src='<?php echo $image; ?>' />

                                            <?php

                                        endif;

                                        if ( $description ) :

                                            ?>

                                            <p><?php echo $description; ?></p>

                                            <?php

                                        endif;

                                        if ( $name ) :

                                            ?>

                                            <span class="testimonial-name"><?php echo $name; ?></span>

                                            <?php

                                        endif;

                                        if ( $email ) :

                                            ?>

                                            <span class="testimonial-email"><?php echo $email; ?></span>

                                            <?php

                                        endif;

                                        ?>

                                    </div>

                                    <?php

                                endif;

                            endwhile;

                        endif;

                        ?>

                    </div> <!-- .module -->

                    <?php

                endif;

                if ( get_row_layout() == 'instagram' ) :

                    if ( get_sub_field( 'instgrm_api_access_token' ) ) :

                        // Refer https://www.instagram.com/developer/endpoints/users/
                        $instagram_api_url  = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=';
                        $instagram_api_url .= get_sub_field( 'instgrm_api_access_token' );

                        $response = wp_remote_get( esc_url_raw( $instagram_api_url ) );
                        $recent_media = '';

                        if( is_array( $response ) ) {
                            $header = $response['headers']; // array of http header lines
                            $body = $response['body']; // use the content

                            $result = json_decode( $body, true );
                            $recent_media = $result["data"];
                        }

                        if ( ! empty( $recent_media ) ) :

                        ?>
                            <div class="module">

                            <?php

                            if ( get_sub_field( 'instgrm_hashtag' ) ) :

                            ?>

                                <span class="instagram-hashtag">#<?php the_sub_field( 'instgrm_hashtag' ); ?></span>

                            <?php

                            endif;

                            ?>

                            <?php

                            if ( get_sub_field( 'instgrm_title' ) ) :

                            ?>
                                <h2><?php the_sub_field( 'instgrm_title' ); ?></h2>

                            <?php

                            endif;

                            ?>

                            <?php

                            foreach( $recent_media as $item ) :

                            ?>

                                <a href='<?php echo $item["link"]; ?>'><img class="instagram-image-single" src='<?php echo $item["images"]["thumbnail"]["url"]; ?>' /></a>

                            <?php

                            endforeach;

                        ?>

                            </div><!--.module-->

                        <?php

                        endif;

                    endif;

                endif;

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
