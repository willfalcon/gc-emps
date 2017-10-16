<?php

  acf_form_head();
  get_header( 'dashboard' );


    if ( have_posts() ) : while ( have_posts() ) : the_post();



  ?>


  <div class="row">

    <?php get_template_part( '/inc/templates/dashboard', 'menu' ); ?>

    <?php get_template_part( '/inc/templates/schedule', 'admin' ); ?>

  </div>


<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
