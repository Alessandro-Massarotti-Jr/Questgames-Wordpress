<?php
/*
Template Name: Carrinho
*/
?>
<?php get_header(); ?>
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
<h1 class="cart__title">Carrinho</h1>
<?php the_content(); ?>
<?php get_footer(); ?>