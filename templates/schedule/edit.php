

<button type="button" class="gc-edit-week" data-toggle="modal" data-target="#edit-week-<?php echo $post->ID; ?>">
  <i class="fa fa-pencil-square-o fa-lg"></i>
</button>

<div class="modal fade" id="edit-week-<?php echo $post->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="editWeek" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content gc-edit-week-modal">

      <div class="modal-header">
        <h5 class="modal-title gc-week-header">Edit Week</h5>
      </div>

      <div class="modal-body">

        <?php

          $editWeek = array(
            'id' => 'edit_week_' . $post->ID,
            'post_title' => true,
            'fields' => array(
              'field_59d3a2cf72b0f',
              'field_59d3a2cf72b5d',
              'field_59d3a2cf72b83',
              'field_59d3a2cf72bbf',
              'field_59d3a2cf72bf2'
            ),
            'post_id' => $post->ID,
            'submit_value' => 'Save Changes',
            'html_submit_button'	=> '<input type="submit" class="btn btn-outline-secondary" value="%s" />',
            'updated_message' => false
          );

          acf_form( $editWeek );

        ?>

      </div>
    </div>
  </div>
</div>
