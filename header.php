<?php

/**

 * The template for displaying the header

 *

 * Displays all of the head element and everything up until the "site-content" div.

 *

 * @package WordPress

 * @subpackage Pixel_leak

 * @since Pixel 1.0

 */



?><!DOCTYPE html>

<?php global $pixel_options;?>

<html <?php language_attributes(); ?> class="no-js">

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if(isset($pixel_options['meta_author']) && $pixel_options['meta_author']!='') : ?>

    <meta name="author" content="<?php echo esc_attr($pixel_options['meta_author']); ?>">

    <?php else: ?>

    <meta name="author" content="<?php esc_attr(bloginfo('name')); ?>">

    <?php endif; ?>

    <?php if(isset($pixel_options['meta_author']) && $pixel_options['meta_desc']!='') : ?>

    <meta name="description" content="<?php echo esc_attr($pixel_options['meta_desc']); ?>">

    <?php endif; ?>

    <?php if(isset($pixel_options['meta_author']) && $pixel_options['meta_keyword']!='') : ?>

    <meta name="keyword" content="<?php echo esc_attr($pixel_options['meta_keyword']); ?>">

    <?php endif; ?>

    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php endif; ?>

    <title><?php wp_title( ' | ', true, 'right' );?></title>

    <?php if(isset($pixel_options['favicon']['url'])) :  ?>

    <link rel="shortcut icon" href="<?php echo esc_url($pixel_options['favicon']['url']); ?>">

    <?php endif; ?>

    <?php wp_head(); ?>

</head>

<body <?php body_class();?>>

<div id="wrapper">

  <header class="site-header">
      
    <!-- .site-header-top -->
    <div class="site-header-top">

      <div class="container-fluid">

        <div class="row">
                
                 <!-- Logo -->
                 <div class="col-xs-12 col-md-3 col-lg-3">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-wrap pull-left">
                      <?php if($pixel_options['logo']['url']!=""):?>

                            <img src="<?php echo esc_url($pixel_options['logo']['url']);?>" data-at2x="<?php echo esc_url($pixel_options['retina']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" alt="logo" >

                        <?php else:?>

                            <?php bloginfo( 'name' ); ?>

                        <?php endif;?>
                    </a>
                 </div>

          <div class="col-xs-12 col-md-3 col-lg-3 header-custom">

              <!-- .header-search-form -->
              <div class="header-search-form text-left pull-right">
                <div class="header-search-form-toogle">
                  <button><img src="<?php echo get_template_directory_uri() ;?>/assets/img/i-search.svg" class="svg" alt=""></button>
                </div>

                <form action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" method="get" class="header-search-wrap col-xs-12 col-md-9 col-md-offset-3">
                  <input type="search" placeholder="Search The Site..." name="s">
                  <button><img src="<?php echo get_template_directory_uri() ;?>/assets/img/i-search.svg" class="svg" alt=""></button>
                  <div class="header-search-close">
                    <img src="<?php echo get_template_directory_uri() ;?>/assets/img/close.svg?>" class="svg" alt="">
                  </div>
                </form>

                
              </div>
              <!-- /.header-search-form -->

              <!-- .header-folow-us -->
              <?php

              $facebook=$pixel_options['social_facebook'];

              $twitter=$pixel_options['social_twitter'];

              $google=$pixel_options['social_googlep'];

              $youtube=$pixel_options['social_youtube'];

              if($facebook!=""&& $twitter!="" && $google!="" && $youtube!=""):?>

              <div class="header-social text-left pull-right">
                <div class="header-social-name">
                  <?php _e('Follow Us','pixel');?>
                  <ul class="sub-menu">

                          <?php if($facebook):?>

                              <li><a href="<?php echo esc_url($facebook);?>" target="_blank"><?php _e('Facebook','pixel')?></a></li>

                          <?php endif; if($twitter):?>

                              <li><a href="<?php echo esc_url($twitter);?>" target="_blank"><?php _e('Twitter','pixel')?></a></li>

                          <?php endif; if($google):?>

                              <li><a href="<?php echo esc_url($google);?>" target="_blank"><?php _e('Google','pixel')?></a></li>

                          <?php endif; if($youtube):?>

                              <li><a href="<?php echo esc_url($youtube);?>" target="_blank"><?php _e('Youtube','pixel')?></a></li>

                          <?php endif;?>
                  
                  </ul>

              </div>
              <!-- /.header-folow-us -->
            </div>

            <?php endif;?>  

          </div><!-- /.header-custom -->


             <div class="col-xs-12 col-md-6 col-lg-6 header-bottom-panel">
              <!-- .header-menu-wrap -->
              <div class="header-menu-wrap text-center">

                <nav class="header-menu jLoad text-left">

                  <?php

                    wp_nav_menu( array(

                    'theme_location'    => 'primary',

                    'container'         => '',

                    'container_class'   => '',

                    'container_id'      => '',

                    'menu_class'        => 'primary-menu',

                    'fallback_cb'       => 'pixel_bootstrap_navwalker::fallback',

                    'walker'            => new pixel_bootstrap_navwalker())

                    );?>


                </nav>

              </div>

            </div>
            <!--/header-bottom-panel-->


              
        </div>

      </div>

    </div>

  </header>

  <main>

    <div class="main-content">

  