<?php 
if ( !defined('ABSPATH') ) {
echo '<h1>Forbidden</h1>'; 
exit();
} 
get_header(); 
global $pixel_options;
$style="";
if ( is_active_sidebar( 'pixel-top-banner-sidebar' ) ) : 
    dynamic_sidebar('pixel-top-banner-sidebar');
endif;?>
<!-- LATEST ARTICLE SECTION -->
    <div class="container-fluid">
        <div class="wrap-main-content">
            <?php
                $posts_per_page=get_option('posts_per_page');
                $latest_args = array( 'posts_per_page' => $posts_per_page, 'order'=> 'DESC', 'orderby' => 'date' );
                $lateset_posts = new WP_Query( $latest_args );
                if($lateset_posts->have_posts()): $post_count=1; 
                    echo '<div class="post-content">';
                            while ( $lateset_posts->have_posts()) : $lateset_posts->the_post();
                            $h=($post_count==1)? 550 : 380;
                            $w=($post_count==1)? 950 : 380;
                            $post_class=($post_count==1)? 'sticky-post' :'post-item';?>
                                 <!-- Latest Article -->
                                <article class="<?php echo $post_class;?>">
                                    <?php
                                        $thumbnail = get_post_thumbnail_id($post->ID);
                                        $img_url = wp_get_attachment_image_src( $thumbnail,'full');
                                        $alt = get_post_meta($thumbnail, '_wp_attachment_image_alt', true);
                                    if($img_url):
                                        $n_img = aq_resize( $img_url[0], $width =380, $height = 380, $crop = true, $single = true, $upscale = true ); ?>
                                        <div class="<?php echo $post_class;?>-image">
                                            <img src="<?php echo esc_url($n_img);?>" alt="<?php echo esc_attr($alt);?>">
                                        </div>
                                    <?php else:
                                    $img_url=get_template_directory_uri().'/assets/img/no-image.png';
                                    $n_img = aq_resize( $img_url, $width =380, $height = 380, $crop = true, $single = true, $upscale = true );?>
                                        <div class="<?php echo $post_class;?>-image">
                                            <img src="<?php echo esc_url($img_url);?>" alt="No image">
                                        </div>
                                    <?php endif;?>
                                    <div class="<?php echo $post_class?>-content">
                                        <div class="<?php echo $post_class?>-tag"> <?php if (get_the_category()) : ?><?php the_category(' / ');endif; ?></div>
                                        <h3 class="<?php echo $post_class?>-title">
                                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                        </h3>
                                        <?php if($post_count>=2):?>
                                        <p class="post-item-text">
                                            <?php echo Pixel_the_excerpt_max_charlength(100);?>
                                        </p>
                                        <?php endif;?>
                                        <div class="sticky-post-meta-two">
                                           <a href="<?php the_author_link();?>"><img src="<?php echo get_template_directory_uri() ;?>/assets/img/avatar.svg" alt="">
                                            <?php the_author();?></a>
                                            <a href="#"><img src="<?php echo get_template_directory_uri() ;?>/assets/img/clock.svg" alt="">
                                            <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></a>
                                            <a><img src="<?php echo get_template_directory_uri() ;?>/assets/img/chat.svg" alt="">
                                            <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></a>
                                        </div>
                                    </div>
                                    <!-- End -->
                                </article>
                                <!-- End -->
                            <?php $post_count++;
                            endwhile;
                    echo'</div>';
                endif;
                wp_reset_postdata();?>
                <!-- Sidebar -->
                <div class="post-content-left">
                    <div class="post-widgets">
                        <div class="post-widgets-wrap">
                            <?php if ( is_active_sidebar( 'pixel-widgets-sidebar' ) ) : 
                                dynamic_sidebar('pixel-widgets-sidebar');
                            endif;
                            if ( is_active_sidebar( 'pixel-trending-sidebar' ) ) : 
                                dynamic_sidebar('pixel-trending-sidebar');
                            endif;
                        ?>
                        </div>
                    </div>

                        <?php if ( is_active_sidebar( 'pixel-category-sidebar' ) ) :?>
                            <div class="left-nav">
                                <?php dynamic_sidebar('pixel-category-sidebar');?>
                            </div>
                        <?php endif;?>

                </div>
                <!-- End -->
            
        </div><!-- tberr-main-content-->
    </div>
<!-- LATEST ARTICLE SECTION END -->

<?php get_footer(); ?>