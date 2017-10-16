<div class="gc-dash-left gc-card">

  <div class="gc-emp-nav-logo navbar-brand">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-black.png" alt="Good Citizen Logo" class="img-fluid">
  </div>

  <div class="list-group" id="list-tab" role="tablist">

    <?php

      $currentEmp = wp_get_current_user();
      $empID = $currentEmp->ID;
      $acfEmpID = 'user_' . $empID;
      $isAdmin = get_field( 'has_timesheet_access', $acfEmpID );

    ?>

    <a class="list-group-item" href="dashboard"><i class="fa fa-tachometer fa-lg"></i>  Dashboard</a>

    <a class="list-group-item" href="schedule"><i class="fa fa-calendar fa-lg"></i>  Schedule</a>

    <a class="list-group-item" href="staff"><i class="fa fa-users fa-lg"></i>  Staff</a>

    <?php if ( $isAdmin ) : ?>

      <a class="list-group-item" href="timesheets"><i class="fa fa-table fa-lg"></i>  Timesheets</a>

    <?php endif; ?>

  </div>
</div>
