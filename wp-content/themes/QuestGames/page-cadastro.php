<?php
/*
Template Name: Cadastro
*/
?>

<?php get_header() ?>

<style>
    header,
    footer,
    .footerlinks {
        display: none;
    }

    #main {
        margin-left: 0;
    }
</style>

<div class="head">
        <a href="<?php echo home_url() ?>">
            <ion-icon class="icons" name="bag-add-outline"></ion-icon>
        </a>
        <a href="<?php echo home_url() . '/carrinho' ?>">
            <ion-icon class="icons" name="cart-outline"></ion-icon>
        </a>
        <a href="<?php echo home_url() . '/categorias' ?>">
            <ion-icon class="icons" name="pricetag-outline"></ion-icon>
        </a>
        <?php if (is_user_logged_in()) : ?>
            <a href="<?php echo home_url() . '/biblioteca/' ?>">
                <ion-icon class="icons" name="library-outline"></ion-icon>
            </a>
            <a href="<?php echo home_url() . '/perfil' ?>">
                <ion-icon class="icons" name="person-outline"></ion-icon>
            </a>
        <?php else : ?>
            <a href="<?php echo home_url() ?>/login">
                <ion-icon class="icons" name="log-in-outline"></ion-icon>
            </a>
            <a href="<?php echo home_url() . '/cadastro' ?>">
                <ion-icon class="icons" name="person-add-outline"></ion-icon>
            </a>
        <?php endif; ?>
    </div>
    
<div class="cadastro">
    <div class="image">
    <img src="<?php echo get_template_directory_uri() . '/assets/image/Flogin.png' ?>" alt="Imagem Login">
    </div>
    <div class="form">
        <?php echo do_shortcode('[user_registration_form id="35"]') ?>
        <a class="homeBtn" href="<?php echo home_url()?>"><ion-icon name="arrow-back-outline"></ion-icon> Voltar para a Home</a>
    </div>
</div>

<?php get_footer() ?>