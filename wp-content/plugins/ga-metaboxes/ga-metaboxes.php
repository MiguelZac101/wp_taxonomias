<?php
/*
  Plugin Name: Gourmet Artist MetaBoxes
  Plugin URI:
  Description: Agrega MetaBoxes al sitio Gourmet Artist
  Version: 1.0
  Author: Juan Pablo De la torre Valdez
  Author URI:
  License: GLP2
  Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

function ga_agregar_metaboxes() {
    //string id, string Titulo, callback, pantalla, context (normal, side o advanced), prioridad, data callback
    add_meta_box("ga-metaboxes", "Nuestro Metabox", "ga_diseno_metaboxes", "recetas", "normal", "high", null);
}

add_action("add_meta_boxes", "ga_agregar_metaboxes");

function ga_diseno_metaboxes($post) {
    wp_nonce_field(basename(__FILE__),"meta-box-nonce");
?>
<div>
    <label for="input-metabox">Calorias</label>
    <input name="input-metabox" type="text">
    <br/>
    
    <label for="textarea-metabox">subtitulo de la receta:</label>
    <textarea name="textarea-metabox"></textarea>
    <br/>
    
    <label for="dropdown-metabox">calificación:</label>
    <select name="dropdown-metabox">
        <?php 
        $opciones = array(1,2,3,4,5);
        foreach($opciones as $llave => $valor){
        ?>
        <option><?php echo $valor; ?></option>
        <?php            
        }
        ?>
    </select>
    
</div>
<?php
}
