<?php function enregistrement_des_menus()
{
    register_nav_menus(
        array(
            'menu-principal' => __('Menu Principal', 'mota'),
            'menu-footer' => __('Menu Footer', 'mota'),
        )
    );
}
add_action('after_setup_theme', 'enregistrement_des_menus');
?>



<?php function afficherImage()
{
    $cheminImage = 'http://motaphoto.local/wp-content/uploads/2023/11/Logo.jpg';
    $altText = 'Logo';

    $codeHTML = '<a href="http://motaphoto.local">' . '<img src="' . esc_url($cheminImage) . '" alt="' . esc_attr($altText) . '" class="logo"></a>';
    echo $codeHTML;
}
?>

<?php function ajouter_scripts()
{
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'ajouter_scripts');
?>

<?php // Fonction pour récupérer les classes du format de l'image pour le conteneur
function get_image_container_classes()
{
    // Récupérer le format de l'image
    $image_format = get_the_terms(get_the_ID(), 'format')[0]->name;

    // Définir des classes spécifiques selon le format de l'image
    $classes = array();

    if ($image_format === 'PAYSAGE') {
        // Ajouter les classes pour le format paysage
        $classes[] = 'photo-info-container';
    } elseif ($image_format === 'PORTRAIT') {
        // Ajouter les classes pour le format portrait
        $classes[] = 'photo-info-container-portrait';
    }

    // Retourner les classes sous forme de chaîne séparée par des espaces
    return implode(' ', $classes);
}
?>
<?php
// Fonction pour récupérer les classes pour un autre élément en fonction du format de l'image
function get_full_photo_classes() {
    // Récupérer le format de l'image
    $image_format = get_the_terms(get_the_ID(), 'format')[0]->name;

    // Définir des classes spécifiques selon le format de l'image pour l'autre élément
    $classes = array();

    if ($image_format === 'PAYSAGE') {
        // Ajouter les classes pour le format paysage
        $classes[] = 'full-photo';
    } elseif ($image_format === 'PORTRAIT') {
        // Ajouter les classes pour le format portrait
        $classes[] = 'portrait-full-photo';
    }

    // Retourner les classes sous forme de chaîne séparée par des espaces
    return implode(' ', $classes);
} 
?>
<?php
// Fonction pour récupérer les classes pour un autre élément en fonction du format de l'image
function get_thumbnail_classes() {
    // Récupérer le format de l'image
    $image_format = get_the_terms(get_the_ID(), 'format')[0]->name;

    // Définir des classes spécifiques selon le format de l'image pour l'autre élément
    $classes = array();

    if ($image_format === 'PORTRAIT') {
        // Ajouter les classes pour le format paysage
        $classes[] = 'thumbnail';
    } elseif ($image_format === 'PAYSAGE') {
        // Ajouter les classes pour le format portrait
        $classes[] = 'paysage-thumbnail';
    }

    // Retourner les classes sous forme de chaîne séparée par des espaces
    return implode(' ', $classes);
} 
?>


<?php
// Fonction pour récupérer les classes pour un autre élément en fonction du format de l'image
function get_photo_block_classes() {
    // Récupérer le format de l'image
    $image_format = get_the_terms(get_the_ID(), 'format')[0]->name;

    // Définir des classes spécifiques selon le format de l'image pour l'autre élément
    $classes = array();

    if ($image_format === 'PAYSAGE') {
        // Ajouter les classes pour le format paysage
        $classes[] = 'photo-block';
    } elseif ($image_format === 'PORTRAIT') {
        // Ajouter les classes pour le format portrait
        $classes[] = 'portrait-photo-block';
    }

    // Retourner les classes sous forme de chaîne séparée par des espaces
    return implode(' ', $classes);
} 
?>


<?php function get_reference_data() {
    $post_id = get_the_ID();
    $reference_data = get_post_meta($post_id, 'référence', true);
    return json_encode($reference_data);
}

// Ajoutez ce code dans l'en-tête de votre fichier single.php ou de l'en-tête global.
echo '<script>var reference_data = ' . get_reference_data() . ';</script>';
?>

<?php




