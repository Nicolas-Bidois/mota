<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>
    <div id="wrapper" class="hfeed">
        <header id="header">
            <nav id="menu">
                <?php afficherImage(); ?>

                <div class="navigation">
                    <a href="<?php echo home_url(); ?>">ACCUEIL</a>
                    <a href="<?php echo home_url('/a-propos'); ?>">À PROPOS</a>
                    <a href="<?php echo home_url('/contact'); ?>">CONTACT</a>
                </div>
            </nav>
        </header>
