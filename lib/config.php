<?php
/**
 * Enable theme features
 */
add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]

/**
 * Configuration values
 */
define('POST_EXCERPT_LENGTH', 40); // Length in words for excerpt_length filter (http://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length)

/**
 * .main classes
 */
function dw_timeline_main_class() {
  if (is_single() || is_page()) {
    $class = 'col-sm-8 col-sm-offset-2';
  } else {
    $class = 'col-sm-12';
  }
  return $class;
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */

if (!isset($content_width)) {
  $content_width = 465;
}
