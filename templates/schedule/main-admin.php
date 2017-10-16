<?php

  $schedArgs = array(
    'post_type' => 'weekly_schedule',
    'posts_per_page' => '5'
  );

  $schedQuery = new WP_Query( $schedArgs );

?>

<div class="col-12">
  <div class="gc-mt-15 gc-schedule-main">

    <?php if ( $schedQuery->have_posts() ) : while ( $schedQuery->have_posts() ) : $schedQuery->the_post(); ?>

        <div class="gc-schedule-week-admin">

          <?php
            get_template_part( '/templates/schedule/tue', 'admin' );
            get_template_part( '/templates/schedule/wed', 'admin' );
            get_template_part( '/templates/schedule/thu', 'admin' );
            get_template_part( '/templates/schedule/fri', 'admin' );
            get_template_part( '/templates/schedule/sat', 'admin' );

            get_template_part( '/templates/schedule/edit' );

          ?>

        </div>

      <?php endwhile; endif; wp_reset_postdata(); ?>

      </div>

      <?php get_template_part( '/templates/schedule/new' ); ?>

</div>
