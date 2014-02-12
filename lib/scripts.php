<?php
/**
 * Enqueue scripts and stylesheets
 */
function dw_timeline_scripts() {
  wp_enqueue_style('dw_timeline_main', get_template_directory_uri() . '/assets/css/main.css', false, '6c39f42987ae297a5a21e2bb35bf3402');

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