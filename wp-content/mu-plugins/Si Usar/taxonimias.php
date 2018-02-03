<?php
/*
Plugin Name: Taxonimias
Plugin URI: http://isaacdomingo.com/
Description: Plugin para añadir la taxonimia marca.
Version: 0.1
Author: Isaac Domingo Ramírez
Author URI: http://isaacdomingo.com
License: GPLv2 o posterior
*/
// Función para crear una taxonomía
function crear_taxonomia_jerarquica() {

    // Definimos un array para las traducciones de la taxonomía
    $etiquetas = array(
        'name' => __( 'Marca' ),
        'singular_name' => __( 'Marca' ),
        'search_items' =>  __( 'Buscar marcas' ),
        'all_items' => __( 'Todos las marcas' ),
        'parent_item' => __( 'Marca padre' ),
        'parent_item_colon' => __( 'Marca padre:' ),
        'edit_item' => __( 'Editar marca' ),
        'update_item' => __( 'Actualizar marca' ),
        'add_new_item' => __( 'Agregar un nuevo marca' ),
        'menu_name' => __( 'Marcas' ),
    );


    // Función WordPress para registrar la taxonomía
    register_taxonomy(
        'marcas',
        array('coches_desguace'), // Tipos de Post a los que asociaremos la taxonomía
        array(
            'hierarchical' => false, // True para taxonomías del tipo "Categoría" y false para el tipo "Etiquetas"
            'labels' => $etiquetas, // La variable con las traducciones de las etiquetas
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'genero' ),
        )
    );

}
add_action( 'init', 'crear_taxonomia_jerarquica', 0 );
?>
