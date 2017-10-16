<div class="gc-sched-day">
  <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#add_new_week_modal">
    New Week
  </button>
</div>


<div class="modal fade" id="add_new_week_modal" tabindex="-1" role="dialog" aria-labelledby="addNewWeek" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title gc-week-header">New Week</h5>
      </div>

      <div class="modal-body">
        <p>Enter the "title" of the week in this format: MM/DD-MM/DD (Ex: 10/03-10/7). Then select the date for each day of the week below.</p>
        <?php

          $newWeek = array(
            'id' => 'new_week_form',
            'post_title' => true,
            'fields' => array(
              'field_59d3a2cf72b0f',
              'field_59d3a2cf72b5d',
              'field_59d3a2cf72b83',
              'field_59d3a2cf72bbf',
              'field_59d3a2cf72bf2'
            ),
            'post_id' => 'new_post',
            'new_post' => array(
              'post_type' => 'weekly_schedule',
              'post_status' => 'publish'
            ),
            'submit_value' => 'Create New Week',
            'html_submit_button'	=> '<input type="submit" class="btn btn-outline-secondary" value="%s" />',
            'updated_message' => false
          );

          acf_form( $newWeek );

        ?>

      </div>

    </div>
  </div>
</div>
