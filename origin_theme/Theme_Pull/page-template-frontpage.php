<?php
/**
 *  Template Name: Front Page Template
 *
 * Full width page template with no sidebar.
 *
 * @package Origin
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

  <?php do_atomic( 'before_content' ); // origin_before_content ?>

  <div style="min-height: 100%; height:775px;" id="content">

    <?php do_atomic( 'open_content' ); // origin_open_content ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '1703' ); ?>

    <div class="hfeed">

      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <?php do_atomic( 'before_entry' ); // origin_before_entry ?>

          <div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

            <?php do_atomic( 'open_entry' ); // origin_open_entry ?>
            
            <?php //echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

            <div class="entry-content">   
              
              <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'origin' ) ); ?>
              
            </div><!-- .entry-content -->

            <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>

            <?php do_atomic( 'close_entry' ); // origin_close_entry ?>

          </div><!-- .hentry -->

          <?php do_atomic( 'after_entry' ); // origin_after_entry ?>

          <?php do_atomic( 'after_singular' ); // origin_after_singular ?>

        <?php endwhile; ?>

      <?php endif; ?>

    </div><!-- .hfeed -->

    <?php do_atomic( 'close_content' ); // origin_close_content ?>

  </div><!-- #content -->

  <?php do_atomic( 'after_content' ); // origin_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>