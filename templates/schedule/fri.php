<?php

  $rawDate = get_field( 'fri_date', false, false );

  $month = gcGetFullMonth( $rawDate );
  $month = substr($month, 0, 3) . '<span class="mobile-hide">' . substr($month, 3) . '</span>';

?>


<div class="modal fade" id="sched-modal-<?php echo $rawDate; ?>" tabindex="-1" role="dialog" aria-labelledby="fri_<?php echo $month . '_'; the_field( 'fri_date' ); ?>_label" aria-hidden="true">
  <div class="modal-dialog gc-shifts-modal" role="document">
    <div class="modal-content">

      <div class="modal-header gc-week-header">
        <h5 class="modal-title">Friday, <?php echo $month . ' '; the_field( 'fri_date' ); ?></h5>
      </div>

      <div class="modal-body">

        <?php if ( have_rows( 'fri_shifts' ) ) : ?>

          <div class="gc-day-schedule">
            <div class="gc-day-sched-emp">
              <p>Employee</p>
            </div>
            <div class="gc-day-sched-from">
              <p>Start</p>
            </div>
            <div class="gc-day-sched-to">
              <p>End</p>
            </div>

            <?php while ( have_rows( 'fri_shifts' ) ) : the_row(); ?>

              <?php $emp = get_sub_field( 'employee' ); ?>
              <div class="gc-day-sched-emp">
                <p><?php gc_display_name( $emp['ID'] ); ?> </p>
              </div>
              <div class="gc-day-sched-from">
                <p><?php the_sub_field( 'from_time' ); ?></p>
              </div>
              <div class="gc-day-sched-to">
                <p><?php the_sub_field( 'to_time' ); ?></p>
              </div>

            <?php endwhile; ?>
          </div>
        <?php else: ?>
          <div class="nothing-scheduled">
            <p>Nobody scheduled yet!</p>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>

<button type="button" data-toggle="modal" data-target="#sched-modal-<?php echo $rawDate; ?>">

  <div class="gc-sched-day">

    <h5 class="mobile-hide">Friday</h5>
    <h6><?php echo $month; ?></h6>
    <p><?php the_field( 'fri_date' ); ?></p>

  </div>

</button>
