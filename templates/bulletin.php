<?php

  if ( isset( $_POST['id_to_delete'] ) ) {

    $postToDelete = $_POST['id_to_delete'];

    wp_delete_post( $postToDelete );

  }

?>

<div class="gc-dashboard-module gc-card mt-4">

  <h3 class="text-center mb-4">Bulletin</h3>

  <?php

    $currentEmp = wp_get_current_user();
    $empID = $currentEmp->ID;
    $acfEmpID = 'user_' . $empID;
    $isAdmin = get_field( 'has_timesheet_access', $acfEmpID );


    if ( $isAdmin ) {

      $args = array(
        'post_type'   => 'bulletin',
        'meta_query'  => array(
          'relation'    => 'OR',
          array(
            'key'       => 'send_to',
            'value'     => 'everyone'
          ),
          array(
            'key'       => 'send_to',
            'value'     => 'admin_only'
          ),
          array(
            'relation'    => 'AND',
            array(
              'key'       => 'send_to',
              'value'     => 'specific_emps'
            ),
            array(
              'key'       => 'rec_picker',
              'value'     => $acfEmpID
            )
          )
        )
      );

    } else {

      $args = array(
        'post_type'   => 'bulletin',
        'meta_query'  => array(
          'relation'    => 'OR',
          array(
            'key'       => 'send_to',
            'value'     => 'everyone'
          ),
          array(
            'relation'    => 'AND',
            array(
              'key'       => 'send_to',
              'value'     => 'specific_emps'
            ),
            array(
              'key'       => 'rec_picker',
              'value'     => $acfEmpID
            )
          )
        )
      );
    }

    $query = new WP_Query( $args );

    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();


      if ( $isAdmin ) : ?>
        <div class="d-flex justify-content-between">
          <h5><?php the_title(); ?></h5>

          <button id="delete-bulletin-<?php echo $post->ID; ?>" onclick="gcDeleteBulStart(<?php echo $post->ID; ?>)" class="fade show">
            <i class="fa fa-times"></i>
          </button>
          <form  id="delete-bulletin-<?php echo $post->ID; ?>-confirm" class="fade d-none" action="" method="post" name="delete-bulletin-form">
            <input type="hidden" name="id_to_delete" value="<?php echo $post->ID; ?>">
            <button type="submit" class="delete-bulletin-confirm text-danger">
              Delete Message?
            </button>
          </form>
        </div>

    <?php else: ?>

      <div class="d-flex justify-content-start">
        <h5><?php the_title(); ?></h5>
      </div>

    <?php endif; ?>

      <h6><strong><?php the_author(); ?></strong></h6>

      <p class="gc-bulletin-excerpt">
        <?php the_excerpt(); ?>
      </p>

      <button type="button" class="gc-bulletin-more-btn" data-toggle="modal" data-target="#bulletin-<?php echo $post->ID; ?>">
        More
      </button>

      <hr>

      <div class="modal fade" id="bulletin-<?php echo $post->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="bulletin-<?php echo $post->ID; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title" id="bulletin-<?php echo $post->ID; ?>-title"><?php the_title(); ?></h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>

            <div class="modal-body">

              <h6>From <strong><?php the_author(); ?></strong> on <?php the_time( 'F j'); ?> at <?php the_time('g:i a'); ?></h6>
              <?php the_content(); ?>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

<?php

    endwhile; endif; wp_reset_postdata();


/*=======================================*/
/*=== Admin Only - New Message Button ===*/
/*=======================================*/

    if ( $isAdmin ) :
  ?>

  <button type="button" class="btn btn-outline-secondary gc-bulletin-new-btn" data-toggle="modal" data-target="#new_message">
    New Message
  </button>

  <div class="modal fade" id="new_message" tabindex="-1" role="dialog" aria-labelledby="new_message" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title">New Message</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">
          <?php

          $newMessage = array(
            'field_groups' => array(
              'group_59cad079d8876'
            ),
            'post_id' => 'new_post',
            'new_post' => array(
              'post_type' => 'bulletin',
              'post_status' => 'publish'
            ),
            'post_title' => true,
            'post_content' => true,
            'submit_value' => 'Send'
          );

          acf_form( $newMessage );

          ?>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

<?php endif; ?>

</div>
