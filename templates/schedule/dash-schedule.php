<?php

  $currentEmp = wp_get_current_user();
  $currentEmpID = $currentEmp->ID;
  $yesterday = strtotime( 'Yesterday' );

  $empScheduleArgs = array(
    'post_type' => 'weekly_schedule',
    'order' => 'ASC'
  );

  $query = new WP_Query( $empScheduleArgs );

?>

<div class="gc-dashboard-module gc-card">

  <h4 class="text-center">My Schedule</h4>

  <ul class="list-group">

  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

    <?php
                      /*======================*/
                      /*=== Tuesday Shifts ===*/
                      /*======================*/

      $tueShiftDate = get_field( 'tue_date', false, false );
      $tueShiftDateUnix = strtotime( $tueShiftDate );

      if ( have_rows( 'tue_shifts' ) && ( $tueShiftDateUnix > $yesterday ) ) :

        while ( have_rows( 'tue_shifts' ) ) : the_row();

        $emp = get_sub_field( 'employee' );

        if ( $emp['ID'] == $currentEmpID ) :

          $hadShifts = true;

          if ( empty( $currMonth ) ) {

            $firstDate = get_field( 'tue_date', false, false );
            $currMonth = gcGetFullMonth( $firstDate );
            ?>

            <li class="list-group-item">
              <b><?php echo $currMonth; ?></b>
            </li>

            <?php

          }

          $schedMonth = gcGetFullMonth( get_field( 'tue_date', false, false ) );

          if ( $schedMonth != $currMonth ) {
            $currMonth = $schedMonth;
            ?>

            <li class="list-group-item">
              <b><?php echo $currMonth; ?></b>
            </li>

            <?php
          }
          ?>

          <li class="list-group-item gc-schedule-list">
            <div class="gc-date-block">
              <div class="gc-date-block-top">
                Tue
              </div>
              <div class="gc-date-block-bottom">
                <?php the_field( 'tue_date' ); ?>
              </div>
            </div>
            <div class="gc-schedule-item">
             <?php the_sub_field( 'from_time' ); ?> - <?php the_sub_field( 'to_time' ); ?>
           </div>
          </li>

        <?php

        endif;

      endwhile; endif;

                          /*========================*/
                          /*=== Wednesday Shifts ===*/
                          /*========================*/

      $wedShiftDate = get_field( 'wed_date', false, false );
      $wedShiftDateUnix = strtotime( $wedShiftDate );

      if ( have_rows( 'wed_shifts' )  && ( $wedShiftDateUnix > $yesterday ) ) :
          while ( have_rows( 'wed_shifts' ) ) : the_row();

        $emp = get_sub_field( 'employee' );

        if ( $emp['ID'] == $currentEmpID ) :

          $hadShifts = true;

          if ( empty( $currMonth ) ) {

            $currMonth = gcGetFullMonth( get_field( 'wed_date', false, false ) );

            ?>

            <li class="list-group-item">
              <b><?php echo $currMonth; ?></b>
            </li>

            <?php

          }

          $schedMonth = gcGetFullMonth( get_field( 'wed_date', false, false ) );

          if ( $schedMonth != $currMonth ) {
            $currMonth = $schedMonth;
            ?>

            <li class="list-group-item">
              <b><?php echo $currMonth; ?></b>
            </li>

            <?php
          }
          ?>

          <li class="list-group-item gc-schedule-list">
            <div class="gc-date-block">
              <div class="gc-date-block-top">
                Wed
              </div>
              <div class="gc-date-block-bottom">
                <?php the_field( 'wed_date' ); ?>
              </div>
            </div>
            <div class="gc-schedule-item">
             <?php the_sub_field( 'from_time' ); ?> - <?php the_sub_field( 'to_time' ); ?>
           </div>
          </li>

        <?php

        endif;

      endwhile; endif;

                              /*=======================*/
                              /*=== Thursday Shifts ===*/
                              /*=======================*/

      $thuShiftDate = get_field( 'thu_date', false, false );
      $thuShiftDateUnix = strtotime( $thuShiftDate );

      if ( have_rows( 'thu_shifts' ) && ( $thuShiftDateUnix > $yesterday ) ) :
        while ( have_rows( 'thu_shifts' ) ) : the_row();

        $emp = get_sub_field( 'employee' );

        if ( $emp['ID'] == $currentEmpID ) :

          $hadShifts = true;

          if ( empty( $currMonth ) ) {

            $currMonth = gcGetFullMonth( get_field( 'thu_date', false, false ) );

            ?>

            <li class="list-group-item">
              <b><?php echo $currMonth; ?></b>
            </li>

            <?php

          }

          $schedMonth = gcGetFullMonth( get_field( 'thu_date', false, false ) );

          if ( $schedMonth != $currMonth ) {
            $currMonth = $schedMonth;
            ?>

            <li class="list-group-item">
              <b><?php echo $currMonth; ?></b>
            </li>

            <?php
          }
          ?>

          <li class="list-group-item gc-schedule-list">
            <div class="gc-date-block">
              <div class="gc-date-block-top">
                Thu
              </div>
              <div class="gc-date-block-bottom">
                <?php the_field( 'thu_date' ); ?>
              </div>
            </div>
            <div class="gc-schedule-item">
             <?php the_sub_field( 'from_time' ); ?> - <?php the_sub_field( 'to_time' ); ?>
           </div>
          </li>

        <?php

        endif;

      endwhile; endif;

                            /*=====================*/
                            /*=== Friday Shifts ===*/
                            /*=====================*/

      $friShiftDate = get_field( 'fri_date', false, false );
      $friShiftDateUnix = strtotime( $friShiftDate );

      if ( have_rows( 'fri_shifts' ) && ( $friShiftDateUnix > $yesterday ) ) :

        while ( have_rows( 'fri_shifts' ) ) : the_row();

        $emp = get_sub_field( 'employee' );

        if ( $emp['ID'] == $currentEmpID ) :

          $hadShifts = true;

          if ( empty( $currMonth ) ) {

            $currMonth = gcGetFullMonth( get_field( 'fri_date', false, false ) );

            ?>

            <li class="list-group-item">
              <b><?php echo $currMonth; ?></b>
            </li>

            <?php

          }

          $schedMonth = gcGetFullMonth( get_field( 'fri_date', false, false ) );

          if ( $schedMonth != $currMonth ) {
            $currMonth = $schedMonth;
            ?>

            <li class="list-group-item">
              <b><?php echo $currMonth; ?></b>
            </li>

            <?php
          }
          ?>

          <li class="list-group-item gc-schedule-list">
            <div class="gc-date-block">
              <div class="gc-date-block-top">
                Fri
              </div>
              <div class="gc-date-block-bottom">
                <?php the_field( 'fri_date' ); ?>
              </div>
            </div>
            <div class="gc-schedule-item">
             <?php the_sub_field( 'from_time' ); ?> - <?php the_sub_field( 'to_time' ); ?>
           </div>
          </li>

        <?php

        endif;

      endwhile; endif;

                        /*=======================*/
                        /*=== Saturday Shifts ===*/
                        /*=======================*/

      $satShiftDate = get_field( 'sat_date', false, false );
      $satShiftDateUnix = strtotime( $satShiftDate );

      if ( have_rows( 'sat_shifts' ) && ( $satShiftDateUnix > $yesterday ) ) :
        while ( have_rows( 'sat_shifts' ) ) : the_row();

        $emp = get_sub_field( 'employee' );

        if ( $emp['ID'] == $currentEmpID ) :

          $hadShifts = true;

          if ( empty( $currMonth ) ) {

            $currMonth = gcGetFullMonth( get_field( 'sat_date', false, false ) );

            ?>

              <li class="list-group-item">
                <b><?php echo $currMonth; ?></b>
              </li>

            <?php

          }

          $schedMonth = gcGetFullMonth( get_field( 'sat_date', false, false ) );

          if ( $schedMonth != $currMonth ) {
            $currMonth = $schedMonth;
            ?>

              <li class="list-group-item">
                <b><?php echo $currMonth; ?></b>
              </li>

            <?php
          }
            ?>

            <li class="list-group-item gc-schedule-list">
              <div class="gc-date-block">
                <div class="gc-date-block-top">
                  Sat
                </div>
                <div class="gc-date-block-bottom">
                  <?php the_field( 'sat_date' ); ?>
                </div>
              </div>
              <div class="gc-schedule-item">
                <?php the_sub_field( 'from_time' ); ?> - <?php the_sub_field( 'to_time' ); ?>
              </div>
            </li>

            <?php

          endif;

        endwhile; endif;

      ?>

    <?php endwhile; endif; wp_reset_postdata();?>

  </ul>



      <?php get_template_part( '/templates/schedule/requests' ); ?>
