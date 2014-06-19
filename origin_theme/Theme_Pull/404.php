<?php
/**
 * 404 Template
 *
 * The 404 template is used when a reader visits an invalid URL on your site. 
 * By default, the template will display a generic message.
 *
 * @package Origin
 * @subpackage Template
 * @link http://codex.wordpress.org/Creating_an_Error_404_Page
 */

@header( 'HTTP/1.1 404 Not found', true, 404 );

get_header(); // Loads the header.php template. ?>

  <?php do_atomic( 'before_content' ); // origin_before_content ?>

  <div id="content">

    <?php do_atomic( 'open_content' ); // origin_open_content ?>

    <div class="hfeed">

      <div id="post-0" class="<?php hybrid_entry_class(); ?>">

        <h1 class="error-404-title entry-title"><?php _e( 'Not Found', 'origin' ); ?></h1>

        <div class="entry-content">

          <p>
          <?php printf( __( 'You tried going to %1$s, <br />but it doesn\'t exist. Give it another try or use navigation links above.', 'origin' ), '<code>' . home_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?>
          </p>

        </div><!-- .entry-content -->

      </div><!-- .hentry -->

    </div><!-- .hfeed -->

    <?php do_atomic( 'close_content' ); // origin_close_content ?>

  </div><!-- #content -->

  <?php do_atomic( 'after_content' ); // origin_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>