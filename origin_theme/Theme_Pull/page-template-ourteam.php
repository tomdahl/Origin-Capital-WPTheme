<?php
/**
 *  Template Name: &mdash; Our Team
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

            <?php do_atomic( 'close_entry' ); // origin_close_entry ?>

          </div><!-- .hentry -->

          <?php do_atomic( 'after_entry' ); // origin_after_entry ?>

          <?php do_atomic( 'after_singular' ); // origin_after_singular ?>

        <?php endwhile; ?>

      <?php endif; ?>

    </div><!-- .hfeed -->
    
    <div id="members-thumbnails">
    
      <?php 
        global $post;
        $args = array( 'post_type' => 'origin_member',  'numberposts' => -1 );
        $member_thumbnails = get_posts( $args );
        foreach( $member_thumbnails as $post ) :  setup_postdata($post); 
      ?>
      
      <div class="<?php hybrid_entry_class(); ?> member-thumbnail"> 
      
        <?php if ( get_post_meta($post->ID, '_cmb_member_image', true) ) : 
        echo '<a href="#post-' . get_the_ID() . '">';
        echo '<img class="" src="' . get_post_meta($post->ID, '_cmb_member_image', true) . '" />';
        echo '</a>';
        endif; ?>
        
        <div class="member-name">
          <a href="#post-<?php the_ID(); ?>"><?php echo get_the_title(); ?></a>
        </div>
        
        <?php if ( get_post_meta($post->ID, '_cmb_member_job_title', true) ) : 
        echo '<div class="member-job-title">' . get_post_meta($post->ID, '_cmb_member_job_title', true) . '</div>';
        endif; ?>
        
        <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
        
      </div><!--/.member-thumbnail -->
      
      <?php endforeach; ?>
      
      <div class="clear"></div>
      
      <?php global $user_ID; if( $user_ID ) : ?>
        
        <?php if( current_user_can('level_10') ) : ?>

          <p class="addnew">      
            <a class="post-edit-link" href="<?php echo get_bloginfo( 'url' ); ?>/wp-admin/post-new.php?post_type=origin_member" title="Add New Member"> &nbsp;Add New Member&nbsp; </a>   
          </p>

          <?php else : ?>

        <?php endif; ?>

      <?php endif; ?> 
      
    </div><!-- #members-thumbnails -->
    
    <div id="members-bios">
    
      <?php
      global $post;
        $args = array( 'post_type' => 'origin_member',  'numberposts' => -1 );
        $member_bios = get_posts( $args );
      foreach( $member_bios as $post ) :  setup_postdata($post); 
      ?>
        
        <div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?> member-bio">
        
          <?php if ( get_post_meta($post->ID, '_cmb_member_vcard', true) ) : 
          echo '<a class="button download-link" href="' . get_post_meta($post->ID, '_cmb_member_vcard', true) . '">Download vCard &raquo;</a>';
          endif; ?>

          <?php if ( get_post_meta($post->ID, '_cmb_member_image', true) ) : 
          echo '<img src="' . get_post_meta($post->ID, '_cmb_member_image', true) . '" />';
          endif; ?>
        
          <div class="member-name">
            <h3><?php echo get_the_title(); ?></h3>
          
            <?php if ( get_post_meta($post->ID, '_cmb_member_job_title', true) ) : 
            echo '<div class="member-job-title">' . get_post_meta($post->ID, '_cmb_member_job_title', true) . '</div>';
            endif; ?>
          </div>
          
          <div class="member-bio-text">
          
            <?php the_content(); ?>
            
            <div class="backtotop"><a class="top tooltip" href="#origincapitalpartners-com">Back to top</a></div>
            
          </div>
          
          <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
        
        </div><!-- .mamber-bio -->
        
        <?php endforeach; ?>

    </div><!-- #member-bios -->
    
    <?php do_atomic( 'close_content' ); // origin_close_content ?>

  </div><!-- #content -->

  <?php do_atomic( 'after_content' ); // origin_after_content ?>
  
  <?php // get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>

<?php get_footer(); // Loads the footer.php template. ?>