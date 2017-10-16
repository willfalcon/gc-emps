<?php

  acf_form_head();
  get_header( 'dashboard' );

?>

  <?php get_template_part( '/templates/dashboard', 'center' ); ?>
  <?php get_template_part( '/templates/dashboard', 'right' ); ?>



<?php get_footer(); ?>
