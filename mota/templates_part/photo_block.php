<div>
    <div class="bar-photos-apparentées"></div>
    <h2>VVOUS AIMEREZ AUSSI</h2>
    <div class="photos-apparentées">
    <?php
    function display_related_photos() {
        // Récupérer les termes (catégories) de l'article actuel
        $terms = get_the_terms(get_the_ID(), 'categorie');
        
        // Vérifier si des termes existent
        if ($terms && !is_wp_error($terms)) {
            $category_ids = wp_list_pluck($terms, 'term_id');
    
            // Vérifier si des catégories existent
            if (!empty($category_ids)) {
                // Récupérer deux articles au hasard de la même catégorie avec WP_Query
                $related_posts_args = array(
                    'category__in' => $category_ids,
                    'posts_per_page' => 2,
                    'orderby' => 'rand',
                );
    
                $related_posts_query = new WP_Query($related_posts_args);
    
                // Vérifier s'il y a des articles dans la même catégorie
                if ($related_posts_query->have_posts()) {
                    while ($related_posts_query->have_posts()) {
                        $related_posts_query->the_post();
    
                        // Récupérer le contenu de l'article
                        $content = get_post_field('post_content', get_the_ID());
    
                        // Utiliser une expression régulière pour extraire les balises <img>
                        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    
                        // Afficher la première image trouvée
                        if (!empty($matches[1])) {
                            // Utiliser la classe dans votre balise img en appelant la fonction
                            echo '<img src="' . esc_url($matches[1][0]) . '" class="' . get_full_photo_classes() . '" alt="' . esc_attr(get_the_title()) . '" />';
                        } else {
                            echo 'Aucune image trouvée dans le contenu de l\'article.';
                        }
                    }
                    wp_reset_postdata(); // Réinitialiser les données de l'article
                } else {
                    echo 'Aucune photo apparentée trouvée dans la même catégorie.';
                }
            } else {
                echo 'Aucune catégorie trouvée pour cet article.';
            }
        } else {
            echo 'Erreur lors de la récupération des catégories.';
        }
    }
    
    // Appeler la fonction pour afficher les photos apparentées
    display_related_photos();
    


        
        ?>




    </div>






</div>