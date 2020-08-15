<?php
/**
 * Plugin Name: WordPress Test
 * Plugin URI: test.net
 * Description: test custom css on CPT
 * Version: 1.0.0
 * Author: Sanjeev Shrestha
 * Author URI: sanjeev.net
 * License: MIT
 */


function test_post_type() {
  $labels = array(
    'name'                  => _x( 'Courses', 'Post type general name', 'custom' ),
    'singular_name'         => _x( 'Book', 'Post type singular name', 'custom' ),
    'menu_name'             => _x( 'Courses', 'Admin Menu text', 'custom' ),
    'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'custom' )
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'test-courses' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'editor', 'thumbnail')
  );

  register_post_type( 'test-courses', $args );
}

add_action( 'init', 'test_post_type' );


function test_custom_css() {
  wp_enqueue_style( 'test-admin-style', plugins_url('/public/css/test-admin.css', __FILE__), array(), '1.0' );
}
add_action( 'admin_head', 'test_custom_css' );