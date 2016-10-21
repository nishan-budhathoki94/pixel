<?php // Exit if accessed directly

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>

<?php global $pixel_options; pixel_setPostViews(get_the_ID());?>

<section class="tbeer-latest-article-section tbeer-section tbeer-single-post-section">

    <div class="container">

        <div class="row">

            <div class="tbeer-single-post-wrapper">

            <?php

                if (have_posts()) :

                    echo '<div class="tbeer-main-content col-md-8 col-sm-8 col-xs-12">';

                    while (have_posts()) : the_post();

                        get_template_part('partials/article');

                        if(isset($pixel_options['author_detail']) && $pixel_options['author_detail']==1)

                            get_template_part('partials/article-author');

                        if(isset($pixel_options['related_post']) && $pixel_options['related_post']==1)

                            get_template_part('partials/article-related-posts');

                        comments_template( '', true );

                    endwhile;

                    echo '</div>';

                endif;?>

            <?php if(isset($pixel_options['single_blog']) && $pixel_options['single_blog']==1):?>

                 <div class="tbeer-sidebar-wrapper col-md-4 col-sm-4 col-xs-12">

                    <?php if ( is_active_sidebar( 'pixel-post-sidebar' ) ) {

                        dynamic_sidebar( 'pixel-post-sidebar' );

                     } ?>

                    <div class="tbeer-sidebar">

                         <?php if ( is_active_sidebar( 'pixel-widgets-sidebar' ) ) {

                            dynamic_sidebar( 'pixel-widgets-sidebar' );

                         } ?><?php if ( is_active_sidebar( 'pixel-trending-sidebar' ) ) {

                            dynamic_sidebar( 'pixel-trending-sidebar' );

                         } ?>

                    </div>

                </div>

            <?php endif;?>

            </div>

        </div>

    </div>

</section>

<?php get_footer(); ?>