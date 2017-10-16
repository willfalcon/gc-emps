<?php

  $today = strtotime( 'Today' );
  $twoWeeksAgo = strtotime( '-2 weeks', $today );

  $techToday = strtotime( $today );

?>

<?php  if ( have_rows( 'timesheet' ) ) : ?>

  <?php
    $totalHours = 0;
    $totalMinutes = 0;
  ?>

  <div class="modal fade" id="twoWeekTimesheet-<?php echo $post->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="twoWeekTimesheet-<?php echo $post->ID; ?>-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="twoWeekTimesheet-<?php echo $post->ID; ?>-label"><?php the_title(); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="list-group">

            <?php while ( have_rows( 'timesheet' ) ) : the_row(); ?>

              <?php $shiftDate = strtotime( get_sub_field( 'date' ) ); ?>

              <?php if ( $shiftDate >= $twoWeeksAgo ) : ?>

                <li class="list-group-item">
                  <strong><?php echo date( 'l, F j', $shiftDate ); ?></strong>
                    Time in: <?php the_sub_field( 'clocked_in' ); ?>  |
                    Time out: <?php the_sub_field( 'clocked_out' ); ?>  |

                  <?php
                    $shiftHours = get_sub_field( 'hours', false );
                    $shiftMinutes = get_sub_field( 'minutes', false );
                    $shiftTime = gcCombineHoursMinutes( $shiftHours, $shiftMinutes );
                    $totalHours += $shiftHours;
                    $totalMinutes += $shiftMinutes;
                  ?>

                    Time this shift: <?php echo $shiftTime; ?>

                </li>
              <?php endif;

            endwhile; ?>

          </ul>
        </div>
      </div>
    </div>
  </div>

          <?php
          $totalTime = gcCombineHoursMinutes( $totalHours, $totalMinutes );

  endif;

?>

<div class="gc-card p-4 mt-2">
  <button class="gc-time-btn" type="button" data-toggle="modal" data-target="#twoWeekTimesheet-<?php echo $post->ID; ?>">
    <h5 class="text-left"><?php the_title(); ?></h5>

    <div class="text-left">
      <?php if ( ! empty( $totalTime ) ) : ?>
        Total time: <?php echo $totalTime; ?>
      <?php else: ?>
        No time recorded.
      <?php endif; ?>
    </div>

  </button>
</div>
