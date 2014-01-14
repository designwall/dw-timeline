<?php echo get_avatar($comment, $size = '48'); ?>
<div class="comment-body">
  <div class="comment-header">
    <h4 class="comment-heading"><?php echo get_comment_author_link(); ?></h4>
    <time datetime="<?php echo comment_date('c'); ?>"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s', 'dw-timeline'), get_comment_date(),  get_comment_time()); ?></a></time>
  </div>

  <div class="comment-content">
  <?php if ($comment->comment_approved == '0') : ?>
    <div class="alert alert-info">
      <?php _e('Your comment is awaiting moderation.', 'dw-timeline'); ?>
    </div>
  <?php endif; ?>
  <?php comment_text(); ?>
  </div>

  <div class="comment-action">
    <?php comment_reply_link(array_merge(array('reply_text'=> __('<i class="glyphicon glyphicon-share-alt"></i> Reply', 'dw-timeline') ), array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
    <?php edit_comment_link( __('<i class="glyphicon glyphicon-pencil"></i> edit') ); ?>
  </div>