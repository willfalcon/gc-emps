
<?php

  $loginFailed = false;
  if ( isset( $_GET['login_failed'] ) ) :

    $loginstatus = $_GET['login_failed'];

    if ( $loginstatus == 'true' ) {
      $loginFailed = true;
    }

  endif;


  get_header();

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


  <div class="gc-emp-login-logo">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-white.png" alt="Good Citizen Logo" class="img-fluid">
  </div>

      <div class="gc-emp-card">

        <?php if ( $loginFailed ) : ?>

          <div class="alert alert-danger alert-dismissible gc-login-failed fade show" role="alert">
            <p>That PIN won't get you anywhere!</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        <?php endif; ?>


        <form name="gc_emp_login_form" method="post" action="<?php bloginfo('url'); ?>/dashboard/" class="gc-emp-login-form">

          <input type="hidden" name="gc_emp_login_submitted" value="Y">

          <input type="number" class="form-control gc-emp-password" name="gc_emp_pin" id="exampleInputPassword1" placeholder="PIN">

          <button id="gc-login" class="form-control btn btn-outline-secondary gc-login-btn" type="submit">Login</button>
        </form>

      </div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
