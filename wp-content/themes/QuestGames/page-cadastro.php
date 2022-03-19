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