<?php

if ( isset( $_POST['shift_added'] ) ) {

  $shiftAdded = esc_html( $_POST['shift_added'] );

  if ( $shiftAdded == 'Y' ) {

    if ( ! isset( $_POST['employeeSelect'] ) ) {

      $errorMessage = 'Hold up. You forgot to pick who\'s working that shift. You did mean to do that, right?';

    } else {

      $shiftDate = esc_html( $_POST['date_of_shift'] );
      $selectedEmployee = esc_html( $_POST['employeeSelect'] );
      $enteredFromTime = esc_html( $_POST['fromTime'] );
      $enteredToTime = esc_html( $_POST['toTime'] );

      $fromAmPm = substr( $enteredFromTime, -2 );
      $toAmPm = substr( $enteredToTime, -2 );
      $fromMinutes = substr( $enteredFromTime, -5, 2 );
      $toMinutes = substr( $enteredToTime, -5, 2 );

      $fromHours = gcTwelveToTwentyfourHours( $enteredFromTime );
      $toHours = gcTwelveToTwentyfourHours( $enteredToTime );

      $fixedFromTime = $fromHours . ':' . $fromMinutes . ':' . '00';
      $fixedToTime = $toHours . ':' . $toMinutes . ':' . '00';

      $shiftID = $selectedEmployee . $shiftDate . date_i18n( 'His' );

      if ( have_rows( 'new_schedule', 'option' ) ) : while ( have_rows( 'new_schedule', 'option' ) ) : the_row();

        if ( $shiftDate == get_sub_field( 'tue_date', false ) ) {

            $shiftInfo = array(
              'employee' => $selectedEmployee,
              'from_time' => $fixedFromTime,
              'to_time' => $fixedToTime,
              'shift_id' => $shiftID
            );


            add_sub_row( 'tue_shifts', $shiftInfo );

          }

      endwhile; endif;
    }
  }
}


?>


    <?php if ( isset( $errorMessage ) ) : ?>
      <div class="col-10">
        <div class="gc-mt-15 alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php echo $errorMessage; ?>
        </div>
      </div>
    <?php endif; ?>
