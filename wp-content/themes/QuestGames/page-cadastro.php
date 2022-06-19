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
    .head{
        display: none!important;
    }
</style>


    
<div class="cadastro">
    <div class="image">
    <img src="<?php echo get_template_directory_uri() . '/assets/image/Flogin.png' ?>" alt="Imagem Login">
    </div>
    <div class="form">
         <div class="img-logo">
                <img src="<?php echo get_template_directory_uri() . '/assets/image/logo.png' ?>" alt="logo">
            </div>
            <div class="flex-form-row">
                <p class="p-form" style="font-size: 26px;width: 100%;text-align: center;">Criar Conta</p>
            </div>
        <?php echo do_shortcode('[user_registration_form id="35"]') ?>
        <a class="homeBtn" href="<?php echo home_url()?>">- Voltar para a Home -</a>
    </div>
</div>

<?php get_footer() ?>