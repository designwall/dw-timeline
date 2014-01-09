<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-warning">
  <?php _e('Sorry, but the page you were trying to view does not exist.', 'dw-timeline'); ?>
</div>

<p><?php _e('It looks like this was the result of either:', 'dw-timeline'); ?></p>
<ul>
  <li><?php _e('a mistyped address', 'dw-timeline'); ?></li>
  <li><?php _e('an out-of-date link', 'dw-timeline'); ?></li>
</ul>

<?php get_search_form(); ?>
