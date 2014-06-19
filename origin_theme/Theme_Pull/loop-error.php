<?php
/**
 * Loop Nav Template
 *
 * This template is used to show your your next/previous post links on singular pages and
 * the next/previous posts links on the home/posts page and archive pages.
 *
 * @package Origin
 * @subpackage Template
 */
?>

  <?php if ( is_attachment() ) : ?>

    <div class="loop-nav">
      <?php previous_post_link( '%link', '<div class="previous"><span class="arrow"></span>' . __( 'Return to entry', 'origin' ) . '</div>' ); ?>
    </div><!-- .loop-nav -->

  <?php elseif ( is_singular( 'post' ) ) : ?>

    <div class="loop-nav">
      <?php //previous_post_link( '<div class="previous"><span class="arrow"></span>' . __( '%link', 'origin' ) . '</div>', '%title' ); ?>
      <div class="previous"><span class="arrow"></span> <a href="<?php bloginfo('url'); ?>/section/current-holdings/">Back to Current Holdings</a></div>
      
      <?php //next_post_link( '<div class="next">' . __( '%link', 'origin' ) . '<span class="arrow"></span></div>', '%title' ); ?>
      <div class="next"><a href="<?php bloginfo('url'); ?>/section/news/">Read News</a> <span class="arrow"></span> </div>
    </div><!-- .loop-nav -->

  <?php elseif ( !is_singular() && current_theme_supports( 'loop-pagination' ) ) : loop_pagination(); ?>

  <?php elseif ( !is_singular() && $nav = get_posts_nav_link( array( 'sep' => '', 'prelabel' => '<div class="previous"><span class="arrow"></span>' . __( 'Previous', 'origin' ) . '</div>', 'nxtlabel' => '<div class="next">' . __( 'Next', 'origin' ) . '<span class="arrow"></span></div>' ) ) ) : ?>

    <div class="loop-nav">
      <?php echo $nav; ?>
    </div><!-- .loop-nav -->

  <?php endif; ?>