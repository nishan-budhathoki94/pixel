<?php

/* Code for Popular Posts widget*/

class WP_Widget_Popular_Post_pixel extends WP_Widget {

    function __construct() {

         $widget_ops = array('classname' => 'Trending Posts', 'description' => __( "Gives list of trending posts.","pixel") );

        parent::__construct('popular_post_widget', __('Pixel:Trending Posts','pixel'), $widget_ops);

        $this->alt_option_name = 'popular_post';

    }

    public function widget( $args, $instance ) {



        ob_start();

        extract($args);

        $title='';

        $cache='';

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) )? absint( $instance['number'] ) : 2;

         echo $args['before_widget'];?>

         <?php if($number!=0):if ( ! empty( $title )) {

            echo $args['before_title'] ?><?php echo esc_attr($instance['title'])?> <?php echo $args['after_title'];

          }

          $arg = array(

            'post_type' => 'post',

            'posts_per_page'=>esc_attr($number),

            'meta_key' => 'post_views_count',

            'orderby' => 'meta_value_num',



         );

          $r = new WP_Query( $arg );

          if ($r->have_posts()) :

          ?>

            <div class="tbeer-sidebar-widget-details">

            <?php while ( $r->have_posts() ) : $r->the_post(); ?>

                <div class="tbeer-trending-news-post">

                    <div class="tbeer-trending-news-img">

                        <?php

                        global $post;

                        $thumbnail = get_post_thumbnail_id($post->ID);

                        $img_url = wp_get_attachment_image_src( $thumbnail,'full');

                        $alt = get_post_meta($thumbnail, '_wp_attachment_image_alt', true);

                        if($img_url):

                        $n_img = aq_resize( $img_url[0], $width =100, $height = 100, $crop = true, $single = true, $upscale = true );

                        ?>

                        <img src="<?php echo esc_url($n_img);?>"  alt="<?php echo esc_attr($alt);?>">

                        <?php else:

                        $img_url=get_template_directory_uri().'/assets/images/no-image.png';

                        $n_img = aq_resize( $img_url, $width =100, $height = 100, $crop = true, $single = true, $upscale = true );?>

                        <img src="<?php echo esc_url($img_url);?>" alt="No image">

                        <?php endif;?>

                    </div>

                    <div class="tbeer-trending-news-details">

                        <h3 class="tbeer-news-post-heading"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

                    </div>

               </div>

              <?php endwhile; ?>

            </div>

          <?php endif;?>

        <?php  wp_reset_postdata(); ?>

        <?php  $content = ob_get_clean();

        wp_cache_set('popular_post', $cache, 'widget');

        echo wp_kses_post($content);

        echo $args['after_widget'];?>

    <?php endif; }

    public function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );

        $title = strip_tags($instance['title']);

        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 2;



?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','pixel'); ?></label>

        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of products to show:','pixel' ); ?></label>

        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>





<?php    }

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['number'] = (int) $new_instance['number'];

        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );

        if ( isset($alloptions['popular_post']) )

            delete_option('popular_post');

            return $instance;



    }

 function flush_widget_cache() {



        wp_cache_delete('popular_post', 'widget');

    }



}

register_widget('WP_Widget_Popular_Post_pixel');