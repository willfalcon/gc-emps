<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>

    <div class="container-fluid px-0">
      <div class="row maxwidth-100 mx-0">
        <div class="col-2 px-0">

          <?php get_template_part( '/templates/dashboard', 'menu' ); ?>

        </div>

        <div class="col-10 px-0">

              <nav class="navbar navbar-light gc-navbar sticky-top">
                <div class="gc-exit-container">
                    <a href="<?php echo wp_logout_url( home_url() ); ?>" class="gc-exit-button btn btn-danger"><i class="fa fa-times fa-2x"></i></a>
                </div>
              </nav>


          <div class="row px-2 px-md-4">
