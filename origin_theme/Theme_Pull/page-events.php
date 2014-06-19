<?php
/*
Template name: Events page
*/
get_header(); ?>

  <div id="content">
    <h1 class="page-title entry-title">Upcoming Events</h1>
    <div class="upcoming-wrap">
      <?php
        $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
          'cat' => 6,
          'posts_per_page' => -1,
          'paged' => $page,
        );
        query_posts($args);
      ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="up-block">
          <div class="up-title"><?php the_field('upcoming_title'); ?></a></div>
          <div class="up-date-wrap">
            <div class="up-date"><?php the_field('date_of_event'); ?></div>
            <div class="up-place"><?php the_field('event_place'); ?></div>
            <div class="clear"></div>
          </div>
          <div class="line"></div>
          <div class="up-descr">
            <?php the_content(); ?>
            <div class="clear"></div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <h1 class="page-title entry-title">Past Events</h1>
    <div class="past-wrap">
      <?php
        $current = isset($_GET['page2']) ? $_GET['page2'] : 1;
        $args = array(
          'cat' => 7,
          'posts_per_page' => -1,
          'paged' => $current,
        );
        query_posts($args);
      ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="past-block">
          <div class="p-title"><?php the_title(); ?></div>
          <div class="p-location"><?php the_field('event_place'); ?></div>
          <div class="thumb">
            <a class="lightbox" href="<?php the_field('image'); ?>">
              <img src="<?php the_field('image'); ?>" alt="">
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <?php /*
      if (!is_singular() && current_theme_supports('loop-pagination'))
      {
        loop_pagination(array('base'=>add_query_arg('page2','%#%'), 'current'=>$current));
      }
    */?>  
  </div>

<?php get_footer(); // Loads the footer.php template. ?>