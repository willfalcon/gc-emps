<?php

  if ( isset( $_POST['emp_to_delete'] ) ) {
    require_once( ABSPATH . 'wp-admin/includes/user.php' );
    $empToDelete = $_POST['emp_to_delete'];
    wp_delete_user( $empToDelete );

  }

  $currentEmp = wp_get_current_user();
  $empID = $currentEmp->ID;
  $acfEmpID = 'user_' . $empID;
  $isAdmin = get_field( 'has_timesheet_access', $acfEmpID );

?>

<div class="col-12 col-md-6">

  <?php get_template_part( '/templates/staff/my-info' ); ?>

</div>


<div class="col-12 col-md-6">

  <?php

    get_template_part( '/templates/staff/staff-list' );

    if ( $isAdmin ) :

      get_template_part( '/templates/staff/add-employee' );

    endif;

  ?>

</div>
