<div class="col-10">
  <div class="gc-card gc-card-emp-schedule">

<?php

  $empID = get_field( 'logged_in_employee_id' );


  if ( have_rows( 'schedule', 'option' ) ) :

?>

    <?php
        /*
          My Schedule
        */
    ?>

      <ul class="list-group">

        <?php

          while ( have_rows( 'schedule', 'option' ) ) : the_row();

            $sched = get_sub_field( 'sched_date' );

            $schedDay = substr( $sched, 0, 3 );
            $schedDate = substr( $sched, -2 );
            $schedMonth = substr( $sched, 4, -3 );


            if ( get_row_index() == 1 ) :
              $currMonth = $schedMonth; ?>
              <li class="list-group-item">
                <b><?php echo $schedMonth; ?></b>
              </li>
            <?php endif;

            if ( $schedMonth != $currMonth ) :
                 $currMonth = $schedMonth; ?>
             <li class="list-group-item">
               <b><?php echo $schedMonth; ?></b>
             </li>
           <?php endif; ?>
           <li class="list-group-item gc-schedule-list">
             <div class="gc-date-block">
               <div class="gc-date-block-top">
                 <?php echo $schedDay; ?>
               </div>
               <div class="gc-date-block-bottom">
                 <?php echo $schedDate; ?>
               </div>
             </div>

             <?php if ( have_rows( 'shifts', 'option' ) ) : ?>
               <div>

          <?php
              while ( have_rows( 'shifts', 'option' ) ) : the_row();

            $emp = get_sub_field( 'employee' );

                ?>

                  <div class="gc-schedule-item">
                   <strong><?php gc_display_name( $emp->ID ); ?>:</strong> <?php the_sub_field( 'start_time' ); ?> - <?php the_sub_field( 'end_time' ); ?>
                 </div>

              <?php endwhile; ?>
            </div>

          <?php endif; ?>

        </li>

        <?php endwhile; ?>

      </ul>
    </div>


    <a class="gc-request-link" href="edit-schedule">
      <button class="btn btn-outline-secondary">
        Edit Schedule
      </button>
    </a>

  </div>

<?php

 endif;

?>

</div>
</div>
