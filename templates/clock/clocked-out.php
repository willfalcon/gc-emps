<?php

  $clockOut = esc_html( $_POST['emp_clock_out'] );

  if ( $clockOut == 'Y' ) {

    $currentEmp = wp_get_current_user();
    $loggedInEmpID = $currentEmp->ID;
    $acfEmpID = 'user_' . $loggedInEmpID;
    $timeID = get_field( 'time_id', $acfEmpID );

    if ( have_rows( 'clocked_in_employees' ) ) : while ( have_rows( 'clocked_in_employees' ) ) : the_row();

      if ( get_sub_field( 'current_timestamp_id' ) == $timeID ) {

        $deleteRow = get_row_index();
        $clockInTime = get_sub_field( 'current_clock_in_time');
        $clockInHour = get_sub_field( 'clock_in_hour', false );
        $clockInMinute = get_sub_field( 'clock_in_minute', false );
        $clockOutTime = date_i18n( 'H:i:s' );
        $clockOutHour = date_i18n( 'H' );
        $clockOutMinute = date_i18n( 'i' );


        $clockInMinute += $clockInHour * 60;

        $clockOutMinute += $clockOutHour * 60;

        $dif = $clockOutMinute - $clockInMinute;

        $difdec = $dif / 60;

        if ( $difdec >= 0 && $difdec < 1 ) {
          $n = 0;
        } elseif ( $difdec >= 1 && $difdec < 2 ) {
          $n = 1;
        } elseif ( $difdec >= 2 && $difdec < 3 ) {
          $n = 2;
        } elseif ( $difdec >= 3 && $difdec < 4 ) {
          $n = 3;
        } elseif ( $difdec >= 4 && $difdec < 5 ) {
          $n = 4;
        } elseif ( $difdec >= 5 && $difdec < 6 ) {
          $n = 5;
        } elseif ( $difdec >= 6 && $difdec < 7 ) {
          $n = 6;
        } elseif ( $difdec >= 7 && $difdec < 8 ) {
          $n = 7;
        } elseif ( $difdec >= 8 && $difdec < 9 ) {
          $n = 8;
        } elseif ( $difdec >= 9 && $difdec < 10 ) {
          $n = 9;
        } elseif ( $difdec >= 10 && $difdec < 11 ) {
          $n = 10;
        } elseif ( $difdec >= 11 && $difdec < 12 ) {
          $n = 11;
        } elseif ( $difdec >= 12 && $difdec < 13 ) {
          $n = 12;
        }

        $difh = $n;
        $difmdec = $difdec - $n;
        $difm = $difmdec * 60;

        //$timeElapsed = gc_get_time_elapsed( $clockInHour, $clockInMinute, $clockOutHour, $clockOutMinute );

        $timestamp = array(
          'id' => get_sub_field( 'current_timestamp_id' ),
          'date' => date_i18n('Ymd'),
          'clocked_in' => $clockInTime,
          'clocked_out' => $clockOutTime,
          'hours' => $difh,
          'minutes' => $difm
        );

        add_row( 'timesheet', $timestamp, $acfEmpID );
        update_field( 'is_clocked_in', false, $acfEmpID );
        delete_row( 'clocked_in_employees', $deleteRow );

      }

    endwhile; endif;



  }

?>

<form name="emp-clock-in-form" method="post" action="">
 <input type="hidden" name="emp_clock_in" value="Y">
 <button type="submit" class="btn btn-outline-success btn-lg mt-5">Clock In</button>
</form>

<h5 class="mt-5">Time this shift: <?php echo $difh . ' hours, ' . $difm . ' minutes.'; ?></h5>
