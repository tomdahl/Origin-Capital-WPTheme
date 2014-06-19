<?php
/*
Template name: Login page
*/

get_header(); // Loads the header.php template. ?>

  <?php do_atomic( 'before_content' ); // origin_before_content ?>

  <div style="min-height: 100%; height:775px;" id="content">

    <?php do_atomic( 'open_content' ); // origin_open_content ?>

    <div class="hfeed">
    
      <h1 class="page-title">Investor Login</h1>
      
      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <?php do_atomic( 'before_entry' ); // origin_before_entry ?>

            <div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

              <?php do_atomic( 'open_entry' ); // origin_open_entry ?>
              
              
                
                <div class="entry-summary">
                
                  <?php the_content(); // content rearranged for spacing at the bottom ?>
                          
                  
                  <!--<h2 class="title2-log">Welcome to the Origin Capital Online Investor Portal</h2>-->
                  <p><span class="bold">Powered</span> by fippex</p>
                  
                  <div class="form-block">
                    <form method="POST" action="https://origincapital.fippex.net/login.aspx">
                      <label>Username</label>
                      <span class="text-holder-login">
                        <input name="username" value="" type="text" class="text" />
                      </span>
                      <label>Password</label>
                      <span class="text-holder-login">
                        <input name="password" value="" class="text" type="password" />
                      </span>
                      <p><input id="ctl00_primaryContentPlaceHolder_Login1_Login1_chkRememberMe" type="checkbox" name="ctl00$primaryContentPlaceHolder$Login1$Login1$chkRememberMe">
<span id="ctl00_primaryContentPlaceHolder_Login1_Login1_rememberMeLbl" class="s11">Remember my username on this computer</span>
                      </p>
                      <p class="align-right">
                        <input type="submit" id="catwebformbutton" class="submit" value="Login" />
                      </p>
                      <p><a id="" href="https://origincapital.fippex.net/ForgotPassword.aspx">Forgot Password</a></p>

                      </form>
                  </div>

                  <p>For assistance, pleace contact Investor Relations:</p>
                  <p>Kristin Nielsen - kristin.nielsen@origincapitalpartners.com - (312) 204.9940</p>
              
                </div><!-- .entry-summary -->
                            
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