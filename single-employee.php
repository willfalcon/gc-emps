<?php
  acf_form_head();
  get_header( 'dashboard' );
?>

  <div class="row">

    <?php get_template_part( '/templates/dashboard', 'menu' ); ?>

      <div class="col-10">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <h3 class="text-center"><?php the_title(); ?></h3>

          <?php if ( have_rows( 'timesheet' ) ) : ?>

            <table>
              <thead>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Time This Shift</th>
              </thead>
              <tbody>

            <?php while ( have_rows( 'timesheet' ) ) : the_row(); ?>

                <tr>
                  <td><?php the_sub_field( 'date' ); ?></td>
                  <td><?php the_sub_field( 'clocked_in' ); ?></td>
                  <td><?php the_sub_field( 'clocked_out' ); ?></td>
                </tr>

          <?php  endwhile; ?>
        </tbody>
          </table>

      <?php  endif;

          endwhile; endif;

        ?>

      </div>

  </div>


 <?php get_footer();?>
