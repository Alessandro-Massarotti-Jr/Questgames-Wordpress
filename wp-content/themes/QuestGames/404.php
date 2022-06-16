<?php get_header() ?>

<?php
$backgroundLoading = get_template_directory_uri() . '/assets/image/loading.gif';
$backgroundError = get_template_directory_uri() . '/assets/image/error.gif';
$background404 = get_template_directory_uri() . '/assets/image/404.gif';
?>

<div class="page404" style="background-image: url('<?php echo $backgroundLoading ?>') ">

    <div class="page404__returnHomeContainer">
        <a class="returnHome__button" href="<?php echo home_url() ?>">Voltar a loja</a>
    </div>



</div>



<script>
    const page404 = document.querySelector('.page404');
    const returnButton= document.querySelector('.page404__returnHomeContainer');
    setTimeout(() => {
        page404.style.backgroundImage = "url('<?php echo $backgroundError ?>')";
        setTimeout(() => {
            page404.style.backgroundImage = "url('<?php echo $background404 ?>')";
            setTimeout(() => {
                returnButton.classList.add('active');
            }, 1000);
        }, 1000);
    }, 5000);
</script>



<?php get_footer() ?>