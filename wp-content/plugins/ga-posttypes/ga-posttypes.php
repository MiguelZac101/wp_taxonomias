<?php
/*
Plugin Name: Gourmet Artist Post Types
Plugin URI:
Description: Agrega Custom Post Types al sitio Gourmet Artist
Version: 1.0
Author: Juan Pablo De la torre Valdez
Author URI:
License: GLP2
Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function crear_post_type_recetas() {
    // Etiquetas para el Post Type
  	$labels = array(
  		'name'                => _x( 'Recetas', 'Post Type General Name', 'gourmet-artist' ),
  		'singular_name'       => _x( 'Receta', 'Post Type Singular Name', 'gourmet-artist' ),
  		'menu_name'           => __( 'Recetas', 'gourmet-artist' ),
  		'parent_item_colon'   => __( 'Receta Padre', 'gourmet-artist' ),
  		'all_items'           => __( 'Todas las Recetas', 'gourmet-artist' ),
  		'view_item'           => __( 'Ver Receta', 'gourmet-artist' ),
  		'add_new_item'        => __( 'Agregar Nueva Receta', 'gourmet-artist' ),
  		'add_new'             => __( 'Agregar Nueva Receta', 'gourmet-artist' ),
  		'edit_item'           => __( 'Editar Receta', 'gourmet-artist' ),
  		'update_item'         => __( 'Actualizar Receta', 'gourmet-artist' ),
  		'search_items'        => __( 'Buscar Receta', 'gourmet-artist' ),
  		'not_found'           => __( 'No encontrado', 'gourmet-artist' ),
  		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'gourmet-artist' ),
  	);

    //Otras opciones para el post type

    $args = array(
      'label'       => __('recetas', 'gourmet-artist'),
      'description' => __('Recetas para cocina', 'gourmet-artist'),
      'labels'      => $labels,
      'supports'    => array('title', 'editor',  'thumbnail',  'revisions', ),
      'hierarchical' => false,
      'public'      => true,
      'show_ui'     => true,
      'show_in_menu' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 6,
      'menu_icon' => 'dashicons-book-alt',
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'capibility_type' => 'page',
    );
    //registrar post type
    register_post_type( 'recetas', $args );
}
add_action('init', 'crear_post_type_recetas', 0);


function crear_post_type_eventos() {
    // Etiquetas para el Post Type
  	$labels = array(
  		'name'                => _x( 'Eventos', 'Post Type General Name', 'gourmet-artist' ),
  		'singular_name'       => _x( 'Evento', 'Post Type Singular Name', 'gourmet-artist' ),
  		'menu_name'           => __( 'Eventos', 'gourmet-artist' ),
  		'parent_item_colon'   => __( 'Evento Padre', 'gourmet-artist' ),
  		'all_items'           => __( 'Todos las Eventos', 'gourmet-artist' ),
  		'view_item'           => __( 'Ver Evento', 'gourmet-artist' ),
  		'add_new_item'        => __( 'Agregar Nuevo Evento', 'gourmet-artist' ),
  		'add_new'             => __( 'Agregar Nuevo Evento', 'gourmet-artist' ),
  		'edit_item'           => __( 'Editar Evento', 'gourmet-artist' ),
  		'update_item'         => __( 'Actualizar Evento', 'gourmet-artist' ),
  		'search_items'        => __( 'Buscar Evento', 'gourmet-artist' ),
  		'not_found'           => __( 'No encontrado', 'gourmet-artist' ),
  		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'gourmet-artist' ),
  	);

    //Otras opciones para el post type

    $args = array(
      'label'       => __('eventos', 'gourmet-artist'),
      'description' => __('Eventos de la empresa', 'gourmet-artist'),
      'labels'      => $labels,
      'supports'    => array('title', 'editor',  'thumbnail',  'revisions', ),
      'hierarchical' => false,
      'public'      => true,
      'show_ui'     => true,
      'show_in_menu' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 6,
      'menu_icon'   => 'dashicons-calendar-alt',
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'capibility_type' => 'page',
    );
    //registrar post type
    register_post_type( 'eventos', $args );
}
add_action('init', 'crear_post_type_eventos', 0);
