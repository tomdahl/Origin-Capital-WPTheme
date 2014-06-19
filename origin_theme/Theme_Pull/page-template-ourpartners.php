<?php
/**
 * Template Name: &mdash; Our Partners
 *
 * Full width page template with no sidebar.
 *
 * @package Origin
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

  <?php do_atomic( 'before_content' ); // origin_before_content ?>

  <div id="content">

    <?php do_atomic( 'open_content' ); // origin_open_content ?>

    <div id="parent-page" class="hfeed">

      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <?php do_atomic( 'before_entry' ); // origin_before_entry ?>

          <div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

            <?php do_atomic( 'open_entry' ); // origin_open_entry ?>

            <?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
            
            <div class="entry-content">
            
              <?php the_content(); ?>
            
            </div><!-- .entry-content -->

            <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>

            <?php do_atomic( 'close_entry' ); // origin_close_entry ?>

          </div><!-- /.hentry -->

          <?php do_atomic( 'after_entry' ); // origin_after_entry ?>

          <?php do_atomic( 'after_singular' ); // origin_after_singular ?>

        <?php endwhile; ?>

      <?php endif; ?>

    </div><!-- /.hfeed -->
    
    <div id="partners-thumbnails">
      
      <?php 
      global $post;
      $args = array( 'post_type' => 'origin_partner',  'numberposts' => -1 );
      $partner_thumbnails = get_posts( $args );
      foreach( $partner_thumbnails as $post ) : setup_postdata($post); 
      ?>
      
        <div class="<?php hybrid_entry_class(); ?> partner-thumbnail">  
        
          <?php if ( get_post_meta($post->ID, '_cmb_partner_logo', true) ) : 
            
            echo '<img src="' . get_post_meta($post->ID, '_cmb_partner_logo', true) . '" />';
          
          endif; ?>
          
          <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
          
        </div><!--/.partner -->
      
      <?php endforeach; ?>
      
      </div><!-- #partners-thumbnails -->
      
      <div class="clear"></div>
      
      <?php global $user_ID; if( $user_ID ) :
      
        if( current_user_can('level_10') ) : ?>

        <p class="addnew">
          <a class="post-edit-link" href="<?php echo get_bloginfo( 'url' ); ?>/wp-admin/post-new.php?post_type=origin_partner" title="Add New Partner"> &nbsp;Add New Partner&nbsp; </a>    
        </p>

        <?php else : ?>

        <?php endif; ?>

      <?php endif; ?> 
    
    <?php do_atomic( 'close_content' ); // origin_close_content ?>

  </div><!-- /#content -->

  <?php do_atomic( 'after_content' ); // origin_after_content ?>
  
<?php get_footer(); // Loads the footer.php template. ?>