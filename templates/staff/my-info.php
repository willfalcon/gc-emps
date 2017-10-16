<?php

  $loggedInEmp = get_field( 'logged_in_employee_id', 11 );
  $userID = get_current_user_id();

  $empInfoForm = array(
    'id' => 'edit_emp_' . $loggedInEmp,
    'fields'=> array(
      'field_59c5ca263e7f1',
      'field_59d4805cb7c89',
      'field_59d4808cb7c8a',
      'field_59d4816cb7c8b'
    ),
    'post_id' => 'user_' . $userID,
    'submit_value' => 'Save Changes',
    'html_submit_button'	=> '<input type="submit" class="btn btn-outline-secondary" value="%s" />',
    'updated_message' => false
  );

?>


<div class="gc-mt-15 gc-card gc-emp-profile">
  <h4 class="text-center pt-2">My Info</h4>
  <?php acf_form( $empInfoForm ); ?>
</div>
