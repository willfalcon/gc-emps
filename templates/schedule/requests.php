<?php

$currentEmp = wp_get_current_user();
$empID = $currentEmp->ID;
$acfEmpID = 'user_' . $empID;

?>

<a class="gc-request-link btn btn-outline-secondary" data-toggle="collapse" href="#requests" aria-expanded="false" aria-controls="requests">
  Requests
</a>

<div class="collapse" id="requests">

  <?php if ( have_rows( 'requests', $acfEmpID ) ) : ?>

    <ul class="list-group">

      <?php

        while( have_rows( 'requests', $acfEmpID ) ) : the_row();

          $requestFrom = get_sub_field( 'req_date_from' );
          $requestTo = get_sub_field( 'req_date_to' );


          if ( get_row_index() == 1 ) {
            $requestMonth = substr( $requestFrom, 18 );
          } else {
            if ( $requestMonth != substr( $requestFrom, 18 ) ) {
              $requestMonth = substr( $requestFrom, 18 );
            }
          }

          $requestFromDay = substr( $requestFrom, 0, 3 );
          $requestFromDate = substr( $requestFrom, 4, 2 );
          $requestFromTime = substr( $requestFrom, 8, 9 );

          $requestToDay = substr( $requestTo, 0, 3 );
          $requestToDate = substr( $requestTo, 4, 2 );
          $requestToTime = substr( $requestTo, 8, 9 );

          if ( $requestMonth ) :
            ?>

            <li class="list-group-item">
              <b><?php echo $requestMonth; ?></b>
            </li>

            <?php
          endif;

        ?>

        <li class="list-group-item gc-schedule-list">
          <div class="gc-request-block">

            <div class="gc-date-block-top">
              <?php echo $requestFromDay . ' ' . $requestFromDate . ' - ' . $requestToDay . ' ' . $requestToDate; ?>
            </div>

          <?php if ( get_sub_field( 'req_type' ) == 'req_type_off' ) : ?>
            <div class="gc-req-block-off">
          <?php elseif ( get_sub_field( 'req_type' ) == 'req_type_work' ) : ?>
            <div class="gc-req-block-work">
          <?php endif; ?>

              <?php echo $requestFromTime . ' - ' . $requestToTime; ?>

            </div>

          </div>
        </li>

      <?php endwhile; ?>

    </ul>


  <?php endif; ?>

    <button type="button" class="btn btn-outline-secondary gc-add-edit-btn" data-toggle="modal" data-target="#edit_requests">
      Add/Edit Requests
    </button>

    <div class="modal fade" id="edit_requests" tabindex="-1" role="dialog" aria-labelledby="edit_requests" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title gc-modal-title" id="editRequestsLabel">Add/Edit Requests</h4>
          </div>
          <div class="modal-body">
            <?php
              $formRequest = array(
                'post_id' => $acfEmpID,
                'fields' => array( 'field_59c69e048e2e5' ),
                'html_submit_button'	=> '<button class="btn btn-outline-secondary"><input type="submit" value="%s" /></button>',
                'updated_message' => false
              );
              acf_form( $formRequest );
            ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
