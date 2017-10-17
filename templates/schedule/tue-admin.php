<?php

  $rawDate = get_field( 'tue_date', false, false );

  $month = gcGetFullMonth( $rawDate );
  $month = substr($month, 0, 3) . '<span class="mobile-hide">' . substr($month, 3) . '</span>';
?>

<div class="modal fade" id="sched-modal-<?php echo $rawDate; ?>" tabindex="-1" role="dialog" aria-labelledby="tue_<?php echo $month . '_'; the_field( 'tue_date' ); ?>_label" aria-hidden="true">
  <div class="modal-dialog gc-shifts-modal" role="document">
    <div class="modal-content">

      <div class="modal-header gc-week-header">
        <h5 class="modal-title">Tuesday, <?php echo $month . ' '; the_field( 'tue_date' ); ?></h5>
      </div>

      <div class="modal-body">
        <div class="gc-sched-shifts">

          <?php

            $shiftOptions = array(
              'id' => 'add_shifts_' . $rawDate,
              'fields' => array(
                'field_59d3a2cf72b3a'
              ),
              'submit_value' => 'Save Shifts',
              'html_submit_button'	=> '<input type="submit" class="btn btn-outline-secondary" value="%s" />',
              'updated_message' => false
            );

            acf_form( $shiftOptions );

          ?>

        </div>
      </div>

    </div>
  </div>
</div>

<button type="button" data-toggle="modal" data-target="#sched-modal-<?php echo $rawDate; ?>">

  <div class="gc-sched-day">

    <h5 class="mobile-hide">Tuesday</h5>
    <h6><?php echo $month; ?></h6>
    <p><?php the_field( 'tue_date' ); ?></p>

  </div>

</button>
