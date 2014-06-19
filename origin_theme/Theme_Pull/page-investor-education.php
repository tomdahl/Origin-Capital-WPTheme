<?php
/*
Template name: Investor Education
*/

get_header(); // Loads the header.php template. ?>

  <?php do_atomic( 'before_content' ); // origin_before_content ?>

  <div id="content">

    <?php do_atomic( 'open_content' ); // origin_open_content ?>

    <div class="hfeed">
    
      <h1 class="page-title">Investor Education</h1>
      <?php
        $current = isset($_GET['page2']) ? $_GET['page2'] : 1;
        $args = array(
          'cat' => 8,
          'posts_per_page' => -1,
          'paged' => $current,
        );
        query_posts($args);
      ?>
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
                
                  <div class="byline"><a href="<?php the_field('download_pdf:'); ?>"><span>Download PDF: </span> PDF</a></div>
              
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