<?php

/*
  Plugin Name: Gourmet Artist REST API
  Plugin URI:
  Description: Agrega REST API al sitio Gourmet Artist
  Version: 1.0
  Author: Juan Pablo De la torre Valdez
  Author URI:
  License: GLP2
  Licence URI: http://localhost/wp_taxonomias2018/recetas/pizza-con-pepperoni/
 */

add_action('wp_enqueue_scripts', 'ga_rest_api_scripts');

function ga_rest_api_scripts() {
    wp_enqueue_script('ga-recetas-js', plugin_dir_url(__FILE__) . 'ga-rest-api.js');
    //Pasando la URL de la REST API al archivo javascript
    wp_localize_script('ga-recetas-js', 'ruta_rest_api', array('url' => rest_url('wp/v2/recetas-api')));
}

//agregar campo a respuesta REST API
add_action('rest_api_init', 'ga_rest_api');

function ga_rest_api() {
    //retorna el ID de receta anterior
    register_rest_field(
            'recetas', 'ga_receta_anterior', array(
        'get_callback' => 'ga_receta_anterior_ID', //nombre de la funcion
        'schema' => null,
        'update_callback' => null,
            )
    );
    // Añadiendo Meta Values
    register_rest_field(
            'recetas', 'ga_receta_meta_informacion', array(
        'get_callback' => 'ga_receta_meta', //nombre de la funcion
        'schema' => null,
        'update_callback' => null,
            )
    );
    // Añadiendo Taxonomias
    register_rest_field(
            'recetas', 'ga_receta_taxonomias', array(
        'get_callback' => 'ga_receta_taxonomias', //nombre de la funcion
        'schema' => null,
        'update_callback' => null,
            )
    );
    //retornando terminos
    register_rest_field(
            'recetas', 'ga_receta_termino_precio', array(
        'get_callback' => 'ga_receta_termino_precio', //nombre de la funcion
        'schema' => null,
        'update_callback' => null,
            )
    );
    register_rest_field(
            'recetas', 'ga_receta_termino_comida', array(
        'get_callback' => 'ga_receta_termino_comida', //nombre de la funcion
            )
    );
    register_rest_field(
            'recetas', 'ga_receta_termino_horario', array(
        'get_callback' => 'ga_receta_termino_horario', //nombre de la funcion
            )
    );
    register_rest_field(
            'recetas', 'ga_receta_termino_estado', array(
        'get_callback' => 'ga_receta_termino_estado', //nombre de la funcion
            )
    );
}

function ga_receta_anterior_ID() {
    return get_previous_post()->ID;
}

// Añadiendo Meta Values
function ga_receta_meta() {
    global $post;
    return get_post_meta($post->ID);
}

// Añadiendo Taxonomias
function ga_receta_taxonomias() {
    global $post;
    return get_object_taxonomies($post);
}

//Añadiendo Terminos
function ga_receta_termino_precio() {
    global $post;
//    return get_the_terms($post,'precio_receta');
    return get_the_term_list($post, 'precio_receta');
}

function ga_receta_termino_comida() {
    global $post;
    return get_the_term_list($post, 'tipo-comida');
}
function ga_receta_termino_horario() {
    global $post;
    return get_the_term_list($post, 'horario-menu');
}
function ga_receta_termino_estado() {
    global $post;
    return get_the_term_list($post, 'estado');
}
