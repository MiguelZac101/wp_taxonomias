<?php
/**
 * Template Name: Buscador
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GourmetArtist
 */
get_header();
?>

<div id="primary" class="content-area medium-8 columns">
    <main id="main" class="site-main" role="main">
        <h2>Buscador Avanzado</h2>
        <div class="buscador">
            <input type="text" name="buscar" id="buscar" placeholder="buscar">
            <?php
            $terms = get_terms('precio_receta', array(
                'hide_empty' => false,
            ));
            ?>
            <select id="precio" name="precio">
                <option value="seleccione">seleccione</option>
                <?php
                foreach ($terms as $term) {
                ?>
                <option value="<?php echo $term->slug;?>"><?php echo $term->name;?></option>
                <?php
                }
                ?>
            </select> 
            <?php
            $terms = get_terms('tipo-comida', array(
                'hide_empty' => false,
            ));
            ?>
            <select id="tipo" name="tipo">
                <option value="seleccione">seleccione</option>
                <?php
                foreach ($terms as $term) {
                ?>
                <option value="<?php echo $term->slug;?>"><?php echo $term->name;?></option>
                <?php
                }
                ?>
            </select>
            
            <select id="calorias" name="calorias">
                <option value="seleccione">seleccione</option>
                <option value="0-200">200 o menos</option>
                <option value="201-400">201 - 400</option>
                <option value="401-600">401 - 600</option>                
                <option value="601-1000">601 o más</option>
            </select>

            <button id="btn_buscar" type="button" class="button">Buscar</button>

        </div>
        <div id="resultado"></div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
