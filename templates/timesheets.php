<?php
  $timesheetArgs = array(
    'post_type' => 'employee'
  );

  $timesheetQuery = new WP_Query( $timesheetArgs );
?>

<div class="col-12">
  <div class="gc-mt-15 gc-timesheet-main">

    <?php if ( $timesheetQuery->have_posts() ) : ?>

        <div class="gc-card p-3">
          <h3 class="text-center">
            Total time over last 2 weeks
          </h3>
        </div>

        <?php while ( $timesheetQuery->have_posts() ) : $timesheetQuery->the_post(); ?>


              <?php get_template_part( '/templates/timesheets/two-weeks' ); ?>


        <?php endwhile; ?>

    <?php endif; ?>

  </div>
</div>
