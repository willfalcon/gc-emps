<?php

$currentEmp = wp_get_current_user();
$currentEmpID = $currentEmp->ID;
$acfEmpID = 'user_' . $currentEmpID;
$isAdmin = get_field( 'has_timesheet_access', $acfEmpID );

$staffArgs = array(
  'role__in' => array(
    'Administrator',
    'Employee'
  )
);

$staffQuery = new WP_User_Query( $staffArgs );

 ?>

<div class="gc-mt-15 gc-staff-list">

  <?php if ( ! empty( $staffQuery->results ) ) : ?>

    <div id="accordion" role="tablist">

      <?php foreach ( $staffQuery->results as $user ) : ?>

        <?php
          $acfEmpID = 'user_' . $user->ID;
          $pic = get_field( 'picture', $acfEmpID );
        ?>

        <div class="my-2">

          <a data-toggle="collapse" href="#empCollapse<?php echo $user->ID; ?>" aria-expanded="false" aria-controls="empCollapse<?php echo $user->ID; ?>">

            <div class="gc-card gc-staff-list-item" role="tab" id="empHeading<?php echo $user->ID; ?>">

                <h4 class="gc-emp-list-name text-center"><?php gc_display_name( $user->ID ); ?></h4>

            </div>
              </a>

          <div class="gc-card collapse gc-emp-collapse mt-2" id="empCollapse<?php echo $user->ID; ?>" role="tabpanel" aria-labelledby="empHeading<?php echo $user->ID; ?>" data-parent="#accordion">
            <div class="card-body">
              <?php if ( ! empty( $pic ) ) : ?>
                <div class="width-100">
                  <img src="<?php echo $pic['url']; ?>" alt="<?php echo $pic['alt']; ?>" class="img-fluid rounded-circle gc-emp-pic"/>
                </div>
              <?php endif; ?>
              <?php if ( get_field( 'phone', $acfEmpID ) ) : ?><p class="pl-md-5 pt-5"><b>Phone:</b> <?php the_field( 'phone', $acfEmpID ); ?></p><?php endif; ?>
              <?php if ( get_field( 'email', $acfEmpID ) ) : ?><p class="pl-md-5"><b>Email:</b> <?php the_field( 'email', $acfEmpID ); ?></p><?php endif; ?>

              <?php if ( $isAdmin ) : ?>
                <div class="width-100">
                  <button type="button" class="btn btn-outline-secondary gc-edit-emp-btn" data-toggle="modal" data-target="#admin_edit_emp_<?php echo $user->ID; ?>">
                    Edit Employee
                  </button>
              </div>
              <?php endif; ?>
            </div>
          </div>

        </div>


    <?php if ( $isAdmin ) : ?>
      <div class="modal fade" id="admin_edit_emp_<?php echo $user->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="admin_edit_emp_<?php echo $user->ID; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <?php
                $adminEmpEditForm = array(
                  'id' => 'edit_emp_' . $user->ID,
                  'post_id' => 'user_' . $user->ID,
                  'fields'=> array(
                    'field_59c59909bca46',
                    'field_59c5c80675f52',
                    'field_59c5992dbca47',
                    'field_59c5ca263e7f1',
                    'field_59d4805cb7c89',
                    'field_59d4808cb7c8a',
                    'field_59d4816cb7c8b'
                  ),
                  'submit_value' => 'Save Changes',
                  'html_submit_button'	=> '<input type="submit" class="btn btn-outline-secondary" value="%s" />',
                  'updated_message' => false
                );

                acf_form( $adminEmpEditForm );

              ?>

              <div class="gc-delete-emp">
                <button class="btn btn-outline-danger gc-delete-emp-btn gc-delete-emp-start-<?php echo $user->ID; ?>" onclick="gcDeleteEmpStart(<?php echo $user->ID; ?>)">
                  Delete Employee
                </button>
                <form class="d-none fade gc-delete-emp-<?php echo $user->ID; ?>" name="gc-delete-emp-<?php echo $user->ID; ?>" method="post" action="">
                  <input type="hidden" name="emp_to_delete" value="<?php echo $user->ID; ?>">
                  <button type="submit" class="btn btn-outline-secondary gc-delete-emp-btn">Confirm Delete</button>
                </form>
              </div>


            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

  <?php endforeach; ?>

    </div>
  <?php endif; wp_reset_postdata(); ?>

</div>
