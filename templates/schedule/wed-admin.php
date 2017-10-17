<?php

  $rawDate = get_field( 'wed_date', false, false );

  $month = gcGetFullMonth( $rawDate );
  $month = substr($month, 0, 3) . '<span class="mobile-hide">' . substr($month, 3) . '</span>';

?>

<div class="modal fade" id="sched-modal-<?php echo $rawDate; ?>" tabindex="-1" role="dialog" aria-labelledby="wed_<?php echo $month . '_'; the_field( 'wed_date' ); ?>_label" aria-hidden="true">
  <div class="modal-dialog gc-shifts-modal" role="document">
    <div class="modal-content">

      <div class="modal-header gc-week-header">
        <h5 class="modal-title">Wednesday, <?php echo $month . ' '; the_field( 'wed_date' ); ?></h5>
      </div>

      <div class="modal-body">
        <div class="gc-sched-shifts">

          <?php

            $shiftOptions = array(
              'id' => 'add_shifts_' . $rawDate,
              'fields' => array(
                'field_59d3a2cf72b6d'
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

    <h5 class="mobile-hide">Wednesday</h5>
    <h6><?php echo $month; ?></h6>
    <p><?php the_field( 'wed_date' ); ?></p>

  </div>

</button>
