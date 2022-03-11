<?php
/*
Template Name: Home
*/
?>

<?php
$gameArgs = array(
    'post_type'=>'product',
    'post_status'=>'published'
);
$games = new WP_Query($gameArgs);
?>

<?php get_header(); ?>
<h1 style="color: white;">Home</h1>

<?php if($games->have_posts()):while($games->have_posts()):$games->the_post()?>

<div style="background-color: white; margin-top:40px;">
<img src="<?php the_post_thumbnail_url('post_image')?>" alt="<?php the_title()?>">
<h1><?php the_title();?></h1>
<a href="<?php echo the_permalink()?>">Ver mais</a>


</div>

<?php endwhile;endif;?>

<?php get_footer(); ?>