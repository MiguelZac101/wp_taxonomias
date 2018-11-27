<?php
/**
 * Template Name: recetas
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

<div id="primary" class="column">
    <main id="main" class="site-main" role="main">
        <h1 class="text-center"><?php the_title(); ?></h1>
        <ul class="simplefilter menu row">
            <li class="active" data-filter="all">Todos</li>
            <?php
            //listado de taxonomias
            $taxonomy = 'tipo-comida';
            $tax_terms = get_terms($taxonomy, array(
                'hide_empty' => false,
            ));
//            echo "<pre>";
//            print_r($tax_terms);
//            echo "</pre>";

            foreach ($tax_terms as $tax_term) {
                echo '<li data-filter="' . $tax_term->term_taxonomy_id . '">' . $tax_term->name . '</li>';
            }
            ?>
        </ul>
        <div class="row">
            Buscador:
            <input type="text" class="filtr-search" name="filtr-search" data-search>
        </div>
        <?php
        $args = array(
            'post_type' => 'recetas',
            'posts_per_page' => -1,
            'order_by' => 'title',
            'order' => 'ASC',
        );

        $query = new WP_Query($args);
        if ($query->have_posts()) {
            ?>
            <div class="row">
                <div class="filtro-contenido">
                    <div class="row small-up-2 medium-up-3 large-up-4">
                        <?php
                        while ($query->have_posts()): $query->the_post();
                            $terms = wp_get_post_terms(get_the_ID(), 'tipo-comida');  
//                            var_dump($terms);
                            ?>
                            <div class="column filtr-item" data-category="<?php echo $terms[0]->term_taxonomy_id; ?>">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('entrada'); ?>
                                    <p class="text-center">
                                        <?php
                                        the_title();
                                        ?>
                                    </p>
                                </a>
                            </div>
                            <?php
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }

        wp_reset_postdata();
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
