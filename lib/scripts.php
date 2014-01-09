<?php
/**
 * Enqueue scripts and stylesheets
 */
function dw_timeline_scripts() {
  wp_enqueue_style('dw_timeline_main', get_template_directory_uri() . '/assets/css/main.css', false, '6c39f42987ae297a5a21e2bb35bf3402');

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, null, false);
    add_filter('script_loader_src', 'dw_timeline_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.7.0.min.js', false, null, false);
  wp_register_script('infinitescroll', get_template_directory_uri() . '/assets/js/vendor/jquery.infinitescroll.min.js', false, '', true);
  wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap-3.0.3.min.js', false, '', true);
  wp_register_script('dw_timeline_scripts', get_template_directory_uri() . '/assets/js/scripts.js', false, '', true);
  wp_localize_script( 'dw_timeline_scripts', 'dwtl', array(
    'template_directory_uri' => get_template_directory_uri()
  ) );

  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap');
  wp_enqueue_script('infinitescroll');
  wp_enqueue_script('dw_timeline_scripts');
}
add_action('wp_enqueue_scripts', 'dw_timeline_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function dw_timeline_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.10.2.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'dw_timeline_jquery_local_fallback');
