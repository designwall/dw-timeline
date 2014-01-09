<header class="banner" role="banner">
  <div class="header-inner">
    <div class="container">
      <?php if(is_home() || is_archive()) : ?>
      <hgroup>
        <h1 class="page-title"><?php echo dw_timeline_title(); ?></h1>
        <h2 class="page-description"><?php bloginfo('description'); ?></h2>
        <button id="get-started" class="btn btn-default btn-coner">Get Started Now</button>
      </hgroup>
      <?php endif; ?>
      <nav class="nav-main" role="navigation">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
          endif;
        ?>
      </nav>
    </div>
  </div>
</header>
