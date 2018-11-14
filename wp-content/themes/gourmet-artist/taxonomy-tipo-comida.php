<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GourmetArtist
 */
get_header();
?>

<div id="primary" class="content-area medium-8 columns">
    <main id="main" class="site-main" role="main">

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <h1>VISTA ESPECIAL PARA TAXONOMY: TIPO COMIDA</h1>
                <?php
                the_archive_title('<h1 class="page-title text-center">', '</h1>');
                the_archive_description('<div class="taxonomy-description">', '</div>');
                ?>

                <?php
                $termino_actual = get_queried_object();
                $taxonomia = get_taxonomy($termino_actual->taxonomy);
                echo '<h1 class="page-title text-center">' . $taxonomia->label . ': ' . $termino_actual->name . '</h1>';
                ?>

            </header><!-- .page-header -->

            <?php
            /* Start the Loop */
            while (have_posts()) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('template-parts/content', get_post_format());

            endwhile;

            the_posts_navigation();

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();