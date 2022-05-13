<?php
/*
Template Name: Perfil
*/
?>
<?php get_header(); ?>

<!-- <?php $current_user = wp_get_current_user();
$downloads = wc_get_customer_available_downloads($current_user->id);
var_dump($downloads);
?> -->

<div class="perfil"><?php echo the_content();?></div>
<?php get_footer(); ?>