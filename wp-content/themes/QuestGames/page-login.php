<?php
/* 
Template Name: login
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

<div class="login">
    <div class="image">
        <img src="<?php echo get_template_directory_uri() . '/assets/image/Flogin.png' ?>" alt="Imagem Login">
    </div>
    <div class="form">
        <form name="loginform" id="loginform" action="<?php echo home_url() ?>/wp-login.php" method="post">
            <div class="flex-form-row">
                <label for="user_login">Login</label>
                <input type="text" name="log" id="user_login" aria-describedby="login_error" class="input" value="" size="20" autocapitalize="off">
</div>

            <div class="user-pass-wrap">
                <label for="user_pass">senha</label>
                <div class="wp-pwd">
                    <input type="password" name="pwd" id="user_pass" aria-describedby="login_error" class="input password-input" value="" size="20">

                </div>
            </div>
            <p class="submit">
                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Acessar">
                <input type="hidden" name="redirect_to" value="<?php echo home_url()?>/wp-admin/">
                <input type="hidden" name="testcookie" value="1">
            </p>
        </form>
        <a class="homeBtn" href="<?php echo home_url()?>"><ion-icon name="arrow-back-outline"></ion-icon> Voltar para a Home</a>
    </div>
</div>

<?php get_footer() ?>