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

      <div class="gc-schedule-week">

        <?php
          get_template_part( '/templates/schedule/tue' );
          get_template_part( '/templates/schedule/wed' );
          get_template_part( '/templates/schedule/thu' );
          get_template_part( '/templates/schedule/fri' );
          get_template_part( '/templates/schedule/sat' );
        ?>


      </div>

    <?php endwhile; endif; wp_reset_postdata();?>

  </div>

</div>
