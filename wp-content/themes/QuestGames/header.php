<!DOCTYPE html>
<html <?php language_attributes(); ?> <head>
<title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                <ion-icon name="menu-outline"></ion-icon>
            </a>

            <a href="<?php echo home_url() ?>">
                <ion-icon class="icons" name="bag-add-outline"></ion-icon>Loja
            </a>
            <a href="<?php echo home_url() . '/carrinho' ?>">
                <ion-icon class="icons" name="cart-outline"></ion-icon>Carrinho
            </a>
            <a href="<?php echo home_url() . '/categorias' ?>">
                <ion-icon class="icons" name="pricetag-outline"></ion-icon>Categorias
            </a>

            <!-- <a href="/">
                <ion-icon class="icons" name="settings-outline"></ion-icon>Configurações
            </a> -->

            <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo home_url() . '/biblioteca/' ?>">
                    <ion-icon class="icons" name="library-outline"></ion-icon>Biblioteca
                </a>
                <a href="<?php echo home_url() . '/perfil' ?>">
                    <ion-icon class="icons" name="person-outline"></ion-icon> Perfil
                </a>
            <?php else : ?>
                <a href="<?php echo home_url() ?>/login">
                    <ion-icon class="icons" name="log-in-outline"></ion-icon>Login
                </a>
                <a href="<?php echo home_url() . '/cadastro' ?>">
                    <ion-icon class="icons" name="person-add-outline"></ion-icon>cadastro
                </a>
            <?php endif; ?>

        </div>


        <!-- Abre a side bar -->
        <h1 class="openbtn" onclick="openNav()">
            <ion-icon name="menu-outline"></ion-icon>
        </h1>

        <img src="<?php echo get_template_directory_uri() . '/assets/image/logo.png' ?>" alt="logo" class="logo">


        <form class="searchForm" action="search">
            <div class="">
                <input type="search" id="search" name="search" placeholder="Pesquisar Games..." class="" />
                <button type="submit" class="">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
        </form>

    </header>

    <div id="main">