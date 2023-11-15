<?php function afficherImage() {
    $cheminImage = 'http://motaphoto.local/wp-content/uploads/2023/11/Logo.jpg';
    $altText = 'Logo';

$codeHTML= '<a href="http://motaphoto.local">'.'<img src="' . esc_url( $cheminImage ) . '" alt="'  . esc_attr( $altText ) . '" class="logo"></a>';
echo $codeHTML;
}
?>