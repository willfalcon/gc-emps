<?php

  function cptui_register_my_cpts() {

  	/**
  	 * Post Type: Messages.
  	 */

  	$labels = array(
  		"name" => __( "Messages", "gc-employees" ),
  		"singular_name" => __( "Message", "gc-employees" ),
  	);

  	$args = array(
  		"label" => __( "Messages", "gc-employees" ),
  		"labels" => $labels,
  		"description" => "",
  		"public" => true,
  		"publicly_queryable" => true,
  		"show_ui" => true,
  		"show_in_rest" => false,
  		"rest_base" => "",
  		"has_archive" => false,
  		"show_in_menu" => true,
  		"exclude_from_search" => false,
  		"capability_type" => "post",
  		"map_meta_cap" => true,
  		"hierarchical" => false,
  		"rewrite" => array( "slug" => "bulletin", "with_front" => true ),
  		"query_var" => true,
  		"supports" => array( "title", "editor", "thumbnail", "comments" ),
  	);

  	register_post_type( "bulletin", $args );

  	/**
  	 * Post Type: Weekly Schedules.
  	 */

  	$labels = array(
  		"name" => __( "Weekly Schedules", "gc-employees" ),
  		"singular_name" => __( "Weekly Schedule", "gc-employees" ),
  	);

  	$args = array(
  		"label" => __( "Weekly Schedules", "gc-employees" ),
  		"labels" => $labels,
  		"description" => "",
  		"public" => true,
  		"publicly_queryable" => true,
  		"show_ui" => true,
  		"show_in_rest" => false,
  		"rest_base" => "",
  		"has_archive" => false,
  		"show_in_menu" => true,
  		"exclude_from_search" => false,
  		"capability_type" => "post",
  		"map_meta_cap" => true,
  		"hierarchical" => false,
  		"rewrite" => array( "slug" => "weekly_schedule", "with_front" => true ),
  		"query_var" => true,
  		"supports" => array( "title", "editor", "thumbnail" ),
  	);

  	register_post_type( "weekly_schedule", $args );
  }

  add_action( 'init', 'cptui_register_my_cpts' );

?>
