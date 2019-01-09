<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GourmetArtist
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
    <?php
    if (is_single()) {
        the_title('<h1 class="entry-title text-center">', '</h1>');
        the_post_thumbnail();
    } else {
        ?>
        <div class="imagen medium-6 columns">
            <?php the_post_thumbnail('entrada'); ?>
        </div>
    <?php } ?>

    <?php if (is_single()) { ?>
        <div>
        <?php } else { ?>
            <div class="medium-6 columns">
            <?php } ?>

            <header class="entry-header ">
                <?php
                if (is_single()) {
                    
                } else {
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                }

                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php gourmet_artist_posted_on(); ?>
                    </div><!-- .entry-meta -->
                <?php endif;
                ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                if (is_single()) {
                    ?>

                    <div class="taxonomias">
                        <div class="hora-comida">
                            <?php echo get_the_term_list($post->ID, 'horario-menu', "Hora de Comida: ", ', ', ''); ?>
                        </div>
                        <div class="tipo-comida">
                            <?php echo get_the_term_list($post->ID, 'tipo-comida', "Tipo de Platillo: ", ', ', ''); ?>
                        </div>
                        <div class="rango-precio">
                            <?php echo get_the_term_list($post->ID, 'precio_receta', "Precio: ", ', ', ''); ?>
                        </div>
                        <div class="estado-animo">
                            <?php echo get_the_term_list($post->ID, 'estado', "Estado de Ánimo: ", ', ', ''); ?>
                        </div>
                    </div>

                    <div class="informacion-extra">
                        <?php $calorias = get_post_meta(get_the_ID(), 'input-metabox', true); ?>
                        <?php if ($calorias) { ?>
                            <div class="calorias">
                                <p>Calorias: <?php echo $calorias; ?></p>
                            </div>
                        <?php } ?>
                        <?php $calificacion = get_post_meta(get_the_ID(), 'dropdown-metabox', true); ?>
                        <?php if ($calificacion) { ?>
                            <div class="calificacion">
                                <p>Calificación: <?php echo $calificacion; ?></p>
                            </div>
                        <?php } ?>
                    </div>

                    <?php $subtitulo = get_post_meta(get_the_ID(), 'textarea-metabox', true); ?>
                    <?php if ($subtitulo) { ?>
                        <blockquote >
                            <?php echo $subtitulo; ?>
                        </blockquote>
                    <?php } ?>

                    <?php
                    the_content();
                } else {
                    $excerpt = substr(get_the_excerpt(), 0, 200);
                    echo $excerpt . ' ...';
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'gourmet-artist'),
                        'after' => '</div>',
                    ));
                    ?>
                    <a href="<?php the_permalink(); ?>" class="button">Ver Receta</a>
                <?php } ?>

                <!--IMPRIMIENDO EL POST ANTERIOR-->
                <a class="receta_anterior" href="<?php echo get_permalink(get_previous_post()->ID); ?>" data-receta-anterior="<?php echo get_previous_post()->ID; ?>">
                    Receta Anterior
                </a>

<!--                <pre>
                    <?php var_dump(get_previous_post()); ?>
                </pre>-->

            </div><!-- .entry-content -->


        </div><!--.medium-6 colums-->
</article><!-- #post-## -->
