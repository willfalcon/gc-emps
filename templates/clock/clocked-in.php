<?php

  $clockIn = esc_html( $_POST['emp_clock_in'] );

  if ( $clockIn == 'Y' ) {

    $currentEmp = wp_get_current_user();
    $loggedInEmp = $currentEmp->user_login;
    $loggedInEmpID = $currentEmp->ID;
    $acfEmpID = 'user_' . $loggedInEmpID;
    $loggedInEmpPIN = get_field( 'employee_pin', $acfEmpID );

    $time_id = $loggedInEmpID . date_i18n( 'Ymd' ) . date_i18n( 'H:i:s' );

    $empClockIn = array(
      'clocked_in_employee' => $loggedInEmp,
      'clocked_in_employee_pin' => $loggedInEmpPIN,
      'current_timestamp_id' => $time_id,
      'current_clock_in_time' => date_i18n( 'H:i:s' ),
      'clock_in_hour' => date_i18n( 'H' ),
      'clock_in_minute' => date_i18n( 'i' )
    );

    add_row( 'clocked_in_employees', $empClockIn );

    update_field( 'is_clocked_in', true, $acfEmpID );
    update_field( 'time_id', $time_id, $acfEmpID );
  }

?>


<form name="emp-clock-out-form" method="post" action="">
  <input type="hidden" name="emp_clock_out" value="Y">
  <button type="submit" class="btn btn-outline-danger btn-lg mt-5">Clock Out</button>
</form>
