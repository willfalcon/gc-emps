<nav class="navbar navbar-light gc-navbar">
  <div class="gc-emp-nav-logo navbar-brand">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-black.png" alt="Good Citizen Logo" class="img-fluid">
  </div>
  <div class="gc-exit-container">
      <a href="<?php wp_logout_url( home_url() ); ?>" class="gc-exit-button btn btn-danger"><i class="fa fa-times fa-2x"></i></a>
  </div>
</nav>
