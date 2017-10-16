<?php

  $empPostID = get_current_user_id();
  $date = date_i18n( 'l, F j, Y' );
  $empIsClockedIn = get_field( 'is_clocked_in', 'user_' . $empPostID );

?>

<?php if ( $empIsClockedIn ) : ?>

  <form name="emp-clock-out-form" method="post" action="">
    <input type="hidden" name="emp_clock_out" value="Y">
    <button type="submit" class="btn btn-outline-danger btn-lg mt-5">Clock Out</button>
  </form>

<?php else : ?>

<form name="emp-clock-in-form" method="post" action="">
  <input type="hidden" name="emp_clock_in" value="Y">
  <button type="submit" class="btn btn-outline-success btn-lg my-3">Clock In</button>
</form>

<?php endif; ?>
