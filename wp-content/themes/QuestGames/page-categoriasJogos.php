<?php
/*
Template Name: Categorias Jogos
*/
?>
<?php

$actualCategory = $_GET['categoria'];

$gamesArgs = array(
    'numberposts'    => -1,
    'post_type'        => 'product',
    'product_cat' => $actualCategory,
    'orderby'   => 'name',
    'order' => 'ASC',
);

$gameInCategory = new WP_Query($gamesArgs);

$categoriesArgs = array(
    'taxonomy' => 'product_cat',
);
$all_categories = get_categories($categoriesArgs);
?>
<?php get_header(); ?>
<div class="categoryGames">

<?php foreach ($all_categories as $category) : ?>
    <?php if ($category->name == $actualCategory) : ?>
        <?php
        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $category_thumbnail = wp_get_attachment_url($thumbnail_id);
        $icon_id =  get_term_meta($category->term_id, 'icone', true);
        $category_icon = wp_get_attachment_url($icon_id);
        ?>
        <div>
            <img src="<?php echo $category_thumbnail ?>" alt="<?php echo $category->name ?>">
            <h1><?php echo $category->name ?></h1>
            <p><?php echo $category->description ?></p>
        </div>
    <?php else : endif; ?>
<?php endforeach; ?>

<div>
    <?php if ($gameInCategory->have_posts()) : while ($gameInCategory->have_posts()) : $gameInCategory->the_post() ?>
            <div class="container-shopGames">
                <div class="container-img">
                    <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
                </div>
                <div class="container-txt">
                    <p><?php the_title(); ?></p>
                    <a href="<?php echo the_permalink() ?>">
                        <ion-icon class="icons" name="cart"></ion-icon>
                    </a>
                </div>
            </div>
    <?php endwhile;
    else : endif; ?>
</div>

</div>
<?php get_footer(); ?>