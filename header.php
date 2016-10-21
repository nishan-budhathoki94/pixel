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

<?php if(is_singular()):

    $class="tbeer-single-post-template";

  else:

    $class="tbeer-home-template";

endif;?>

<body <?php body_class($class);?>>

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
                  <button><img src="img/i-search.svg" class="svg" alt=""></button>
                </div>

                <form action="/" class="header-search-wrap col-xs-12 col-md-9 col-md-offset-3">
                  <input type="search" placeholder="Search The Site...">
                  <button><img src="img/i-search.svg" class="svg" alt=""></button>
                  <div class="header-search-close">
                    <img src="img/close.svg" class="svg" alt="">
                  </div>
                </form>

                
              </div>
              <!-- /.header-search-form -->

              <!-- .header-folow-us -->
              <div class="header-social text-left pull-right">
                <div class="header-social-name">
                  Follow Us
                  <ul class="sub-menu">
                   <?php

                  $facebook=$pixel_options['social_facebook'];

                  $twitter=$pixel_options['social_twitter'];

                  $google=$pixel_options['social_googlep'];

                  $youtube=$pixel_options['social_youtube'];

                  if($facebook!=""&& $twitter!="" && $google!="" && $youtube!=""):?>

                        <ul>

                          <?php if($facebook):?>

                              <li><a href="<?php echo esc_url($facebook);?>" target="_blank"></a></li>

                          <?php endif; if($twitter):?>

                              <li><a href="<?php echo esc_url($facebook);?>" target="_blank"></a></li>

                          <?php endif; if($google):?>

                              <li><a href="<?php echo esc_url($facebook);?>" target="_blank"></a></li>

                          <?php endif; if($youtube):?>

                              <li><a href="<?php echo esc_url($facebook);?>" target="_blank"></a></li>

                          <?php endif;?>

                        </ul>

                    </div>

                  <?php endif;?>                
                  
                  </ul>

              </div>
              <!-- /.header-folow-us -->

            </div>



              <!-- navbar-collapse start-->

              <div id="nav-menu" class="navbar-collapse tbeer-menu-wrapper collapse" role="navigation">

                <?php

                  wp_nav_menu( array(

                  'theme_location'    => 'primary',

                  'container'         => '',

                  'container_class'   => '',

                  'container_id'      => 'bs-example-navbar-collapse-1',

                  'menu_class'        => 'nav navbar-nav tbeer-menus',

                  'fallback_cb'       => 'pixel_bootstrap_navwalker::fallback',

                  'walker'            => new pixel_bootstrap_navwalker())

                  );?>

              </div>

              <!-- navbar-collapse end-->
              <div class="tbeer-social-and-search-wrapper">

                  <!-- Social Icons End -->

                    

              </div>

        </div>

      </div>

    </div>

  </header>

  