<?php
/**
 * Index Template
 *
 * This is the default template.  It is used when a more specific template can't be found to display
 * posts.  It is unlikely that this template will ever be used, but there may be rare cases.
 *
 * @package Origin
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

  <?php do_atomic( 'before_content' ); // origin_before_content ?>

  <div id="content">

    <?php do_atomic( 'open_content' ); // origin_open_content ?>

    <div class="hfeed">
    
      <h1 class="page-title">Origin in the News</h1>

      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <?php do_atomic( 'before_entry' ); // origin_before_entry ?>

            <div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

              <?php do_atomic( 'open_entry' ); // origin_open_entry ?>
              
              <div class="sticky-header">
                  
                <?php //echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
                
                <?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[entry-published]', 'origin' ) . '</div>' ); ?>
                    
              </div><!-- .sticky-header -->
                
                <div class="entry-summary">
                
                  <?php the_content(); ?>
                  
                  <?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'Published by Origin Group in [entry-terms taxonomy="category" before=""]', 'origin' ) . '</div>' ); ?>
                
                  
                  <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
              
                </div><!-- .entry-summary -->
                
                <?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'origin' ), 'after' => '</p>' ) ); ?>            
                            
              <?php do_atomic( 'close_entry' ); // origin_close_entry ?>

            </div><!-- .hentry -->

          <?php do_atomic( 'after_entry' ); // origin_after_entry ?>

        <?php endwhile; ?>

      <?php else : ?>

        <?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

      <?php endif; ?>

    </div><!-- .hfeed -->
    
    <div class="clear"></div>

    <?php do_atomic( 'close_content' ); // origin_close_content ?>

    <?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

  </div><!-- #content -->

  <?php do_atomic( 'after_content' ); // origin_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>