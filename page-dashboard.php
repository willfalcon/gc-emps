<?php

  acf_form_head();
  get_header( 'dashboard' );

  $empID = get_field( 'logged_in_employee_id' );
  $isAdmin = get_field( 'has_timesheet_access', $empID );

?>

<div class="col-12 col-md-6 col-xl-8 gc-mt-15">
  <div class="row">
    <div class="col-12 col-xl-6">
      <?php get_template_part( '/templates/clock/welcome' ); ?>
    </div>
    <div class="col-12 col-xl-6">
      <?php get_template_part( '/templates/bulletin' ); ?>
    </div>
  </div>
</div>

<div class="col-12 col-md-6 col-xl-4 gc-mt-15 gc-dash-right">
    <?php get_template_part( '/templates/schedule/dash-schedule' ); ?>
</div>


<?php get_footer(); ?>
