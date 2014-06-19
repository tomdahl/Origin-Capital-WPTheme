<?php
/**
 * Post Template
 *
 * This is the default post template.  It is used when a more specific template can't be found to display
 * singular views of the 'post' post type.
 *
 * @package Origin
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

  <?php do_atomic( 'before_content' ); // origin_before_content ?>

  <div id="content">

    <?php do_atomic( 'open_content' ); // origin_open_content ?>

    <div class="hfeed">

      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
        
          <?php
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single-featured-thumbnail' );
            $url = $thumb['0'];
          ?>

          <?php do_atomic( 'before_entry' ); // origin_before_entry ?>

          <div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

            <?php do_atomic( 'open_entry' ); // origin_open_entry ?>
            
            <div class="post-content">
            
              <?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
            
              <div class="entry-content-left">
                
                <a href="<?php echo $url; ?>" rel="lightbox">
                
                  <?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'single-featured-thumbnail', 'link_to_post' => false, 'image_class' => 'featured-thumbnail', 'attachment' => false ) ); ?>
                
                </a>
                
              </div>
              
              <div class="entry-content-right">

                <?php if ( get_post_meta($post->ID, '_cmb_asset_type', true) ) : 
                  
                  echo '<div class="transaction-meta"><span class="asset-a">Asset Type:&nbsp;&nbsp;</span><span class="asset-b"> ';
                      
                      echo get_post_meta($post->ID, '_cmb_asset_type', true);
                      
                  echo '</span><br class="clear" /></div>';
                  
                endif; ?>
                  
                <?php if ( get_post_meta($post->ID, '_cmb_asset_location', true) ) : 
                      
                  echo '<div class="transaction-meta"><span class="asset-a" style="padding-right:12px;">Location:&nbsp;&nbsp;</span><span class="asset-b"> ';
                      
                    echo get_post_meta($post->ID, '_cmb_asset_location', true);
                      
                  echo '</span><br class="clear" /></div>';
                  
                endif; ?>

                <?php if ( get_post_meta($post->ID, '_cmb_asset_size', true) ) : 
                      echo '<div class="transaction-meta"><span class="asset-a" style="padding-right:47px;">Size:&nbsp;&nbsp;</span><span class="asset-b">';
                      echo get_post_meta($post->ID, '_cmb_asset_size', true);
                      echo '</span><br class="clear" /></div>';
                    endif; 
                ?>
                
                <?php if ( get_post_meta($post->ID, '_cmb_asset_occupancy', true) ) : 
                      echo '<div class="transaction-meta"><span class="asset-a" style="padding-right:2px;">Occupancy:&nbsp;&nbsp;</span><span class="asset-b">';
                      echo get_post_meta($post->ID, '_cmb_asset_occupancy', true);
                      echo '</span><br class="clear" /></div>';
                    endif; 
                ?>
                  
                <?php if ( get_post_meta($post->ID, '_cmb_asset_fund', true) ) : 
                      echo '<div class="transaction-meta"><span class="asset-a" style="padding-right:13px;">Portfolio:&nbsp;&nbsp;</span><span class="asset-b">';
                      echo get_post_meta($post->ID, '_cmb_asset_fund', true);
                      echo '</span><br class="clear" /></div>';
                    endif; 
                ?>
                
                <?php if ( get_post_meta($post->ID, '_cmb_acquisition_date_manually', true) ) : 
                      echo '<div class="transaction-meta"><span class="asset-a" style="padding-right:14px;">Acquired:&nbsp;&nbsp;</span><span class="asset-b">';
                      echo get_post_meta($post->ID, '_cmb_acquisition_date_manually', true);
                      echo '</span><br class="clear" /></div>';
                    endif; 
                ?>
                  
                <?php if ( get_post_meta($post->ID, '_cmb_acquisition_date_picker', true) ) : 
                      echo '<div class="transaction-meta last"><span class="asset-a">Acquired:&nbsp;&nbsp;</span><span class="asset-b">';
                      echo get_post_meta($post->ID, '_cmb_acquisition_date_picker', true);
                      echo '</span><br class="clear" /></div>';
                    endif; 
                ?>

              </div>
              
              <div class="clear"></div>
              
              <div class="entry-content">
                
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'origin' ) ); ?>
                
                <?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'origin' ), 'after' => '</p>' ) ); ?>
                
              </div><!-- .entry-content -->

              <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
              
              <?php do_atomic( 'close_entry' ); // origin_close_entry ?>
            
            </div><!-- .post-content -->

          </div><!-- .hentry -->

          <?php do_atomic( 'after_entry' ); // origin_after_entry ?>

          <?php do_atomic( 'after_singular' ); // origin_after_singular ?>

        <?php endwhile; ?>

      <?php endif; ?>

    </div><!-- .hfeed -->

    <?php do_atomic( 'close_content' ); // origin_close_content ?>

    <?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

  </div><!-- #content -->

  <?php do_atomic( 'after_content' ); // origin_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>