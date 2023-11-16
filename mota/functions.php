<?php function enregistrement_des_menus() {
    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'mota'),
        'menu-footer' => __('Menu Footer', 'mota'),
    ));
}
add_action('after_setup_theme', 'enregistrement_des_menus');
 ?>




<?php function afficherImage() {
    $cheminImage = 'http://motaphoto.local/wp-content/uploads/2023/11/Logo.jpg';
    $altText = 'Logo';

$codeHTML= '<a href="http://motaphoto.local">'.'<img src="' . esc_url( $cheminImage ) . '" alt="'  . esc_attr( $altText ) . '" class="logo"></a>';
echo $codeHTML;
}
?>

<?php function ajouter_scripts() {
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'ajouter_scripts');
?>