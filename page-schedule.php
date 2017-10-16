<?php

  $currentEmp = wp_get_current_user();
  $empID = $currentEmp->ID;
  $isAdmin = get_field( 'has_timesheet_access', 'user_' . $empID );

  if ( $isAdmin ) {
    acf_form_head();
  }

  get_header( 'dashboard' );

  if ( $isAdmin ) :
    get_template_part( '/templates/schedule/main', 'admin' );
  else :
    get_template_part( '/templates/schedule/main' );
  endif;

   get_footer();

 ?>
