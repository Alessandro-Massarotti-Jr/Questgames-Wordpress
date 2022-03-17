<?php
/*
Template Name: Cadastro
*/
?>

<?php get_header() ?>

<style>
    header, footer, .footerlinks{
        display: none;
    }
    #main{
        margin-left: 0;
    }
   </style>


<div class="cadastro">
    <img src="<?php echo get_template_directory_uri() . '/assets/image/Flogin.png' ?>" alt="Imagem Login">
    <?php echo do_shortcode('[user_registration_form id="35"]') ?>
</div>

<?php get_footer() ?>