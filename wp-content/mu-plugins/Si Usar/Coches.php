<?php
/*
Plugin Name: Coches
Plugin URI: http://isaacdomingo.com/
Description: Pluigin para añadir el postype Coche.
Version: 0.1
Author: Isaac Domingo Ramírez
Author URI: http://isaacdomingo.com
License: GPLv2 o posterior
*/
// Función para crear una taxonomía
function create_posttype() {
  register_post_type( 'coches_desguace',
    array(
      'labels' => array(
        'name' => __( 'Coches' ),
        'singular_name' => __( 'coche' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'coches'),
    )
  );
}
add_action( 'init', 'create_posttype' )
?>
