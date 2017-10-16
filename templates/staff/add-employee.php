<div class="gc-new-emp">
  <button type="button" class="btn btn-outline-secondary gc-edit-emp-btn" data-toggle="modal" data-target="#add_employee">
    New Employee
  </button>
</div>

<div class="modal fade" id="add_employee" tabindex="-1" role="dialog" aria-labelledby="add_employee" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php
          $addEmployeeForm = array(
            'id' => 'add_employee_form',
            'post_id' => 'new_post',
            'new_post' => array(
              'post_type' => 'employee',
              'post_status' => 'publish'
            ),
            'fields'=> array(
              'field_59dfa8814f1ae',
              'field_59c5ca263e7f1',
              'field_59d4805cb7c89',
              'field_59d4808cb7c8a',
              'field_59d4816cb7c8b',
              'field_59c59909bca46',
              'field_59c5992dbca47',
              'field_59c5c80675f52'
            ),
            'submit_value' => 'Add Employee',
            'html_submit_button'	=> '<input type="submit" class="btn btn-outline-secondary" value="%s" />',
            'updated_message' => false
          );

          acf_form( $addEmployeeForm );
        ?>

      </div>
    </div>
  </div>
</div>
