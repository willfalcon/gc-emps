<?php

  $currentEmp = wp_get_current_user();
  $loggedInEmpID = $currentEmp->ID;
  $date = date_i18n( 'l, F j, Y' );

?>


<div class="gc-card gc-dashboard-module">

  <h3><?php gc_greeting(); gc_display_name( $loggedInEmpID ); ?>!</h3>

  <h5 class="my-3"><?php echo $date; ?></h5>
  
  <?php

    if ( isset( $_POST['emp_clock_in'] ) ) {

      get_template_part( '/templates/clock/clocked-in' );

    } elseif ( isset( $_POST['emp_clock_out'] ) ) {

      get_template_part( '/templates/clock/clocked-out' );

    } else {

      get_template_part( '/templates/clock/logged-in' );

    }

  ?>

</div>
