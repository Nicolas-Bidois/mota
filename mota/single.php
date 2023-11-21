<?php get_header(); ?>
<?php if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
        <div class="<?php echo esc_attr(get_image_container_classes()); ?>">
            <div class="info-block">
                <h1 class="entry-title">
                    <?php the_title(); ?>
                </h1>
                <p>RÉFÉRENCE :
                    <?php echo get_post_meta(get_the_ID(), 'référence', true); ?>
                    <script>var reference_data = <?php echo json_encode(get_reference_data()); ?>;</script>
                </p>
                <p>CATÉGORIE :
                    <?php echo get_the_terms(get_the_ID(), 'categorie')[0]->name; ?>
                </p>
                <p>FORMAT :
                    <?php echo get_the_terms(get_the_ID(), 'format')[0]->name; ?>
                </p>
                <p>TYPE :
                    <?php echo get_post_meta(get_the_ID(), 'type', true); ?>
                </p>
                <p>ANNÉE :
                    <?php echo get_post_meta(get_the_ID(), 'Année', true); ?>
                </p>
                <!-- Ajoutez d'autres informations spécifiques à votre type de contenu ici -->
            </div>

            <div class="<?php echo esc_attr(get_photo_block_classes()); ?>">
                <?php
                // Récupérer le contenu de l'article
                $content = get_post_field('post_content', get_the_ID());

                // Utiliser une expression régulière pour extraire les balises <img>
                preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);

                // Afficher la première image trouvée
                if (!empty($matches[1])) {
                    // Utiliser la classe dans votre balise img en appelant la fonction
                    echo '<img src="' . esc_url($matches[1][0]) . '" class="' . get_full_photo_classes() . '" alt="' . esc_attr(get_the_title()) . '" />';

                }
                ?>
            </div>
        </div>
        <div class="bloc">
            <p class="text-1">Cette photo vous intéresse ?</p>
            <button type="button" class="pos contact-link popup contact-button wpcf7-form-control wpcf7-submit"
                data-photo-ref="<?php echo get_post_meta(get_the_ID(), 'reference_photo', true); ?>">
                Contact
            </button>

            <?php
            // Récupérez les ID des photos précédente et suivante dans votre catalogue
            $previous_photo = get_previous_post();
            $previous_photo_id = is_object($previous_photo) ? $previous_photo->ID : null;

            $first_photo = get_posts(array('post_type' => 'votre_type_de_photo', 'numberposts' => 1, 'order' => 'ASC', 'orderby' => 'date'));
            $first_photo_id = !empty($first_photo[0]) ? $first_photo[0]->ID : null;

            $last_photo = get_posts(array('post_type' => 'votre_type_de_photo', 'numberposts' => 1, 'order' => 'DESC', 'orderby' => 'date'));
            $last_photo_id = !empty($last_photo[0]) ? $last_photo[0]->ID : null;

            $next_photo_id = get_next_post() ? get_next_post()->ID : null;
            ?>

            <div class="fleches">
                <?php if ($previous_photo_id || $last_photo_id): ?>
                    <a href="<?php echo $previous_photo_id ? get_permalink($previous_photo_id) : get_permalink($last_photo_id); ?>"
                        class="nav-link" title="Photo précédente">
                        <?php echo wp_get_attachment_image($previous_photo_id ? get_post_thumbnail_id($previous_photo_id) : get_post_thumbnail_id($last_photo_id), array(81, 71), false, array('class' => 'thumbnail')); ?>
                        <span class="arrow">&#8592;</span>
                    </a>
                <?php endif; ?>

                <?php if ($next_photo_id || $first_photo_id): ?>
                    <a href="<?php echo $next_photo_id ? get_permalink($next_photo_id) : get_permalink($first_photo_id); ?>"
                        class="nav-link" title="Photo suivante">
                        <?php echo wp_get_attachment_image($next_photo_id ? get_post_thumbnail_id($next_photo_id) : get_post_thumbnail_id($first_photo_id), array(81, 71), false, array('class' => 'thumbnail')); ?>
                        <span class="arrow">&#8594;</span>
                    </a>
                <?php endif; ?>
                <div id="thumbnail-container">
                    <?php
                    // Récupérer le post suivant dans votre catalogue
                    $next_post = get_next_post();
                    $previous_post = get_previous_post();

                    if ($next_post) {
                        // Récupérer le contenu de l'article suivant
                        $next_post_content = get_post_field('post_content', $next_post->ID);

                        // Utiliser une expression régulière pour extraire les balises <img>
                        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $next_post_content, $matches);

                        // Afficher l'image trouvée dans le post suivant
                        if (!empty($matches[1])) {
                            // Utiliser la classe dans votre balise img en appelant la fonction
                            echo '<img src="' . esc_url($matches[1][0]) . '" class="' . get_thumbnail_classes() . '" alt="' . esc_attr(get_the_title($next_post->ID)) . '" />';
                        }
                    } elseif ($previous_post) {
                        // Récupérer le contenu de l'article précédent
                        $previous_post_content = get_post_field('post_content', $previous_post->ID);

                        // Utiliser une expression régulière pour extraire les balises <img>
                        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $previous_post_content, $matches);

                        // Afficher l'image trouvée dans le post précédent
                        if (!empty($matches[1])) {
                            // Utiliser la classe dans votre balise img en appelant la fonction
                            echo '<img src="' . esc_url($matches[1][0]) . '" class="' . get_thumbnail_classes() . '" alt="' . esc_attr(get_the_title($previous_post->ID)) . '" />';
                        }
                    }
                    ?>


                </div>
            </div>
        </div>

        </div>
        <?php
    endwhile;
else:
    echo 'Aucun article trouvé.';
endif; ?>
<div class="bar-photos-apparentées"></div>
    <div class="photos-apparentées">
        <?php get_template_part('templates_part/photo_block'); ?>
    </div>
<?php get_footer(); ?>