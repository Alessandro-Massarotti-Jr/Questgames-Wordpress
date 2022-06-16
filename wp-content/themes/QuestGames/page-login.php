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
            <div class="img-logo">
                <img src="<?php echo get_template_directory_uri() . '/assets/image/logo.png' ?>" alt="logo">
            </div>
            <div class="flex-form-row">
                <p class="p-form" style="font-size: 22px;width: 100%;text-align: center;">Bem Vindo!</p>
                <p class="p-form" style="font-size: 26px;width: 100%;text-align: center; padding: 10px 0 10px 0;">Conecte em sua conta</p>
                <label for="user_login" style="margin-bottom: 5px;">Usuário</label>
                <input type="text" name="log" id="user_login" aria-describedby="login_error" class="input" value="" size="20" autocapitalize="off">
            </div>

            <div class="user-pass-wrap">
                <label for="user_pass">Senha</label>
                <div style="margin-top: 5px;" class="wp-pwd">
                    <input type="password" name="pwd" id="user_pass" aria-describedby="login_error" class="input password-input" value="" size="20">
                    <div style="display: flex; flex-direction:row;justify-content: space-between";>
                        <a href="" style="color: #2bd8ff; font-size: 14px; text-decoration:none; margin-top: 5px;">Esqueceu a senha?</a>
                        <a href="<?php echo home_url() ?>/cadastro" style="color: #2bd8ff; font-size: 14px; text-decoration:none; margin-top: 5px;">Criar conta</a>
                    </div>
                </div>
            </div>
            <p class="submit">
                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Acessar">
                <input type="hidden" name="redirect_to" value="<?php echo home_url() ?>/wp-admin/">
                <input type="hidden" name="testcookie" value="1">
            </p>
        </form>
        <a class="homeBtn" href="<?php echo home_url() ?>">
            - Voltar para a Home -
        </a>
    </div>
</div>

<?php get_footer() ?>