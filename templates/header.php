<?php  
  $class = 'no-cover';
  if ( is_front_page() || is_archive() || is_search() || is_single() ) {
    $class = 'cover';
  }
?>

<header class="banner <?php echo $class ?>" role="banner">
  <div class="header-inner">
      <nav class="nav-main" role="navigation">
        <div class="container">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
          endif;
        ?>
        </div>
      </nav>
      <?php if( is_front_page() || is_archive() || is_search() ) : ?>
      <hgroup>
        <div class="container">
          <h1 class="page-title"><?php echo dw_timeline_title(); ?></h1>
          <h2 class="page-description"><?php bloginfo('description'); ?></h2>
          <button id="get-started" class="btn btn-default btn-coner">Get Started Now</button>
        </div>
      </hgroup>
      <?php endif; ?>
  </div>
</header>
