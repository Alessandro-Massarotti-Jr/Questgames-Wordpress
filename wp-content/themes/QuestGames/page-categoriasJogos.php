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
<div class="categoryGames">

    <?php foreach ($all_categories as $category) : ?>
        <?php if ($category->name == $actualCategory) : ?>
            <?php
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $category_thumbnail = wp_get_attachment_url($thumbnail_id);
            $icon_id =  get_term_meta($category->term_id, 'icone', true);
            $category_icon = wp_get_attachment_url($icon_id);
            ?>
            <div class="categoryInfo">
                <div class="categoryInfo__image">
                    <img src="<?php echo $category_thumbnail ?>" alt="<?php echo $category->name ?>">
                </div>
                <div class="categoryInfo__content">
                    <h1><?php echo $category->name ?></h1>
                    <p><?php echo $category->description ?></p>
                </div>
            </div>
        <?php else : endif; ?>
    <?php endforeach; ?>
   <h2 class="categoryGames__sectionTitle">Jogos com a categoria <?php echo $actualCategory?></h2>
    <div class="gameCardContainer">
        <?php if ($gameInCategory->have_posts()) : while ($gameInCategory->have_posts()) : $gameInCategory->the_post() ?>
                <div class="gameCardContainer__card">
                    <div class="gameCardContainer__card__image">
                        <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
                    </div>
                    <div class="gameCardContainer__card__content">
                        <h3><?php the_title(); ?></h3>
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