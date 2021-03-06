<?php
/*
Template Name: Home
*/
?>

<?php
$gameArgs = array(
    'post_type' => 'product',
    'post_status' => 'published'
);
$games = new WP_Query($gameArgs);

$pathnotesArgs = array(
    'post_type' => 'pathnotes',
    'post_status' => 'published'
);
$pathnotes = new WP_Query($pathnotesArgs);

$bannerArgs = array(
    'post_type' => 'product',
    'post_status' => 'published',
    'posts_per_page' => 3,
);

$banner = new WP_Query($bannerArgs);

$categoriesArgs = array(
    'taxonomy' => 'product_cat',
);
$all_categories = get_categories($categoriesArgs);


$reviewsArgs = array(
    'post_type' => 'reviews',
    'post_status' => 'published',
    'posts_per_page' => 3,
);

$reviews = new WP_Query($reviewsArgs);

// echo '<div style="background-color:#ffffff">';
// var_dump($all_categories);
// echo '</div>';

?>

<?php get_header(); ?>

<div class="home">



    <div class="bannerContainer">
        <div class="banner" id="bannerHome">
            <?php if ($banner->have_posts()) : while ($banner->have_posts()) : $banner->the_post() ?>
                    <a href="<?php echo the_permalink() ?>" class="bannerItem">
                        <h2 class="bannerTitle"><?php the_title(); ?></h2>
                        <div class="bannerItemImage">
                            <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
                        </div>
                    </a>
            <?php endwhile;
            endif; ?>
        </div>
        <div class="bannerNav">
            <label for="bannerNav1">
                <input class="BannerNavBtn" type="radio" name="radio-btn" id="bannerNav1" onchange="banner1()">
                <span></span>
            </label>
            <label for="bannerNav2">
                <input class="BannerNavBtn" type="radio" name="radio-btn" id="bannerNav2" onchange="banner2()">
                <span></span>
            </label>
            <label for="bannerNav3">
                <input class="BannerNavBtn" type="radio" name="radio-btn" id="bannerNav3" onchange="banner3()">
                <span></span>
            </label>
        </div>
    </div>
    <div class="all-Path">
        <p>Jogos em destaque</p>
    </div>
    <div class="all-games">
        <div class="grid-container">
            <?php $i = 0; ?>
            <?php if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post() ?>

                    <?php $i++;
                    if ($i < 6) { ?>

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
                    <?php } ?>
            <?php endwhile;
            endif; ?>
        </div>
    </div>

</div>

<div class="all-gamesTitle">
    <p>Categorias</p>
</div>
<div class="all-categories">
    <?php
    $count = 0;
    ?>
    <?php foreach ($all_categories as $category) : ?>
        <?php


        $category_id =  $category->term_id;
        $thumbnail_id = get_term_meta($category_id, 'thumbnail_id', true);
        $category_image = wp_get_attachment_url($thumbnail_id);
        $category_link = get_term_link($category_id, 'product_cat');
        ?>
        <?php
        $count++;
        if ($count < 5) { ?>
            <a href="<?php echo home_url() . '/categoria-jogos?categoria=' . $category->name ?>" class="category_card">
                <div class="category_card__content">
                    <h3 class="category_title"><?php echo $category->name ?></h3>
                </div>
                <div class="category_card__image">
                    <img src="<?php echo $category_image; ?>" alt="<?php echo $category->name ?>">
                </div>
            </a>
        <?php } ?>
    <?php endforeach; ?>
</div>

<div class="all-Path">
    <p>An??lises de usu??rios</p>
</div>
<div class="all-review">
    <?php if ($reviews->have_posts()) : while ($reviews->have_posts()) : $reviews->the_post(); ?>

            <div class="container-review">
                <div class="container-review-img">
                    <img src="<?php echo get_field('imagem') ?>" alt="<?php echo the_title() ?>">
                </div>
                <div class="container-review-txt">
                    <div class="title">
                        <p class="nickname"><?php echo get_field('usuario') ?></p>
                        <p><?php echo get_field('jogo_relacionado') ?> <?php echo get_field('review') ?></p>
                    </div>
                    <div class="description">
                        <p><?php echo the_content() ?></p>
                    </div>
                </div>
            </div>

    <?php endwhile; else : endif; ?>
</div>

<div class="all-comunidade">
    <p>Path notes recentes</p>
</div>

<div class="all-pathnotes">
    <div class="container-path">
        <div class="container-img-sereia">
            <img src="wp-content/uploads/test/sereia.png" alt="sereia">
        </div>
        <?php if ($pathnotes->have_posts()) : while ($pathnotes->have_posts()) : $pathnotes->the_post(); ?>
                <?php
                $pathnote_game_id = get_field('jogo_id');
                $pathnote_thumbnail_id = get_post_thumbnail_id($pathnote_game_id[0]);
                $pathnote_image = wp_get_attachment_url($pathnote_thumbnail_id);

                ?>
                <div class="container-path-txt">
                    <div class="container-img-post">
                        <img src="<?php echo  $pathnote_image ?>" alt="">
                    </div>
                    <p class="title"><?php echo the_title() ?></p>
                    <p><?php echo the_content() ?></p>
                </div>
                <?php break; ?>
        <?php endwhile;
        endif; ?>
        <div class="container-img-guerreiro">
            <img src="wp-content/uploads/test/guerreiro.png" alt="guerreiro">
        </div>
    </div>
</div>

<div class="all-comunidade">
    <p>Artes Populares</p>
</div>

<div class="all-games">
    <?php $count2 = 0 ?>
    <?php if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post() ?>
            <?php $count2++; ?>
            <?php if ($count2 < 5) { ?>
                <div class="container-artGames">
                    <div class="container-imgArt">
                        <img src="<?php the_post_thumbnail_url('post_image') ?>" alt="<?php the_title() ?>">
                    </div>
                    <div class="container-text">
                        <p><?php the_title(); ?></p>
                        <p>{Author}</p>
                    </div>
                </div>
            <?php } ?>
    <?php endwhile;
    endif; ?>
</div>

<?php get_footer(); ?>