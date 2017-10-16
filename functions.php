<?php

  add_action( 'wp_enqueue_scripts', 'gc_emp_theme_styles' );
  add_action( 'wp_enqueue_scripts', 'gc_emp_theme_scripts' );

  function gc_emp_theme_styles() {
    wp_enqueue_style( 'boostrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Oxygen' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fa/css/font-awesome.min.css' );
    wp_enqueue_style( 'main_styles', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'timepicker_css', get_template_directory_uri() . '/assets/css/jquery.timepicker.min.css', array(), null );
  }

  function gc_emp_theme_scripts() {
    wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', '', '', false );
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery', 'popper' ), '', true );
    wp_enqueue_script( 'gc_js', get_template_directory_uri() . '/assets/js/gc.js', array( 'jquery' ), '', true );

  }

  function gc_excerpt_length( $length ) {
  	return 30;
  }
  add_filter( 'excerpt_length', 'gc_excerpt_length', 999 );


  include_once( get_stylesheet_directory() . '/inc/cpt.php' );


  add_filter('acf/settings/path', 'my_acf_settings_path');

  function my_acf_settings_path( $path ) {
      $path = get_stylesheet_directory() . '/inc/acf/';
      return $path;
  }

  add_filter('acf/settings/dir', 'my_acf_settings_dir');

  function my_acf_settings_dir( $dir ) {
      $dir = get_stylesheet_directory_uri() . '/inc/acf/';
      return $dir;
  }

  add_filter('acf/settings/show_admin', '__return_false');
  include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );
  include_once( get_stylesheet_directory() . '/inc/fields.php' );


  include get_parent_theme_file_path( '/inc/employees.php' );

  function pin_login() {

    if ( isset( $_POST['gc_emp_pin'] ) ) {


      $enteredPin = esc_html( $_POST['gc_emp_pin'] ) ;

      $args = array(
        'role__in' => array(
          'Administrator',
          'Employee'
        )
      );

      // The Query
      $user_query = new WP_User_Query( $args );

      // User Loop
      if ( ! empty( $user_query->results ) ) {

        $loginSuccess = false;

      	foreach ( $user_query->results as $user ) {

          $userID = $user->ID;
          $empPIN = get_field( 'employee_pin', 'user_' . $userID );

          if ( $empPIN == $enteredPin ) {
            $loginSuccess = true;
            wp_set_current_user( $userID, $user->user_login );
            wp_set_auth_cookie( $userID );
            do_action( 'wp_login', $user->user_login );

            break;
          }

        }

        if ( ! $loginSuccess ) {
          wp_redirect( home_url() . '?login_failed=true' );
          exit;
        }
      }
    }
  }

  add_action( 'after_setup_theme', 'pin_login' );


  function gc_add_new_employee( $post_id ) {

    if( empty($_POST['acf']) ) {

         return;

     }

    $fields = $_POST['acf'];

    if ( ! empty( $fields['field_59c59909bca46'] ) ) {

    }
    // get the user name field
    $name = get_field('field_59dfa8814f1ae', $post_id);
    $pin = get_field('field_59c59909bca46', $post_id);

    $newEmp = array(
      'user_login' => $name,
      'user_pass' => $pin,
      'role' => 'employee'
    );

    // create the user
    wp_insert_user( $newEmp );

    // delete the unused post
    wp_delete_post($post_id);

}

// run after ACF saves the $_POST['acf'] data
add_action('acf/save_post', 'gc_add_new_employee', 20);


?>
